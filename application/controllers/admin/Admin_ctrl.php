<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','ion_auth'));
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}
	public function index(){
		$data['title'] = 'eNam Admin';
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/login',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function dashboard(){
		$data['title'] = 'eNam Admin';
		$l_id = $this->session->userdata('language'); 
		$languages = json_decode(file_get_contents(FCPATH . '/software_files/Language.txt'),true);
		
		foreach($languages as $language){
			if($language['l_id'] == $l_id){
				$data['language'] = $language; 
			}
		}
		
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation',$data,TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/dashboard',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	public function all_page()
	{
		$data['title'] = 'eNam Admin';
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/page/all-page',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	/*public function edit_page()
	{
		$data['title'] = 'eNam Admin';
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/page/edit',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}*/
	
	public function all_pages()
	{
		$data['title'] = 'eNam Admin';
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/layout/all_pages',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	public function add_page()
	{
		$data['title'] = 'eNam Admin';
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/layout/add_page',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	public function edit_page()
	{
		$data['title'] = 'eNam Admin';
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/layout/edit_page',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	public function home_page()
	{
		$data['title'] = 'eNam Admin';
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/layout/home_page',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
}
