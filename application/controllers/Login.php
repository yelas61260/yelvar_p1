<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		if(empty($this->session->userdata("id"))){
			$this->load->view('viewLogin');
		}else{
			header("Location: ".base_url());
		}
	}

}