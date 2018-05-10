<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enam_ctrl extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
		$this->load->database();
		$this->load->model(array('admin/Language_model','admin/Users_model','admin/Widget_model','Enam_model'));
		$this->load->library(array('session'));
	}
	
	function hooks_fun(){
		echo "testing hooks";
	}
	
	public function index(){
		$data['title'] = 'eNam';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		
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
		
		$data['header'] = $this->load->view('comman/header',$data,TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['slider'] = $this->load->view('pages/comman/slider','',TRUE);
		$data['links'] = $this->Enam_model->all_links();
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks',$data,TRUE);
		$data['newses'] = $this->Enam_model->all_news();
		$data['home_notice'] = $this->load->view('comman/home_notice',$data,TRUE);
		$data['main_contant'] = $this->load->view('pages/dashboard',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	/*Register*/
	public function register()
	{
		$data['title'] = 'Registration';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/register/register',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	/*state_unified_license*/
	public function state_unified_license()
	{
		$data['title'] = 'State Unified License';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		//$data['header'] = $this->load->view('comman/header','',TRUE);
		//$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		//$data['footer'] = $this->load->view('comman/footer','',TRUE);
		//$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		//$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['main_contant'] = $this->load->view('pages/state_licence/state_unified_license',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	
	/*About us Section*/
	public function about_us()
	{
		$data['title'] = 'About Us';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/nam/about-nam',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	public function implementation_progress()
	{
		$data['title'] = 'Implementation Progress';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/nam/implementation-progress',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	public function key_stakeholders()
	{
		$data['title'] = 'Key Stakeholders';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/nam/key-stakeholders',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	public function usefull_links()
	{
		$data['title'] = 'Usefull Links';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/nam/usefull-links',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	/*Farmer */
	
	public function approved_commodities()
	{
		$data['title'] = 'Approved Commodities';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/farmer/approved-commodities',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	public function commodity_quality_parameters()
	{
		$data['title'] = 'Commodity Quality Parameters';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/farmer/commodity-quality-parameters',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	public function enrolled_mandis()
	{
		$data['title'] = 'Enrolled Mandis';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/farmer/enrolled-mandis',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	/*traders*/
	
	public function commodity_price()
	{
		$data['title'] = 'Commodity Price';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/trader/commodity-price',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	public function manuals_guides()
	{
		$data['title'] = 'Manuals Guides';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/trader/manuals-guides',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	public function unified_license_guidelines()
	{
		$data['title'] = 'Unified License Guidelines';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/trader/unified-license-guidelines',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	/*MIS*/
	public function mis()
	{
		$data['title'] = 'MANAGEMENT INFOMATION SYSTEM';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('pages/statistics/mis',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	public function report()
	{
		$data['title'] = 'Report';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['main_contant'] = $this->load->view('pages/statistics/report',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	/*elearning*/
	public function elearning()
	{
		$data['title'] = 'eLearning';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/elearning/elearning',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	/*contact us*/
	public function contact_us()
	{
		$data['title'] = 'Contact Us';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/contactus/contact-us',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	public function feedback()
	{
		$data['title'] = 'Feedback';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/contactus/feedback',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	public function faq()
	{
		$data['title'] = 'FAQ';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/contactus/faq',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	/*download*/
	public function download()
	{
		$data['title'] = 'Download';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/download/download',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	/*Logistic Details*/
	public function logistic_details()
	{
		$data['title'] = 'Logistic Details';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		//$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/logistic/logistic-details',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	/*Training Calender*/
	public function training_calender()
	{
		$data['title'] = 'Training Calender';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		$data['header'] = $this->load->view('comman/header','',TRUE);
		$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		//$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/training-calender/training-calender',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	public function training_calender1()
	{
		$data['title'] = 'Training Calender1';
		$data['head'] = $this->load->view('comman/head','',TRUE);
		//$data['header'] = $this->load->view('comman/header','',TRUE);
		//$data['navigation'] = $this->load->view('comman/navigation','',TRUE);
		$data['footer'] = $this->load->view('comman/footer','',TRUE);
		//$data['quickLinks'] = $this->load->view('pages/comman/quickLinks','',TRUE);
		//$data['marqueeSection'] = $this->load->view('pages/comman/marqueeSection','',TRUE);
		$data['banner'] = $this->load->view('pages/comman/banner','',TRUE);
		$data['main_contant'] = $this->load->view('pages/training-calender/training-calender1',$data,TRUE);
		$this->load->view('comman/index',$data);
	}
	
	
}
