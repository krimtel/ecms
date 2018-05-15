<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function event_create($data){
		//event table data
		$val['event_image'] = $data['event_image'];
		$val['title'] = $data['event_title'];
		$val['event_content'] = $data['event_desc'];
		$val['sort'] = $data['event_order'];
		$val['event_category']=$data['event_category'];
		$val['created_at'] = $data['created_at'];
		$val['created_by'] = $data['created_by'];
		//event_item table data
		$val2['lang_id'] = $this->session->userdata('language');
		$val2['title'] = $data['event_title'];
		$val2['event_content'] = $data['event_desc'];
		$val2['created_at'] = $data['created_at'];
		$val2['created_by'] = $data['created_by'];
		
		$this->db->trans_begin();
		$this->db->insert('events',$val);
		$val2['event_id'] = $this->db->insert_id();
		$this->db->insert('event_item',$val2);
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	
	function event_list(){
		$this->db->select('ei.*,e.sort,e.event_image,e.publish,e.event_category,e.is_home');
		$this->db->join('event_item ei','ei.event_id = e.id','left');
		$this->db->join('languages l','l.l_id = ei.lang_id','left');
		$this->db->order_by('e.sort,e.created_at,e.updated_at','ASC');
		$result = $this->db->get_where('events e',array('e.status' => 1,'ei.status'=>1))->result_array();
		return $result;
	}
	
	function get_event_content($data){
		$this->db->select('ei.*,e.sort,e.event_category');
		$this->db->join('events e','e.id = ei.event_id');
		$result = $this->db->get_where('event_item ei',array('ei.event_id'=>$data['event_id'],'ei.lang_id'=>$data['lang_id'],'ei.status'=>1))->result_array();
	
		if(count($result)>0){
				
		}else{
			$this->db->select('ei.*,e.sort');
			$this->db->join('events e','e.id = ei.event_id');
			$result = $this->db->get_where('event_item ei',array('ei.event_id'=>$data['event_id'],'ei.lang_id'=>1,'ei.status'=>1))->result_array();
		}
		return $result;
	}
	
	function event_publish($data){
		$this->db->where('id',$data['e_id']);
		$this->db->update('events',array('publish'=>$data['status']));
		return true;
	}
	function is_home($data){
		$this->db->where('id',$data['e_id']);
		$this->db->update('events',array('is_home'=>$data['status1']));
		return true;
	}
	
	function event_delete($data){
		$this->db->where('id',$data['e_id']);
		$this->db->update('events',array('status'=>0));
		return true;
	}
	
	function event_update($data){

		$this->db->trans_begin();		
		$this->db->select('event_id');
		$result = $this->db->get_where('event_item',array('id'=>$data['event_id'],'lang_id'=>(int)$this->session->userdata('language'),'status'=>1))->result_array();
		
		if(count($result) > 0){
			$this->db->where(array('id'=>$result[0]['event_id']));
			if(isset($data['event_image'])){
				$val['event_image'] = $data['event_image'];
				$this->db->update('events',array(
					'title' => $data['event_title'],
					'event_image' => $data['event_image'],
					'event_content' => $data['event_desc'],
					'sort' => $data['event_order'],
					'event_category'=>$data['event_category'],
					'updated_at' => $data['created_at'],
					'updated_by' => $data['created_by']
				));
			}
			else{
				$this->db->update('events',array(
					'title' => $data['event_title'],
					'event_content' => $data['event_desc'],
					'sort' => $data['event_order'],
					'event_category' => $data['event_category'],
					'updated_at' => $data['created_at'],
					'updated_by' => $data['created_by']
				));
			}
			
			
			$this->db->where(array('id'=>$data['event_id'],'lang_id'=>$this->session->userdata('language')));
			$this->db->update('event_item',array(
				'title' => $data['event_title'],
				'event_content' => $data['event_desc'],
				'updated_at' => $data['created_at'],
				'updated_by' => $data['created_by']
			));

		}	
		else{
			//subabmin update
			$this->db->select('event_id');
			$result = $this->db->get_where('event_item',array('id'=>$data['event_id'],'lang_id'=>1,'status'=>1))->result_array();
			
			$this->db->insert('event_item',array(
				'event_id' => $result[0]['event_id'],
				'lang_id' => $this->session->userdata('language'),
				'title' => $data['event_title'],
				'event_content' => $data['event_desc'],
				'created_at' => $data['created_at'],
				'created_by' => $data['created_by']
			));
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
		
	}
	
	function home_list_events(){
		$lang = $this->session->userdata('client_language');
		if($lang == ''){
			$lang = 1;
		}
		$this->db->select("ei.*,e.event_image,e.event_category,DATE_FORMAT(`e`.`created_at`,'%e %M, %Y') as created_at");
		$this->db->join('events e','e.id = ei.event_id');
		$this->db->order_by('e.sort,e.created_at,e.updated_at','ASC');
		$result = $this->db->get_where('event_item ei',array('ei.status' => 1,'e.status' => 1,'e.publish' => 1,'ei.lang_id' => $lang,'e.is_home' => 1))->result_array();
		//print_r($this->db->last_query()); die;
		return  $result;
		
	}
}
?>