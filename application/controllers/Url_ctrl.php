<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/Users_model','admin/Slider_model','admin/Widget_model','Enam_model','admin/Event_model'));
		$this->load->library(array('session'));
	}
	
	function index(){
		$page_url=current_url();
		$c = 1;
		$url_array ='';
		while($this->uri->segment($c) != ''){
			$url_array.= $this->uri->segment($c).'/'; 
			$c = $c + 1;	
		}
		$url_array = strtolower(rtrim($url_array,"/ "));
		print_r($url_array); die;
		$this->db->select('*');
		$this->db->join('pages p','p.p_id = m.page_id');
		$result = $this->db->get_Where('menu m',array('m.cms_url'=>$url_array,'m.status'=>1,'p.status'=>1,'p.publish'=>1,'m.external_link'=>0))->result_array();
		
	}
}
