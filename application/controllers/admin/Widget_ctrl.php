<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','ion_auth'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/Users_model','admin/Widget_model'));
		$this->lang->load('admin_lang', 'english');
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}
	
	function index(){
		$data['title'] = 'eNam Admin';
		$data['users_lang'] = $this->Users_model->get_all_lang_users();
		$data['users'] = $this->Users_model->get_all_users();
		
		
		$file_menu = json_decode(file_get_contents(FCPATH . '/software_files/Language.txt'),true);
		if(count($file_menu)){
			$data['languages'] = $file_menu;
		}
		else{
			$data['languages'] = $this->Language_model->get_all_language();
			$json = json_encode($data['languages']);
			$file = FCPATH . '/software_files/Language.txt';
			file_put_contents ($file, $json);
		}
		
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/master/widget',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function widget_create(){
		$data['created_at'] = date('d-m-y h:i:s');
		$data['created_by'] = $this->session->userdata('user_id');
		$data['lang_id'] = $this->session->userdata('language');
		$data['ip'] = $this->input->ip_address();
		if($this->input->post('widget_id')){
			
		}
		else{
			if($this->ion_auth->is_admin()){	
				$data['widget_name'] = $this->input->post('widget_name');
				$data['widget_content'] = $this->input->post('widget_content');
				$result = $this->Widget_model->widget_create($data);
				print_r($result); die;
			}
			else{
				echo json_encode(array('msg'=>'Not authorized for creating widgets.','status'=>500));
			}
		}
	}
	
	
}
