<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOTipoAyudaIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Tipos de Ayuda";
	}
	public function insert(){
		if ($this->lib->tienePermiso(9)) {
			$this->load->model('db/DAOTipoAyuda');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");

			echo $this->DAOTipoAyuda->insert($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(10)) {
			$this->load->model('db/DAOTipoAyuda');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");

			echo $this->DAOTipoAyuda->update($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
}