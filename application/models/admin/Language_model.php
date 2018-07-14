
text/x-generic Language_model.php ( PHP script text )
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model {
	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->database();
	}
	
	function get_all_language(){
		$this->db->select('*');
		$result = $this->db->get_Where('languages',array('status'=>1))->result_array();
		return $result;
	}
	
	function language_edit($data){
		$this->db->trans_begin();
		$this->db->where('l_id',$data['id']);
		$this->db->update('languages',array(
				'l_name'=>$data['name'],
				'updated_at' => $data['updated_at'],
				'ip' => $data['ip'],
				'last_update_by' => $data['user_id']
				)
			);
		if($this->db->affected_rows()){
			$this->db->insert('logg',array(
					'user_id' => $this->session->userdata('user_id'),
					'event_id' => 2,
					'created_at' => $data['updated_at'],
					'remark' => $data['id']
			));
			
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return false;
			}
			else {
				$this->db->trans_commit();
				$file = FCPATH . '/software_files/Logg.txt';
				$msg = date('d-m-y h:i:s').' || user '.$this->session->userdata('identity').' update the language id '.$data['id'].PHP_EOL;
				file_put_contents ($file, $msg,FILE_APPEND);
				return true;
			}
		}
		else{
			return false;
		}
	}
	
	function language_create($data){
		$this->db->insert('languages',$data);
		$id = $this->db->insert_id();
		$result = $this->db->get_where('languages',array('l_id'=>$id))->result_array();
		return $result;
	}
	
	function language_delete($data){
		$this->db->trans_begin();
		$this->db->where('l_id',$data['id']);
		$this->db->update('languages',array(
				'updated_at' => $data['updated_at'],
				'ip' => $data['ip'],
				'last_update_by' => $data['user_id'],
				'status' => 0
				)
			);
		if($this->db->affected_rows()){
			//////////update log table 
			$this->db->insert('logg',array(
				'user_id' => $this->session->userdata('user_id'),
				'event_id' => 3,
				'created_at' => $data['updated_at'],
				'remark' => $data['id']
			));
			
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return false;
			}
			else {
				$this->db->trans_commit();
				$data['languages'] = $this->Language_model->get_all_language();
				$json = json_encode($data['languages']);
				$file = FCPATH . '/software_files/Language.txt';
				file_put_contents ($file, $json);
					
				$file = FCPATH . '/software_files/Logg.txt';
				$msg = date('d-m-y h:i:s').' || user '.$this->session->userdata('identity').' Delete the language id '.$data['id'].PHP_EOL;
				file_put_contents ($file, $msg,FILE_APPEND);
				
				return true;
			}
		}
		else{
			return false;
		}
	}
	
	function language_check($data){
		$this->db->select('*');
		$result = $this->db->get_where('languages',array('l_name'=>$data['str']))->result_array();
		if(count($result) == 1){
			return false;
		}
		else{
			return true;
		}
		
	}
}
?>