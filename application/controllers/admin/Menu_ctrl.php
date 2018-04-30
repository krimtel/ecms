<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->database();
		$this->load->model('admin/Menu_model');
		$this->load->library(array('session','ion_auth'));
	}
	
	public function index($m_id = null){
		$this->output->enable_profiler(TRUE);
		
		
		if($m_id != null){
			$data['title'] = 'Menu Edit';
		}
		else{
			$data['title'] = 'Menu';
		}
		
		$file_menu = json_decode(file_get_contents(FCPATH . '/software_files/languages.txt'));
		if(count($file_menu)){
			$data['menu'] = $file_menu;
		}
		else{
			$data['menu'] = $this->menu_list();
			$json = json_encode($data['menu']);
			$file = FCPATH . '/software_files/languages.txt';
			file_put_contents ($file, $json, FILE_APPEND);
		}
		
		$x = file(base_url().'/software_files/languages.txt');
		if(count($x) > 0){
			$data['laguages'] = $this->db->get('languages')->result_array();
		}
		else{
			$data['laguages'] = $this->db->get('languages')->result_array();
		}
		$data['head'] = $this->load->view('admin/comman/head',$data,TRUE);
		$data['header'] = $this->load->view('admin/comman/header','',TRUE);
		$data['navigation'] = $this->load->view('admin/comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('admin/comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('admin/pages/menu',$data,TRUE);
		$this->load->view('admin/comman/index',$data);
	}
	
	function fetchCategoryTreeList($parent = 0, $user_tree_array = '') {
		if (!is_array($user_tree_array))
			$user_tree_array = array();
			$query = $this->db->query("SELECT id,menu_slug,p_id FROM menu WHERE status = 1 AND `p_id` = $parent ORDER BY sort ASC")->result_array();
			if (count($query) > 0) {
				$user_tree_array[] = "<ul>";
				foreach($query as $q){
					$user_tree_array[] = "<li><a href='javascript:void(0);' class='menu_edit' data-mid='".$q['id']."'>". $q['menu_slug']."</a></li>";
					$user_tree_array = $this->fetchCategoryTreeList($q['id'], $user_tree_array);
				}
				$user_tree_array[] = "</ul>";
			}
			return $user_tree_array;
	}
	
	function menu_list(){
		$result = $this->fetchCategoryTreeList();
		return $result;
	}
	
	function get_all_parents_menu($p_id = 0){
		//$this->output->enable_profiler(TRUE);
		$this->db->cache_on();
			$p_id = $this->input->post('mid');
			$result = $this->Menu_model->get_all_parents_menu($p_id);
			if(count($result)>0){
				echo json_encode(array('data'=>$result,'status'=>200));
			}
			else{
				echo json_encode(array('msg'=>'No record found.','status'=>200));
			}
		$this->db->cache_off();
	}	
}
