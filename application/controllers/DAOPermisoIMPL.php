<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOPermisoIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Permisos";
	}
	public function insert(){
		if ($this->lib->tienePermiso(9)) {
			$this->load->model('db/DAOPermiso');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");

			echo $this->DAOPermiso->insert($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(9)) {
			$this->load->model('db/DAOPermiso');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");

			echo $this->DAOPermiso->update($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
}