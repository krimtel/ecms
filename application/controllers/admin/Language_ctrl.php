<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','ion_auth'));
		$this->load->database();
		$this->load->model(array('admin/Language_model'));
		$this->lang->load('admin_lang', 'english');
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}
	
	public function index(){
		$data['title'] = 'eNam Admin';		
		
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
		$data['main_contant'] = $this->load->view('admin/pages/master/language',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function language_edit(){
		$data['name'] = $this->input->post('name');
		$data['id'] = $this->input->post('id');
		$data['updated_at'] = date('d-m-y h:i:s');
		$data['ip'] = $this->input->ip_address();
		$data['user_id'] = $this->session->userdata('user_id');
		
		$result = $this->Language_model->language_edit($data);
		if($result){
			if($this->lang->line('language_update_success')){
				$msg  = $this->lang->line('language_update_success');
			}
			else{
				$msg = 'Language updated successfully.';
			}
			echo json_encode(array('msg'=>$msg,'status'=>200));
		}
		else{
			if($this->lang->line('language_update_failed')){
				$msg  = $this->lang->line('language_update_failed');
			}
			else{
				$msg = 'Language updated failed.';
			}
			echo json_encode(array('msg'=>$msg,'status'=>500));
		}
	}
	
	function language_create(){
		$data['l_name'] = $this->input->post('name');
		$data['created_at'] = date('d-m-y h:i:s');
		$data['ip'] = $this->input->ip_address();
		$data['last_update_by'] = $this->session->userdata('user_id');
		
		$result = $this->Language_model->language_create($data);
		if(count($result) > 0){
			if($this->lang->line('language_create_success')){
				$msg  = $this->lang->line('language_create_success');
			}
			else{
				$msg = 'Language creation successfully.';
			}
			echo json_encode(array('data'=>$result,'msg'=>$msg,'status'=>200));
		}
		else{
			if($this->lang->line('language_create_failed')){
				$msg  = $this->lang->line('language_create_failed');
			}
			else{
				$msg = 'Language creation failed.';
			}
			echo json_encode(array('msg'=>$msg,'status'=>500));
		}
	}
	
	function language_delete(){
		$data['id'] = $this->input->post('id');
		$data['updated_at'] = date('d-m-y h:i:s');
		$data['ip'] = $this->input->ip_address();
		$data['user_id'] = $this->session->userdata('user_id');
		
		$result = $this->Language_model->language_delete($data);
		if($result){
			if($this->lang->line('language_delete_success')){
				$msg  = $this->lang->line('language_delete_success');
			}
			else{
				$msg = 'Language delete successfully.';
			}
			echo json_encode(array('msg'=>$msg,'status'=>200));
		}
		else{
			if($this->lang->line('language_delete_failed')){
				$msg  = $this->lang->line('language_delete_failed');
			}
			else{
				$msg = 'Language delete failed.';
			}
			echo json_encode(array('msg'=>$msg,'status'=>500));
		}
	}
}
