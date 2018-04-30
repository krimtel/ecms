<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_hook extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->helper(array('url','file'));
	}

	function hooks_fun(){
		//$string = read_file('./application/config/routes.php');
		//print_r($string); die;
		//redirect('Ctrl');
	}
}
