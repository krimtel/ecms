<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
	function get_all_parents_menu($p_id){
		$this->db->select('*');
		$this->db->order_by('sort');
		$result = $this->db->get_Where('menu',array('p_id'=>$p_id,'status'=>1))->result_array();
		return $result;
	}
	
	function menu_list(){
		$this->db->select('m.id,m.title,m.p_id, mi.m_id, mi.menu_name, mi.lang_id,l.l_name');
		$this->db->join('menu_item mi','mi.menu_id = m.id','left');
		$this->db->join('languages l','l.l_id = mi.lang_id','left');
		$this->db->order_by('m.sort','ASC');
		$result = $this->db->get_where('menu m',array('m.status' => 1))->result_array();
		return $result;
	}
}
?>