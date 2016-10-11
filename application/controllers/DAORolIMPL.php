<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAORolIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Roles";
	}
	public function insert(){
		$this->load->model('db/DAORol');

		$datos_array[0] = null;
		$datos_array[1] = $this->input->post("p2");

		echo $this->DAORol->insert($datos_array);
	}
}