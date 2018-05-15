<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->database();
	}
	
	function get_all_language(){
		$this->db->select('*');
		$result = $this->db->get_Where('languages',array('status'=>1))->result_array();
		return $result;
	}
	
	function language_edit($data){
		
		$this->db->where('l_id',$data['id']);
		$this->db->update('languages',array(
				'l_name'=>$data['name'],
				'updated_at' => $data['updated_at'],
				'ip' => $data['ip'],
				'last_update_by' => $data['user_id']
				)
			);
		return true;
	}
	
	function language_create($data){
		$this->db->insert('languages',$data);
		$id = $this->db->insert_id();
		$result = $this->db->get_where('languages',array('l_id'=>$id))->result_array();
		return $result;
	}
	
	function language_delete($data){
		$this->db->where('l_id',$data['id']);
		$this->db->update('languages',array(
				'updated_at' => $data['updated_at'],
				'ip' => $data['ip'],
				'last_update_by' => $data['user_id'],
				'status' => 0
				)
			);
		
		
			$data['languages'] = $this->Language_model->get_all_language();
			$json = json_encode($data['languages']);
			$file = FCPATH . '/software_files/Language.txt';
			file_put_contents ($file, $json);
		
		return true;
	}
	
	function language_check($data){
		$this->db->select('*');
		$result = $this->db->get_where('languages',array('l_name'=>$data['str']))->result_array();
		if(count($result) == 1){
			return false;
		}
		else{
			return true;
		}
		
	}
}
?>