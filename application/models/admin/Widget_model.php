<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function widget_create($data){
		if(isset($data['widget_id'])){
			
		}
		else{
			$this->db->trans_begin();
			$this->db->insert('widgets',array(
				'name' => $data['widget_name'],
				'created_at' => $data['created_at'],
				'created_by' => $data['created_by']
			));
			
			$id = $this->db->insert_id();
			
			$this->db->insert('widget_item',array(
				'widget_id' => $id,
				'lang_id' => $data['lang_id'],
				'content' => $data['widget_content'],
				'created_at' => $data['created_at'],
				'created_by' => $data['created_by'],
				'ip' => $data['ip']
			));
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return array('msg'=>'something wrong.','status'=>500);
			}
			else{
				$this->db->trans_commit();
				return array('msg'=>'Widget created successfully.','status'=>200);
			}
		}
	}
}
?>