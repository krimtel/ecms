<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','form_validation','ion_auth','upload'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/News_model','admin/Event_model','admin/Slider_model'));
		$this->lang->load('admin_lang', 'english');
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}
	
	function file_update(){
		$data['events'] = $this->Event_model->Event_list();
		$json = json_encode($data['events']);
		$file = FCPATH . '/software_files/Event.txt';
		file_put_contents ($file, $json);
	}
	
	public function index(){
		$data['title'] = 'eNam Admin | Events';
		$languages = json_decode(file_get_contents(FCPATH . '/software_files/Language.txt'),true);
		foreach($languages as $language){
			if($language['l_id'] == $this->session->userdata('language'))
			$data['language'] = $language;
		}
		
		$file_menu = json_decode(file_get_contents(FCPATH . '/software_files/Event.txt'),true);
		if(count($file_menu)){
			$data['events'] = $file_menu;
		}
		else{
			$data['events'] = $this->Event_model->Event_list();
			$json = json_encode($data['events']);
			$file = FCPATH . '/software_files/Event.txt';
			file_put_contents ($file, $json);
		}
		
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation',$data,TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['slider'] = $this->load->Slider_model->get_slider($data);
		$data['main_contant'] = $this->load->view('admin/pages/widget/slider',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	function slider_create(){
		$data['sid'] = $this->input->post('slider_id');
		$data['alt_tag'] = $this->input->post('slider_alt');
		$data['slider_order'] = $this->input->post('slider_order');
		
		
		$data['created_at'] = date('Y-m-d h:i:s');
		$data['created_by'] = $this->session->userdata('user_id');
		$data['created_at'] = date('Y-m-d h:i:s');
		$data['created_by'] = $this->session->userdata('user_id');
		//print_r($this->input->post()); die;
	
		if($data['sid'] == ''){
			// slider create
			if(!empty($_FILES['userFiles']['name'])){
				$file_name = $_FILES['userFiles']['name'];
				$event_title = addslashes(preg_replace('/\s+/', '_', $data['alt_tag']));
				$x = explode('.',$file_name);
				$_FILES['userFile']['name'] = $event_title.'.'.end($x);
				$_FILES['userFile']['type'] = $_FILES['userFiles']['type'];
				$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'];
				$_FILES['userFile']['error'] = $_FILES['userFiles']['error'];
				$_FILES['userFile']['size'] = $_FILES['userFiles']['size'];
					
	
				$uploadPath = 'Slider_gallary';
					
				$config['overwrite'] = true;
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPEG';
					
				$this->load->library('image_lib');
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					
				if($this->upload->do_upload('userFile')){
					$upload_data = $this->upload->data();
					$data['slider_image'] = $upload_data['file_name'];
					$result = $this->Slider_model->slider_create($data);
					if($result){
						$this->file_update();
						echo json_encode(array('msg'=>'Slider created successfully.','status'=>200));
					}
					else{
						delete_files($uploadPath.$data['slider_image']);
						echo json_encode(array('msg'=>'Something gone wrong.','status'=>500));
					}
				}
				else{
					$error = array('error' => $this->upload->display_errors());
					print_r($error); die;
				}
			}
		}
		/*else {
			// event update
			if(!empty($_FILES['userFiles']['name'])){
				$file_name = $_FILES['userFiles']['name'];
				$event_title = addslashes(preg_replace('/\s+/', '_', $data['event_title']));
				$event_category=addslashes(preg_replace('/\s+/', '_', $data['event_category']));
				$x = explode('.',$file_name);
				$_FILES['userFile']['name'] = $event_title.'.'.end($x);
				$_FILES['userFile']['type'] = $_FILES['userFiles']['type'];
				$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'];
				$_FILES['userFile']['error'] = $_FILES['userFiles']['error'];
				$_FILES['userFile']['size'] = $_FILES['userFiles']['size'];
					
					
				$uploadPath = 'Event_gallary';
					
				$config['overwrite'] = true;
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPEG';
					
				$this->load->library('image_lib');
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					
				if($this->upload->do_upload('userFile')){
					$upload_data = $this->upload->data();
						
					$data['event_image'] = $upload_data['file_name'];
						
					$result = $this->Event_model->event_update($data);
					if($result){
						$this->file_update();
						echo json_encode(array('msg'=>'Event created successfully.','status'=>200));
					}
					else{
						delete_files($uploadPath.$data['event_image']);
						echo json_encode(array('msg'=>'Something gone wrong.','status'=>500));
					}
				}
				else{
					$error = array('error' => $this->upload->display_errors());
					print_r($error); die;
				}
			}
			else{
				$result = $this->Event_model->event_update($data);
				if($result){
					$this->file_update();
					echo json_encode(array('msg'=>'event updated successfully.','status'=>200));
				}
				else{
					echo json_encode(array('msg'=>'Something gone wrong.','status'=>500));
				}
			}
		}*/
	} 
	function get_slider(){
		
	}
}