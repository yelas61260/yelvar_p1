<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOVeredaIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de las Veredas";
	}
	public function insert(){
		$this->load->model('db/DAOVereda');

		$datos_array[0] = null;
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");

		echo $this->DAOVereda->insert($datos_array);
	}
}