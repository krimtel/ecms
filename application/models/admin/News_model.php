<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function news_create($data){
		$val['news_contect'] = $data['news_contect'];
		$val['created_at'] = $data['created_at'];
		$val['created_by'] = $data['user_id'];
		$val['sort'] = $data['sort'];
		
		$this->db->trans_begin();
		
			$this->db->insert('news',$val);   //// insert news
			
			$val2['news_id'] = $this->db->insert_id();
			$val2['lang_id'] = 1;
			$val2['news_contect'] = $data['news_contect'];
			$val2['created_at'] = $data['created_at'];
			$val2['created_by'] = $data['user_id'];
			
			$this->db->insert('news_item',$val2);  //// insert news language table
			
			$this->db->select('*');
			$result = $this->db->get_where('news_item',array('id'=>$this->db->insert_id()))->result_array();
			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else {
			$this->db->trans_commit();
			return $result;
		}
	}
	
	function news_update($data){
		$this->db->trans_begin();
			$this->db->where('id',$data['news_id']);
			$this->db->update('news_item',array(
				'news_contect' => $data['news_contect'],
				'updated_at' => $data['created_at'],
				'updated_by' => $data['user_id']
			));
			
			$this->db->query("update news set updated_at = '".$data['created_at']."',updated_by=".$data['user_id']." where id = (select news_id from news_item where id=".$data['news_id'].")");
			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else {
			$this->db->trans_commit();
			return true;
		}
	}
	
	function news_list(){
		$this->db->select('ni.*,n.sort,n.publish');
		$this->db->join('news_item ni','ni.news_id = n.id','left');
		$this->db->join('languages l','l.l_id = ni.lang_id','left');
		$this->db->order_by('n.sort,n.created_at,n.updated_at','ASC');
		$result = $this->db->get_where('news n',array('n.status' => 1))->result_array();
		return $result;
	}
	
	function get_news_content($data){
		$this->db->select('ni.*,n.sort');
		$this->db->join('news n','n.id = ni.news_id');
		$result = $this->db->get_where('news_item ni',array('ni.news_id'=>$data['news_id'],'ni.lang_id'=>$data['lang_id'],'ni.status'=>1))->result_array();
		return $result;
	}
}
?>