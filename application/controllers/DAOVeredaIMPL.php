<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOVeredaIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de las Veredas";
	}
	public function insert(){
		if ($this->lib->tienePermiso(6)) {
			$this->load->model('db/DAOVereda');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");

			$this->DAOVereda->insert($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(6)) {
			$this->load->model('db/DAOVereda');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");

			$this->DAOVereda->update($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function delete_fun(){
		if ($this->lib->tienePermiso(6)) {
			$this->load->model('db/DAOVereda');

			$this->DAOVereda->delete($this->input->post("id"));
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function getRecords(){
		if ($this->lib->tienePermiso(6)) {
			$this->load->model('db/DAOVereda');

			$etiquetas = $this->DAOVereda->getCampos();
			$datos = $this->DAOVereda->getDataFormById($this->input->post("id"));
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
	public function getListVeredas(){
		if ($this->lib->tienePermiso(6) || $this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOVereda');
			echo $this->DAOVereda->getList($this->input->post("id"));
		}else{
			header("Location: ".base_url());
		}
	}
}