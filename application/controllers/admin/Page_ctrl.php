<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_ctrl extends CI_Controller {

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
		$data['all_widgets'] = 
		
		$Widgets = json_decode(file_get_contents(FCPATH . '/software_files/Widgets.txt'),true);
		if(count($Widgets)){
			$data['widgets'] = $Widgets;
		}
		else{
			$data['widgets'] = $this->Widget_model->all_widgets();
			$json = json_encode($data['widgets']);
			$file = FCPATH . '/software_files/Widgets.txt';
			file_put_contents ($file, $json);
		}
		
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/layout/add_page',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function page_create(){
		$data['page_name'] = $this->input->post('page_name');
		$data['page_layout'] = $this->input->post('page_layout');
		if($data['page_layout'] == 1){
			$data['component'] = $this->input->post('one_col_maincontent');
		}
	}
}
