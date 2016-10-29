<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOSolicitudIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de las Solicitudes";
	}
	public function insert(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitud');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");
			$datos_array[3] = $this->input->post("p4");
			$datos_array[4] = $this->input->post("p5");
			$datos_array[5] = $this->input->post("p6");
			$datos_array[6] = $this->input->post("p7");
			$datos_array[7] = $this->input->post("p8");
			$datos_array[8] = $this->input->post("p9");

			echo $this->DAOSolicitud->insert($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitud');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");
			$datos_array[3] = $this->input->post("p4");
			$datos_array[4] = $this->input->post("p5");
			$datos_array[5] = $this->input->post("p6");
			$datos_array[6] = $this->input->post("p7");
			$datos_array[7] = $this->input->post("p8");
			$datos_array[8] = $this->input->post("p9");

			echo $this->DAOSolicitud->update($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
}