<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAORolPermisoIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la asignacion de Permisos a los Roles";
	}
	public function insert(){
		$this->load->model('db/DAORolPermiso');

		$datos_array[0] = null;
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");

		echo $this->DAORolPermiso->insert($datos_array);
	}
	public function update(){
		$this->load->model('db/DAORolPermiso');

		$datos_array[0] = $this->input->post("p1");
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");

		echo $this->DAORolPermiso->update($datos_array);
	}
}