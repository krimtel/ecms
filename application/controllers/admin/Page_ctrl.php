<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('session','ion_auth'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/Users_model','admin/Widget_model','admin/Page_model'));
		$this->lang->load('admin_lang', 'english');
		if (!$this->ion_auth->logged_in()){
			redirect('admin/admin');
		}
	}
	
	function all_pages(){
		$data['title'] = ' pages';
		$data['pages'] = $this->Page_model->get_all_pages();
		$data['head'] = $this->load->view('admin/comman/head',$data,TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/layout/all_pages',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function index($p_id = null){
		if($p_id != null){
			$data['page_id'] = $p_id;
			$data['title'] = 'Update Page';
			
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
			
			$this->db->select('p.*,pi.meta_tag,pi.keywords');
			$this->db->join('page_item pi','pi.page_id = p.p_id');
			$result = $this->db->get_Where('pages p',array('p.p_id'=>$data['page_id'],'p.status'=>1,'pi.status'=>1))->result_array();
			
			if(count($result)>0){
				$data['page_details'] = $result;
			}
			$data['head'] = $this->load->view('admin/comman/head',$data,TRUE);
			$data['header'] = $this->load->view('admin/comman/header','',TRUE);
			$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
			$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
			$data['main_contant'] = $this->load->view('admin/pages/layout/add_page',$data,TRUE);
			$this->load->view('admin/comman/index',$data);
		}
		else{
			$data['title'] = 'create New Page';
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
			
			$data['head'] = $this->load->view('admin/comman/head',$data,TRUE);
			$data['header'] = $this->load->view('admin/comman/header','',TRUE);
			$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
			$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
			$data['main_contant'] = $this->load->view('admin/pages/layout/add_page',$data,TRUE);
			$this->load->view('admin/comman/index',$data);
		}
	}
	
	function page_create(){
			$data['page_id'] = (int)$this->input->post('page_id');
			if($data['page_id'] == ''){
				// new page create
				$data['page_name'] = $this->input->post('page_name');
				$data['page_layout'] = $this->input->post('page_layout');
				$data['meta_tag'] = $this->input->post('meta_tag');
				$data['keyword'] = $this->input->post('keyword');
				if($data['page_layout'] == 1){
					$data['component'] = $this->input->post('one_col_maincontent');
				}
				else if($data['page_layout'] == 2){
					$data['left_component'] = $this->input->post('two_col_leftcontent');
					$data['component'] = $this->input->post('two_col_maincontent');
				}
				else {
					$data['left_component'] = $this->input->post('three_col_leftcontent');
					$data['component'] = $this->input->post('three_col_maincontent');
					$data['right_component'] = $this->input->post('three_col_rightcontent');
				}
				
				$this->db->insert('pages',array(
						'page_name' => $data['page_name'],
						'page_layout' => $data['page_layout'],
						'created_at' => date('y-m-d h:i:s'),
						'created_by' => $this->session->userdata('user_id')
				));
				
				$page_id = $this->db->insert_id();
					
				$bulk_data = array();
				if(isset($data['left_component'])){
					foreach($data['left_component'] as  $left){
						$temp = array();
						$temp['page_id'] = $page_id;
						$temp['section'] = 'left_col';
						$temp['widget_id'] = $left;
						$bulk_data[] = $temp;
					}
				}
				
				if(isset($data['component'])){
					foreach($data['component'] as $component){
						$temp = array();
						$temp['page_id'] = $page_id;
						$temp['section'] = 'main_body';
						$temp['widget_id'] = $component;
						$bulk_data[] = $temp;
					}
				}
					
				if(isset($data['right_component'])){
					foreach($data['right_component'] as $right_component){
						$temp = array();
						$temp['page_id'] = $page_id;
						$temp['section'] = 'right_col';
						$temp['widget_id'] = $right_component;
						$bulk_data[] = $temp;
					}
				}
				
				$this->db->insert_batch('page_components',$bulk_data);
					
				$this->db->insert('page_item',array(
						'lang_id' => $this->session->userdata('language'),
						'page_id' => $page_id,
						'title'  => $data['page_name'],
						'meta_tag' => $data['meta_tag'],
						'keywords' => $data['keyword'],
						'created_at' => date('y-m-d h:i:s'),
						'created_by' => $this->session->userdata('user_id'),
						'ip'	=> $this->input->ip_address()
				));
			}
			else{
				// page update
				$data['page_id'] = $this->input->post('page_id');
				$data['page_name'] = $this->input->post('page_name');
				$data['page_layout'] = $this->input->post('page_layout');
				$data['meta_tag'] = $this->input->post('meta_tag');
				$data['keyword'] = $this->input->post('keyword');
				if($data['page_layout'] == 1){
					$data['component'] = $this->input->post('one_col_maincontent');
				}
				else if($data['page_layout'] == 2){
					$data['left_component'] = $this->input->post('two_col_leftcontent');
					$data['component'] = $this->input->post('two_col_maincontent');
				}
				else {
					$data['left_component'] = $this->input->post('three_col_leftcontent');
					$data['component'] = $this->input->post('three_col_maincontent');
					$data['right_component'] = $this->input->post('three_col_rightcontent');
				}
				
				$this->db->where('p_id',$data['page_id']);
				$this->db->update('pages',array(
						'page_name' => $data['page_name'],
						'page_layout' => $data['page_layout'],
						'updated_at' => date('y-m-d h:i:s'),
						'updated_by' => $this->session->userdata('user_id')
				));
				
				$this->db->where('page_id',$data['page_id']);
				$this->db->update('page_components',array('status'=>0));
					
				$bulk_data = array();
				if(isset($data['left_component'])){
					foreach($data['left_component'] as  $left){
						$temp = array();
						$temp['page_id'] = $data['page_id'];
						$temp['section'] = 'left_col';
						$temp['widget_id'] = $left;
						$bulk_data[] = $temp;
					}
				}
				
				if(isset($data['component'])){
					foreach($data['component'] as $component){
						$temp = array();
						$temp['page_id'] = $data['page_id'];
						$temp['section'] = 'main_body';
						$temp['widget_id'] = $component;
						$bulk_data[] = $temp;
					}
				}
					
				if(isset($data['right_component'])){
					foreach($data['right_component'] as $right_component){
						$temp = array();
						$temp['page_id'] = $data['page_id'];
						$temp['section'] = 'right_col';
						$temp['widget_id'] = $right_component;
						$bulk_data[] = $temp;
					}
				}
				
				$this->db->insert_batch('page_components',$bulk_data);
					
				$this->db->where(array('page_id'=>$data['page_id'],'lang_id'=>$this->session->userdata('language')));
				$this->db->update('page_item',array(
						'title'  => $data['page_name'],
						'meta_tag' => $data['meta_tag'],
						'keywords' => $data['keyword'],
						'updated_at' => date('y-m-d h:i:s'),
						'updated_by' => $this->session->userdata('user_id'),
						'ip'	=> $this->input->ip_address()
				));
			}
		}
		
		
	}
