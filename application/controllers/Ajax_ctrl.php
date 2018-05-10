<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->model(array('admin/Language_model','admin/Users_model','admin/Widget_model'));
	}
	
	function language_select(){
		$l_id = $this->input->post('l_id');
		$this->session->set_userdata('client_language', $l_id);
		echo json_encode(array('msg'=>'language slected.','status'=>200));
	}
}
