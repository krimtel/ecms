<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function slider_create($data){
		//slider table data
		//print_r($data); die;
		$val['sid'] = $data['sid'];
		$val['alt_tag'] = $data['alt_tag'];
		$val['sort'] = $data['slider_order'];
		//$val['publish'] = $data['publish'];
		$val['created_at'] = $data['created_at'];
		$val['created_by'] = $data['created_by'];
// 		$val['updated_at'] = $data['updated_at'];
// 		$val['updated_by'] = $data['updated_by'];
		//$val['status'] = $data['status'];

		//slider_item table data
		$val2['lang_id'] = $this->session->userdata('language');
		$val2['alt_tag'] = $data['alt_tag'];
		$val2['slider_image'] = $data['slider_image'];
		$val2['created_at'] = $data['created_at'];
		$val2['created_by'] = $data['created_by'];
// 		$val2['updated_at'] = $data['updated_at'];
// 		$val2['updated_by'] = $data['updated_by'];
		
		$this->db->trans_begin();
		$this->db->insert('slider',$val);
		$val2['slider_id'] = $this->db->insert_id();
		$this->db->insert('slider_item',$val2);
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	
	function get_slider(){
		$this->db->select('si.*,s.sort,s.publish');
		$this->db->join('slider_item si','si.slider_id=s.sid');
		$result=$this->db->get_where('slider s',array('s.status'=>1,'si.status'=>1))->result_array();
		//print_r($this->db->last_query());
		return $result;
	}
}