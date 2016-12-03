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
		if ($this->lib->tienePermiso(4)) {
			$this->load->model('db/DAODespacho');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");

			$this->DAODespacho->insert($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(4)) {
			$this->load->model('db/DAODespacho');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");

			$this->DAODespacho->update($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function getRecords(){
		if ($this->lib->tienePermiso(7)) {
			$this->load->model('db/DAODespacho');

			$etiquetas = $this->DAODespacho->getCampos();
			$datos = $this->DAODespacho->getDataFormById($this->input->post("id"));
			$datosSTR = "";

			$tam = count($etiquetas);
			for($i = 0; $i<$tam-1; $i++) {
				$datosSTR .= $datos[$etiquetas[$i]]."".$this->lib->separador();
			}
			$datosSTR .= $datos[$etiquetas[$tam-1]]."";
			echo $datosSTR;
		}else{
			header("Location: ".base_url());
		}
	}
}