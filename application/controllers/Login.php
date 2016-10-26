<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		if(empty($this->session->userdata("id"))){
			$data= array(
				'titulo'=>'Login',
				'StyleView'=>$this->lib->style_login(), 
				'Header'=>$this->lib->print_header(), 
				'Footer'=>$this->lib->print_footer(), 
				);
			$this->load->view('viewLogin',$data);
		}else{

			header("Location: ".base_url());
		}
	}

}