<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAODespachoIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Despachos";
	}
	public function insert(){
		$this->load->model('db/DAODespacho');

		$datos_array[0] = null;
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");

		echo $this->DAODespacho->insert($datos_array);
	}
	public function update(){
		$this->load->model('db/DAODespacho');

		$datos_array[0] = $this->input->post("p1");
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");

		echo $this->DAODespacho->update($datos_array);
	}
}