<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cache_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file','form'));
		$this->load->library(array('session','ion_auth','form_validation'));
		$this->load->database();
		$this->load->model(array('admin/Language_model'));
		$this->lang->load('admin_lang', 'english');
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}
	
	function file_update(){
		$data['languages'] = $this->Language_model->get_all_language();
		$json = json_encode($data['languages']);
		//$file = FCPATH . '/software_files/Language.txt';
		file_put_contents ($file, $json);
	}
	
	public function index(){
		$data['title'] = 'eNam Admin';		
		$this->load->helper('directory');
		$data['files'] = directory_map('./software_files');
// 		$string = read_file(base_url().'./software_files/Language.txt');
// 		echo $string;
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/cache_mgnt/cache_mgnt',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function cache_clear(){
		$this->load->helper('directory');
		$data['soft_files'] = $this->input->post('soft_files'); 
		$file = FCPATH . "/software_files/{$this->input->post('soft_files')}";
		file_put_contents ($file, "");
			echo json_encode(array('msg'=>'file clear successfully.','status'=>200));
	}
}