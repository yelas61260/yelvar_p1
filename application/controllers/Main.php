<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->lib->tienePermiso(0)){
			$data = array(
				'titulo'=>'Bienvenidos',
				'StyleView'=>$this->lib->style_home(), 
				'Header'=>$this->lib->print_header(), 
				'Footer'=>''/*$this->lib->print_footer()*/ 
				);
			$this->load->view('viewHome',$data);
		}else{
			header('Location: ' . base_url() . 'login');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */