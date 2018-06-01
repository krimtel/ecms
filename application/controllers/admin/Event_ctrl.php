<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','form_validation','ion_auth','upload'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/News_model','admin/Event_model'));
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
		$data['main_contant'] = $this->load->view('admin/pages/widget/event',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function event_create(){	
	   // $this->form_validation->set_rules('userFiles', 'Event Photo', 'required|trim');
	    $this->form_validation->set_rules('event_title', 'Event Title', 'required|trim');
	    $this->form_validation->set_rules('event_category', 'Event Category', 'required|trim');
	    $this->form_validation->set_rules('event_desc', 'Event Description', 'required|trim');
	    $this->form_validation->set_rules('event_order', 'Event Order', 'required|trim');
	    
	    if ($this->form_validation->run() == FALSE){
	        $this->session->set_flashdata('message',validation_errors());
	        echo validation_errors();
	    }
	    else{
		$data['event_title'] = $this->input->post('event_title');
		$data['event_desc'] = $this->input->post('event_desc');
		$data['event_id'] = (int)$this->input->post('event_id');
		$data['event_order'] = (int)$this->input->post('event_order');
		$data['created_at'] = date('Y-m-d h:i:s');
		$data['created_by'] = $this->session->userdata('user_id');
		$data['event_category']=$this->input->post('event_category');
		//print_r($this->input->post()); die;
		if($data['event_id'] == ''){
			// event create
			if(!empty($_FILES['userFiles']['name'])){
				$file_name = $_FILES['userFiles']['name'];
				$event_title = addslashes(preg_replace('/\s+/', '_', $data['event_title']));
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
					$result = $this->Event_model->event_create($data);
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
		}
		else {
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
		}
	}
	}
	
	
	function get_event_content(){
	    $this->form_validation->set_rules('e_id', 'Event Id', 'required|trim|integer|is_natural');
		$data['event_id'] = (int) $this->input->post('e_id');
		$data['lang_id'] = (int) $this->session->userdata('language');
		$data['ip'] = $this->input->ip_address();
		$data['updated_at'] = date('Y-m-d h:i:s');
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('message',validation_errors());
		    echo validation_errors();
		}
		else{
		    $data['updated_by'] = (int) $this->session->userdata('user_id');
	       	$result = $this->Event_model->get_event_content($data);
		    if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'event content.','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'no record found.','status'=>200));
		}
	}
	   }
	
	function event_publish(){
		if($this->ion_auth->is_admin()){
		    $this->form_validation->set_rules('e_id', 'Event Id', 'required|trim|integer|is_natural');
		    $this->form_validation->set_rules('status', 'Status', 'required');
		    if ($this->form_validation->run() == FALSE){
		        $this->session->set_flashdata('message',validation_errors());
		        echo validation_errors();
		    }
		    else{
			 $data['e_id'] = (int)$this->input->post('e_id');
			 $data['status'] = $this->input->post('status');
			 if($data['status'] == 'true'){
				$data['status'] = 1;
			 }
			 else{
				$data['status'] = 0;
			 }
				
			 $result = $this->Event_model->event_publish($data);
			 if($result){
			 	$this->file_update();
			   	echo json_encode(array('msg'=>'operation successfull.','status'=>200));
			}
			else{
				echo json_encode(array('msg'=>'something wrong.','status'=>500));
			}
		}
		}
		else{
			echo json_encode(array('msg'=>'you are not authorized.','status'=>500));
		}
		
	}
	
	function event_is_home(){
		if($this->ion_auth->is_admin()){
			$data['e_id'] = (int)$this->input->post('e_id');
			$data['status1'] = $this->input->post('status1');
			if($data['status1'] == 'true'){
				$data['status1'] = 1;
			}
			else{
				$data['status1'] = 0;
			}
	
			$result = $this->Event_model->is_home($data);
			if($result){
				//print_r($result); die;
				$this->file_update();
				echo json_encode(array('msg'=>'operation successfull.','status'=>200));
			}
			else{
				echo json_encode(array('msg'=>'something wrong.','status'=>500));
			}
		}
		else{
			echo json_encode(array('msg'=>'you are not authorized.','status'=>500));
		}
	}
	function news_delete(){
		if($this->ion_auth->is_admin()){
			$data['n_id'] = $this->input->post('n_id');
			$result = $this->News_model->news_delete($data);
			if($result){
				$this->file_update();
				echo json_encode(array('msg'=>'operation successfull.','status'=>200));
			}
			else{
				echo json_encode(array('msg'=>'something wrong.','status'=>500));
			}
		}
		else{
			echo json_encode(array('msg'=>'you are not authorized.','status'=>500));
		}
	}
	
	function event_delete(){
		if($this->ion_auth->is_admin()){
			$data['e_id'] = (int)$this->input->post('e_id');
			$result = $this->Event_model->event_delete($data);
			if($result){
				$this->file_update();
				echo json_encode(array('msg'=>'operation successfull.','status'=>200));
			}
			else{
				echo json_encode(array('msg'=>'something wrong.','status'=>500));
			}
		}
		else{
			echo json_encode(array('msg'=>'you are not authorized.','status'=>500));
		}
	}
	
}
