<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
	function get_all_parents_menu($p_id){
		$this->db->select('*');
		$this->db->order_by('sort');
		$result = $this->db->get_Where('menu',array('p_id'=>$p_id,'status'=>1))->result_array();
		return $result;
	}
}
?>