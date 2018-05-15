<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function all_widgets(){
		$this->db->select('*');
		$result = $this->db->get_where('widgets',array('status'=>1))->result_array();
		return $result;
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
	
	function widget_list(){
// 		$this->db->select('content');
// 		$result=$this->db->get('widget_item')->result_array();
// 		return $result;
		$this->db->select('widget_item.id,widgets.w_id,widgets.name,widget_item.content');
		$this->db->join('widget_item','widget_item.widget_id=widgets.w_id');
		$result=$this->db->get_where('widgets',array('widgets.status'=>1))->result_array();
		//print_r($this->db->last_query()); die;
		return $result;
	}
	
	function widget_update($data){
// 		$group = $this->session->userdata('group_name');
// 		$ip=$data['ip'];
		
// 		if($group != 'admin' && $group != 'developer'){
// 			$this->db->select('widget_id');
// 			$result = $this->db->get_where('widget_item',array('id' => $data['widget_id'],'status' => 1))->result_array();
// 			$widget=array();
// 			if(count($result>0)){
// 				$this->db->select('*');
// 				$widget = $this->db->get_where('widget_item',array('lang_id'=>$data['lang_id'],'widget_id' => $result[0]['widget_id'],'status' => 1))->result_array();
// 			}
// 			if(count($widget) > 0){
// 				$this->db->where('id',$widget[0]['id']);
// 				$this->db->update('widget_item',array(
// 						'content' => $data['content'],
// 						'updated_at' =>  $data['created_at'],
// 						'updated_by' => $data['user_id'],
// 						'ip'=>$data['ip']
// 				));
// 			}
// 			else {
// 				$this->db->insert('widget_item',array(
// 						'widget_id' => $result[0]['widget_id'],
// 						'lang_id' => $data['lang_id'],
// 						'content' => $data['content'],
// 						'created_at' =>  $data['created_at'],
// 						'created_by' => $data['user_id'],
// 						'ip'=>$data['ip']
// 				));
// 			}
// 			return false;
// 		}
// 		else {
// 			$this->db->trans_commit();
// 			return true;
// 		}
		
		$this->db->where('w_id', $post['widget_id']);
		$dbdata = array(
				"content" => $post['widget_content'],
				"widget_name"=>$post['widget_name'],
				"updated_at" => $post['updated_at'],
				"updated_by" => $post['updated_by'],
				"ip" => $post['ip'],
				"lang_id" => $post['lang_id'],
		);
		$upd=$this->db->update('widget_item', $dbdata);
		return $upd;

 	}
	
	function widget_delete($data){
		//$data['w_id'] = $this->input->post('w_id');
		$this->db->where('w_id',$data['w_id']);
		$this->db->update('widgets',array('status'=>0));
		print_r($this->db->last_query()); die;
		return true;
	}
	
	function widget_content($data){
// 		$data['widget_id'] = $this->input->post('widget_id');
// 		$this->db->select('widgets.name,widget_item.*');
// 		$this->db->join('widget_item',' widget_item.widget_id = widgets.w_id');
// 		$result=$this->db->get_where('widgets',array('widgets.status'=>1,'widget_item.widget_id'=>$data['widget_id']))->result_array();
// 		print_r($this->db->last_query()); die;
		
// 		select w.name,wi.* from widgets w join widget_item wi on wi.widget_id = w.w_id WHERE w.status = 1

// 		SELECT w.name, wi.* FROM widgets w JOIN widget_item wi ON wi.widget_id = w.w_id WHERE w.status = 1

		$this->db->select('w.name,wi.*');
		$this->db->join('widget_item wi','wi.widget_id = w.w_id');
		$result = $this->db->get_where('widgets w',array('w.status'=>1,'wi.id'=>$data['widget_id']))->result_array();
		//print_r($this->db->last_query()); die;
		return $result;
	}
}
?>