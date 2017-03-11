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
		if ($this->lib->tienePermiso(1)) {
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

			echo $this->DAOSolicitante->insert($datos_array);
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(1)) {
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

			$this->DAOSolicitante->update($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function delete_fun(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitante');

			$this->DAOSolicitante->delete($this->input->post("id"));
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function getRecords(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitante');

			$etiquetas_solicitante = $this->DAOSolicitante->getCamposForm();
			$datos_solicitante = $this->DAOSolicitante->getByCedula($this->input->post("id"));

			$datosSTR = "";

			$tam = count($etiquetas_solicitante);
			for($i = 0; $i<$tam-1; $i++) {
				$datosSTR .= $datos_solicitante[$etiquetas_solicitante[$i]]."".$this->lib->separador();
			}
			$datosSTR .= $datos_solicitante[$etiquetas_solicitante[$tam-1]]."";
			echo $datosSTR;
		}else{
			header("Location: ".base_url());
		}
	}
	public function getFoto(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOFotos');

			$foto = $this->DAOFotos->getFotoById($this->input->post("id"));
			$this->output->set_output('data:image/png;base64,'.base64_encode($foto));
		}else{
			header("Location: ".base_url());
		}
	}
}