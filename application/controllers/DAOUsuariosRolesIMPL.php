<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOUsuariosRolesIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la asignacion de Roles a los Usuarios";
	}
	public function insert(){
		$this->load->model('db/DAOUsuariosRoles');

		$datos_array[0] = null;
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");

		echo $this->DAOUsuariosRoles->insert($datos_array);
	}
}