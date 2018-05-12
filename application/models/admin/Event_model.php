<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function event_create($data){
		$val['event_image'] = $data['event_image'];
		$val['event_content'] = $data['event_desc'];
		$val['sort'] = $data['event_order'];
		$val['created_at'] = $data['created_at'];
		$val['created_by'] = $data['created_by'];
		print_r($val); die;
	}
}
?>