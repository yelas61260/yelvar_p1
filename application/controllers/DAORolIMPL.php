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
		if ($this->lib->tienePermiso(3)) {
			$this->load->model('db/DAORol');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");

			$this->DAORol->insert($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(3)) {
			$this->load->model('db/DAORol');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");

			$this->DAORol->update($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
}