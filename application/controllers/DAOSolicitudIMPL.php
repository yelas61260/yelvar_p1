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
			$this->load->model('db/DAOSolicitante');
			$this->load->model('db/DAOFotos');

			$id_solicitante = 0;
			$obj_solicitante = $this->DAOSolicitante->getByCedula($this->input->post("p2"));
			if($obj_solicitante == null){
				$datos_foto[0] = null;
				$datos_foto[1] = $this->input->post("p9");

				$datos1_array[0] = null;
				$datos1_array[1] = $this->input->post("p2");
				$datos1_array[2] = $this->input->post("p3");
				$datos1_array[3] = $this->input->post("p4");
				$datos1_array[4] = $this->input->post("p5");
				$datos1_array[5] = $this->input->post("p6");
				$datos1_array[6] = $this->input->post("p7");
				$datos1_array[7] = $this->input->post("p8");
				$datos1_array[8] = $this->DAOFotos->insert($datos_foto);
				$datos1_array[9] = time();
				$datos1_array[10] = time();
				$id_solicitante = $this->DAOSolicitante->insert($datos1_array);
			}else{
				$id_solicitante = $obj_solicitante["id"];
			}
			

			$datos2_array[0] = null;
			$datos2_array[1] = $this->input->post("p10");
			$datos2_array[2] = $id_solicitante;
			$datos2_array[3] = $this->session->userdata("id");
			$datos2_array[4] = $this->input->post("p11");
			$datos2_array[5] = $this->input->post("p12");
			$datos2_array[6] = time();
			$datos2_array[7] = $this->input->post("p13");
			$datos2_array[8] = $this->input->post("p14");

			$this->DAOSolicitud->insert($datos2_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitud');
			$this->load->model('db/DAOSolicitante');

			$obj_solicitante = $this->DAOSolicitante->getByCedula($this->input->post("p2"));

			$datos2_array[0] = $this->input->post("p1");
			$datos2_array[1] = $this->input->post("p10");
			$datos2_array[2] = $obj_solicitante["id"];
			$datos2_array[3] = $this->session->userdata("id");
			$datos2_array[4] = $this->input->post("p11");
			$datos2_array[5] = $this->input->post("p12");
			$datos2_array[6] = time();
			$datos2_array[7] = $this->input->post("p13");
			$datos2_array[8] = $this->input->post("p14");

			$this->DAOSolicitud->update($datos2_array);

			$datos1_array[0] = $obj_solicitante["id"];
			$datos1_array[1] = $this->input->post("p2");
			$datos1_array[2] = $this->input->post("p3");
			$datos1_array[3] = $this->input->post("p4");
			$datos1_array[4] = $this->input->post("p5");
			$datos1_array[5] = $this->input->post("p6");
			$datos1_array[6] = $this->input->post("p7");
			$datos1_array[7] = $this->input->post("p8");
			$datos1_array[8] = $this->input->post("p9");

			$this->DAOSolicitante->update($datos1_array);

			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function getRecords(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitud');
			$this->load->model('db/DAOSolicitante');

			$etiquetas_solicitud = $this->DAOSolicitud->getCamposForm();
			$datos_solicitud = $this->DAOSolicitud->getDataFormById($this->input->post("id"));

			$etiquetas_solicitante = $this->DAOSolicitante->getCamposForm();
			$datos_solicitante = $this->DAOSolicitante->getDataFormById($datos_solicitud[$etiquetas_solicitud[1]]);

			$datosSTR = $datos_solicitud[$etiquetas_solicitud[0]]."".$this->lib->separador();

			$tam = count($etiquetas_solicitante);
			for($i = 1; $i<$tam; $i++) {
				$datosSTR .= $datos_solicitante[$etiquetas_solicitante[$i]]."".$this->lib->separador();
			}

			$tam = count($etiquetas_solicitud);
			for($i = 2; $i<$tam-1; $i++) {
				$datosSTR .= $datos_solicitud[$etiquetas_solicitud[$i]]."".$this->lib->separador();
			}
			$datosSTR .= $datos_solicitud[$etiquetas_solicitud[$tam-1]]."";
			echo $datosSTR;
		}else{
			header("Location: ".base_url());
		}
	}
}