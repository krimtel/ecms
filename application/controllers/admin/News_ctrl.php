<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','form_validation','ion_auth'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/News_model'));
		$this->lang->load('admin_lang', 'english');
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}
	
	public function index(){
		$data['title'] = 'eNam Admin';
		$data['languages'] = $this->Language_model->get_all_language();
		
		$file_menu = json_decode(file_get_contents(FCPATH . '/software_files/News.txt'),true);
		
		if(count($file_menu)){
			$data['newses'] = $file_menu;
		}
		else{
			$data['newses'] = $this->News_model->News_list();
			$json = json_encode($data['newses']);
			$file = FCPATH . '/software_files/News.txt';
			file_put_contents ($file, $json, FILE_APPEND);
		}
		
		$data['head'] = $this->load->view('admin/comman/head','',TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/widget/news',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function news_create(){
		if($this->input->post('news_id') != ''){
			$this->form_validation->set_rules('news_id','News Id','required|is_natural_no_zero');
		}
		
		$this->form_validation->set_rules('news_desc','News Contant','required|trim');
		$this->form_validation->set_rules('news_order','News Order','required|is_natural');
		if ($this->form_validation->run() == FALSE){
			echo validation_errors(); die;
		}
		else{
			$data['news_contect'] = $this->input->post('news_desc');
			$data['sort'] = $this->input->post('news_order');
			$data['ip'] = $this->input->ip_address();
			$data['created_at'] = date("d-m-y h:i:s");
			$data['user_id'] = (int)$this->session->userdata('user_id');
			$data['lang_id'] = 1;
			if($this->input->post('news_id') != ''){
				$data['news_id'] = $this->input->post('news_id');
				$result = $this->News_model->news_update($data);
				if($result){
					$data['newses'] = $this->News_model->News_list();
					$json = json_encode($data['newses']);
					$file = FCPATH . '/software_files/News.txt';
					file_put_contents ($file, $json);
					echo json_encode(array('status'=>200));
				}
				else{
					echo json_encode(array('status'=>500));
				}
			}
			else{
				$result = $this->News_model->news_create($data);
				if(count($result) > 0){
					echo json_encode(array('data'=>$result,'msg'=>'news created successfully.','status'=>200));
				}
				else{
					echo json_encode(array('msg'=>'news not created successfully.','status'=>500));
				}
			}
		}
	}
	
	
	function get_news_content(){
		$data['news_id'] = $this->input->post('n_id');
		$data['lang_id'] = 1;
		$data['ip'] = $this->input->ip_address();
		$data['updated_at'] = date('d-m-y h:i:s');
		$data['updated_by'] = $this->session->userdata('user_id');
		
		$result = $this->News_model->get_news_content($data);
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'news content.','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'no record found.','status'=>200));
		}
	}
}
