<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','form_validation','ion_auth','upload'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/News_model','admin/Event_model','admin/Video_model'));
		$this->lang->load('admin_lang', 'english');
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}

	function file_update(){
		$data['videos'] = $this->Video_model->Video_list();
		$json = json_encode($data['videos']);
		$file = FCPATH . '/software_files/Video.txt';
		file_put_contents ($file, $json);
	}

	public function index(){
		$data['title'] = 'eNam Admin | Videos';
		$languages = json_decode(file_get_contents(FCPATH . '/software_files/Language.txt'),true);
		foreach($languages as $language){
			if($language['l_id'] == $this->session->userdata('language'))
				$data['language'] = $language;
		}

		$file_menu = json_decode(file_get_contents(FCPATH . '/software_files/Video.txt'),true);
		if(count($file_menu)){
			$data['videos'] = $file_menu;
		}
		else{
			$data['videos'] = $this->Video_model->Video_list();
			$json = json_encode($data['videos']);
			$file = FCPATH . '/software_files/Video.txt';
			file_put_contents ($file, $json);
		}
		
		$data['head'] = $this->load->view('admin/comman/head',$data,TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation',$data,TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/master/video',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function video_create(){
		$data['v_url'] = $this->input->post('v_url');
		$data['v_title'] = $this->input->post('v_title');
		$data['v_desc'] = $this->input->post('v_desc');
		$data['v_id'] = (int)$this->input->post('v_id');
		$data['v_order'] = (int)$this->input->post('v_order');
		$data['created_at'] = date('Y-m-d h:i:s');
		$data['created_by'] = $this->session->userdata('user_id');
		$data['event_category']=$this->input->post('event_category');
		
		$result = $this->Video_model->video_create($data);
		if($result){
			$this->file_update();
			echo json_encode(array('msg'=>'operation successfull.','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'something wrong.','status'=>500));
		}
	}
	
	function video_publish(){
		if($this->ion_auth->is_admin()){
			$data[v_id] = $data->input->post['video_id'];
			$data[status]= $data->input->post['status'];
			if($data['status'] == 'true'){
			    $data['status'] = 1;
			}
			else{
			    $data['status'] = 0;
			}
			
			$result = $this->Video_model->video_publish($data);
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
	
	function video_delete(){
	    if($this->ion_auth->is_admin()){
	        $data['v_id'] = $this->input->post('v_id');
	        $result = $this->Video_model->video_delete($data);
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