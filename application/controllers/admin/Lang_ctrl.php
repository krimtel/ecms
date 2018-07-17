<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lang_ctrl extends CI_Controller {

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
		file_put_contents ($file, $json);
	}

	public function index(){
		
		$data['title'] = 'eNam Admin';
		$this->load->helper('directory');
		$data['files'] = directory_map('./software_files');
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/cache_mgnt/lang_mgnt',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function upd_lang_file(){
		$data['user_lang'] = $this->input->post('user_lang');
		//print_r($this->input->$data['user_lang']); die;
		$this->db->select('l_eng');
		$this->db->get_where('languages',array('l_eng'=>$this->input->post('user_lang')))->result_array();
		
	}
}

?>