<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function video_create($data){
		//video table data
		
		$val['v_title'] = $data['v_title'];
		$val['v_content'] = $data['v_desc'];
		$val['sort']=$data['v_order'];
		$val['created_at'] = $data['created_at'];
		$val['created_by'] = $data['created_by'];
		$this->db->trans_begin();
		$this->db->insert('video',$val);
		//video_item table data
		$val2['video_id'] = $this->db->insert_id();
		$val2['v_url'] = $data['v_url'];
		$val2['lang_id'] = $this->session->userdata('language');
		$val2['v_title'] = $data['v_title'];
		$val2['v_content'] = $data['v_desc'];
		$val2['created_at'] = $data['created_at'];
		$val2['created_by'] = $data['created_by'];
		
		$this->db->insert('video_item',$val2);
	
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
			//print_r($this->db->last_query());
		}
	}

	
	function Video_list(){
		$this->db->select('vi.*,v.sort,v.publish');
		$this->db->join('video v','v.v_id=vi.video_id');
		$this->db->order_by('v.sort,v.created_at,v.updated_at','ASC');
		$result=$this->db->get_where('video_item vi',array('v.status'=>1, 'vi.status'=>1))->result_array();
		
		return $result;
	}
	
	function video_publish($data){
	    $this->db->where('v_id',$data['v_id']);
	    $this->db->update('video',array('publish'=>$data['status']));
	    return true;
	}
	
	function video_delete($data){
	    $this->db->where('v_id',$data['v_id']);
	    $this->db->update('video',array('status'=>0));
	    return true;
	}
	function get_video_data($data){
		$this->db->select('vi.*,v.sort');
		$this->db->join('video v','v.v_id = vi.video_id');
		$result = $this->db->get_where('video_item vi',array('vi.video_id'=>$data['v_id'],'vi.lang_id'=>$data['lang_id'],'vi.status'=>1))->result_array();
		
		if(count($result)>0){
				
		}else{
			$this->db->select('vi*,v.sort');
			$this->db->join('video v','v.v_id = vi.video_id');
			$result = $this->db->get_where('video_item vi',array('vi.video_id'=>$data['v_id'],'vi.lang_id'=>1,'ni.status'=>1))->result_array();
		}
		return $result;
	}
	
	function video_update($data){
		$val1['v_url']  =  $data['v_url'];
		$val1['v_title']  =  $data['v_title'];
		$val1['v_content']  =  $data['v_content'];
		$val1['sort']  =  $data['sort'];
		$val1['updated_at']  =  $data['updated_at'];
		$val1['updated_by']  =  $data['updated_by'];
		$val1['v_id']  =  $data['v_id'];
		
		$this->db->trans_begin();
		$this->db->where('video_id',$data['v_id']);
		$this->db->update('video_item',array(
				'v_content' => $data['v_content'],
				'updated_at' => $data['updated_at'],
				'updated_by' => $data['updated_by'],
				'v_url' => $data['v_url']
		));

		$this->db->query("update video set updated_at = '".$data['updated_at']."',updated_by='".$data['updated_by']."',sort='".$data['sort']."',v_title='".$data['v_title']."'
				where v_id = (select video_id from video_item where v_id=".$data['v_id'].")");
	//	print_r($this->db->last_query()); die;
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else {
			$this->db->trans_commit();
			return true;
		}
	}
}
