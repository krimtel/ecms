<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/Users_model','admin/Slider_model','admin/Widget_model','Enam_model','admin/Event_model'));
		$this->load->library(array('session'));
	}
	
	function index(){
		if($this->session->userdata('client_language') == ''){
			$client_laguage = 1;
		}
		else{
			$client_laguage = $this->session->userdata('client_language');
		}
		
		$c = 1;
		$url_array ='';
		while($this->uri->segment($c) != ''){
			$url_array.= $this->uri->segment($c).'/'; 
			$c = $c + 1;	
		}
		$url_array = strtolower(rtrim($url_array,"/ "));
		
		$this->db->select('m.page_id');
		$this->db->join('pages p','p.p_id = m.page_id');
		$this->db->limit('1');
		$result = $this->db->get_Where('menu m',array('m.cms_url'=>$url_array,'m.status'=>1,'p.status'=>1,'p.publish'=>1,'m.external_link'=>0))->result_array();
		
		if(count($result)>0){
			$this->db->select('p.page_name,p.page_layout,pi.title,pi.meta_tag,pi.keywords,pi.page_body,pc.section,w.name,wi.content');
			$this->db->join('page_item pi','pi.page_id = p.p_id');
			$this->db->join('page_components pc','pc.page_id = p.p_id');
			$this->db->join('widgets w','w.w_id = pc.widget_id');
			$this->db->join('widget_item wi','wi.widget_id = w.w_id');
			$result = $this->db->get_where('pages p',array(
					'p.p_id'=>(int)$result[0]['page_id'],
					'p.status' => 1,
					'pi.lang_id' => (int)$client_laguage,
					'pi.status' => 1,
					'pc.status' => 1,
					'w.status' => 1,
					'wi.lang_id' => (int)$client_laguage,
					'wi.status' => 1
			))->result_array();
			
			$data['page_contents'] = $result;
			if(count($data['page_contents']) > 0){
				////////////////////////////////////
				//main logic
				$file_menu = json_decode(file_get_contents(FCPATH . '/software_files/Language.txt'),true);
				if(count($file_menu)){
					$data['languages'] = $file_menu;
				}
				else{
					$data['languages'] = $this->Language_model->get_all_language();
					$json = json_encode($data['languages']);
					$file = FCPATH . '/software_files/Language.txt';
					file_put_contents ($file, $json);
				}
				$data['page_layout'] = $result[0]['page_layout'];
				$data['page_title'] = $result[0]['title'];
				$data['keywords'] = $result[0]['keywords'];
				$data['title'] = 'eNam | '.$result[0]['title'].' | '.$data['keywords'];
				
				$data['head'] = $this->load->view('comman/head',$data,TRUE);
				
				$data['header'] = $this->load->view('comman/header',$data,TRUE);
				$data['menus'] = $this->Enam_model->all_menus();
				$data['navigation'] = $this->load->view('comman/navigation',$data,TRUE);
				$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
				$data['footer'] = $this->load->view('comman/footer','',TRUE);
				$data['slider'] = $this->load->view('pages/comman/slider','',TRUE);
				$data['links'] = $this->Enam_model->all_links();
				$data['quickLinks'] = $this->load->view('pages/comman/quickLinks',$data,TRUE);
				$data['newses'] = $this->Enam_model->all_news();
				$data['home_notice'] = $this->load->view('comman/home_notice',$data,TRUE);
				$data['events'] = $this->Event_model->home_list_events();
				$data['main_contant'] = $this->load->view('pages/layout-page',$data,TRUE);
				$this->load->view('comman/index',$data);
			}
			else{
				echo "no record found";
			}
		}
		else{
			$this->load->view('error');
		}
	}
}
