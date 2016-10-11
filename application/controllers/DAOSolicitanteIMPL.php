<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOSolicitanteIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Solicitantes";
	}
	public function insert(){
		$this->load->model('db/DAOSolicitante');

		$datos_array[0] = null;
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");
		$datos_array[3] = $this->input->post("p4");
		$datos_array[4] = $this->input->post("p5");
		$datos_array[5] = $this->input->post("p6");
		$datos_array[6] = $this->input->post("p7");
		$datos_array[7] = $this->input->post("p8");
		$datos_array[8] = $this->input->post("p9");
		$datos_array[9] = $this->input->post("p10");
		$datos_array[10] = $this->input->post("p11");

		echo $this->DAOSolicitante->insert($datos_array);
	}
	public function update(){
		$this->load->model('db/DAOSolicitante');

		$datos_array[0] = $this->input->post("p1");
		$datos_array[1] = $this->input->post("p2");
		$datos_array[2] = $this->input->post("p3");
		$datos_array[3] = $this->input->post("p4");
		$datos_array[4] = $this->input->post("p5");
		$datos_array[5] = $this->input->post("p6");
		$datos_array[6] = $this->input->post("p7");
		$datos_array[7] = $this->input->post("p8");
		$datos_array[8] = $this->input->post("p9");
		$datos_array[9] = $this->input->post("p10");
		$datos_array[10] = $this->input->post("p11");

		echo $this->DAOSolicitante->update($datos_array);
	}
}