<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function slider_create($data){
		$val['sid'] = $data['sid'];
		$val['alt_tag'] = $data['alt_tag'];
		$val['sort'] = $data['slider_order'];
		$val['created_at'] = $data['created_at'];
		$val['created_by'] = $data['created_by'];

		//slider_item table data
		$val2['lang_id'] = $this->session->userdata('language');
		$val2['alt_tag'] = $data['alt_tag'];
		$val2['slider_image'] = $data['slider_image'];
		$val2['created_at'] = $data['created_at'];
		$val2['created_by'] = $data['created_by'];		
		
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
	
	function slider_list(){
		$this->db->select('si.*,s.sort,s.publish');
		$this->db->join('slider_item si','si.slider_id=s.sid');
		$this->db->order_by('s.sort,s.created_at');
		$result=$this->db->get_where('slider s',array('s.status'=>1,'si.status'=>1))->result_array();
		return $result;
	}
	
	function slider_list_client(){
		$this->db->select('si.*,s.sort,s.publish');
		$this->db->join('slider_item si','si.slider_id=s.sid');
		$this->db->order_by('s.sort,s.created_at');
		$result=$this->db->get_where('slider s',array('s.status'=>1,'s.publish'=>1,'si.status'=>1))->result_array();
		return $result;
	}
	
	function slider_update($data){
		$this->db->trans_begin();
		$this->db->select('slider_id');
		$result = $this->db->get_where('slider_item',array('s_id'=>$data['sid'],'lang_id'=>(int)$this->session->userdata('language'),'status'=>1))->result_array();
	
		if(count($result) > 0){
			$this->db->where(array('sid'=>$result[0]['slider_id']));
			if(isset($data['slider_image'])){
				$this->db->update('slider',array(
						'alt_tag' => $data['alt_tag'],
						'sort' => $data['slider_order'],
						'updated_at' => $data['created_at'],
						'updated_by' => $data['created_by']
				));
			}
			else{
				$this->db->update('slider',array(
						'alt_tag' => $data['alt_tag'],
						'sort' => $data['slider_order'],
						'updated_at' => $data['created_at'],
						'updated_by' => $data['created_by']
				));
			}
				
			if(isset($data['slider_image'])){
				$this->db->where(array('s_id'=>$data['sid'],'lang_id'=>$this->session->userdata('language')));
				$this->db->update('slider_item',array(
						'alt_tag' => $data['alt_tag'],
						'slider_image' => $data['slider_image'],
						'updated_at' => $data['created_at'],
						'updated_by' => $data['created_by']
				));
			}
			else{ 
				$this->db->where(array('s_id'=>$data['sid'],'lang_id'=>$this->session->userdata('language')));
				$this->db->update('slider_item',array(
						'alt_tag' => $data['alt_tag'],
						'updated_at' => $data['created_at'],
						'updated_by' => $data['created_by']
				));
			}
	
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
	
	function slider_publish($data){
		$this->db->where('sid',$data['s_id']);
		$this->db->update('slider',array('publish'=>$data['status']));
		return true;
	}
	
	function slider_delete($data){
		$this->db->where('sid',$data['s_id']);
		$this->db->update('slider',array('status'=>0));
		return true;
	}
	
}