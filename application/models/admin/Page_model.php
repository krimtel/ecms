<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function get_all_pages_dashboard(){
		$this->db->select('*');
		$this->db->limit(5,1);
		$result = $this->db->get_where('pages',array('status'=>1))->result_array();
		return $result;
	}
	
	function get_all_pages(){
		$this->db->select('m.cms_url,p.*');
		$this->db->join('menu m','m.page_id = p.p_id');
		$result = $this->db->get_where('pages p',array('m.page_id !='=> NULL,'p.status'=>1))->result_array();
		//print_r($this->db->last_query()); die;
		return $result;
		
	}
}
?>