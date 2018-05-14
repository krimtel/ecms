<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_ctrl extends CI_Controller {

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
	
	function get_all_widgets(){
		$Widgets = json_decode(file_get_contents(FCPATH . '/software_files/Widgets.txt'),true);
		if(count($Widgets)){
			$widgets = $Widgets;
		}
		else {
			$widgets = $this->Widget_model->all_widgets();
			$json = json_encode($data['widgets']);
			$file = FCPATH . '/software_files/Widgets.txt';
			file_put_contents ($file, $json);
		}
		if(count($Widgets)>0){
			echo json_encode(array('data'=>$widgets,'msg'=>'all widgets','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'no record found.','status'=>500));
		}
	}
	
	
	function get_all_users(){
		
	}
}
