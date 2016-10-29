<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOCorregimientoIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Corregimientos";
	}
	public function insert(){
		if ($this->lib->tienePermiso(7)) {
			$this->load->model('db/DAOCorregimiento');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");

			echo $this->DAOCorregimiento->insert($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(7)) {
			$this->load->model('db/DAOCorregimiento');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");

			echo $this->DAOCorregimiento->update($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
}