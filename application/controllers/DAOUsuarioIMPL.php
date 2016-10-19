<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOUsuarioIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Usuarios";
	}
	public function insert(){
		$this->load->model('db/DAOUsuario');

		$datos_array[0] = null;
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");
		$datos_array[3] = $this->input->post("p4");
		$datos_array[4] = $this->input->post("p5");
		$datos_array[5] = $this->input->post("p6");
		$datos_array[6] = $this->input->post("p7");
		$datos_array[7] = $this->input->post("p8");

		echo $this->DAOUsuario->insert($datos_array);
	}
	public function update(){
		$this->load->model('db/DAOUsuario');

		$datos_array[0] = $this->input->post("p1");
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");
		$datos_array[3] = $this->input->post("p4");
		$datos_array[4] = $this->input->post("p5");
		$datos_array[5] = $this->input->post("p6");
		$datos_array[6] = $this->input->post("p7");
		$datos_array[7] = $this->input->post("p8");

		echo $this->DAOUsuario->update($datos_array);
	}
	public function actionLogin(){
		$this->load->model('db/DAOUsuario');

		print_r($this->input->post("p1"));
		print_r($this->input->post("p2"));

		$this->DAOUsuario->getUserAuth($this->input->post("p1"), $this->input->post("p2"));
	}
	public function actionLongout(){
		$this->session->sess_destroy();
		header("Location: ".base_url()."login");
	}
}