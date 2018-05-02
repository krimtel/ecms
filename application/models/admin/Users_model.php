<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function get_all_lang_users($u_id = null){
		$this->db->select('u.id,u.username,g.name,l.l_name,l.l_id');
		$this->db->join('users_groups ug','ug.user_id = u.id');
		$this->db->join('groups g','g.id = ug.group_id');
		$this->db->join('users_language ul','ul.user_id = u.id');
		$this->db->join('languages l','l.l_id = ul.lang_id');
		if($u_id != null){
			$this->db->where('u.id',$u_id);
		}
		$result = $this->db->get_Where('users u',array('ug.group_id'=>3,'ul.status'=>1,'u.active'=>1))->result_array();
		return $result;
	}
	
	function get_all_users(){
		$this->db->select('u.id,u.username');
		$this->db->join('users_groups ug','ug.user_id = u.id');
		$this->db->join('groups g','g.id = ug.group_id');
		$result = $this->db->get_Where('users u',array('ug.group_id'=>3,'u.active'=>1))->result_array();
		return $result;
	}
	
	function get_user_language($u_id){
		$this->db->select('*');
		$result = $this->db->get_where('users_language',array('user_id'=>$u_id,'status'=>1))->result_array();
		return $result;
	}
	
	function user_language_update($data){
		$this->db->where('user_id',$data['u_id']);
		$this->db->update('users_language',array(
			'lang_id' => $data['lang_id'],
			'updated_at' => $data['updated_at'],
			'updated_by' => $data['user_id']
		));
		return true;
	}
	
	function user_language_create($data){
		$this->db->insert('users_language',$data);
		$result = $this->get_all_lang_users($data['user_id']);
		return $result;
	}
	
	function user_language_delete($data){
		$this->db->where('user_id',$data['user_id']);
		$this->db->update('users_language',array(
				'updated_at' => $data['updated_at'],
				'status' => 0,
				'updated_by' => $data['updated_by']
		));
		return true;
	}
}
?>