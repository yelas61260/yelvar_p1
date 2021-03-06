<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Reporte extends CI_Controller
{
	public function index(){
		echo "Servicios para descargar los reportes";
	}
	public function reporteFiltrado(){
		if ($this->lib->tienePermiso(9)) {
			$this->load->model('Reportes');
			$data = array(
				'titulo' => 'Reporte Completo',
				'tabla' => $this->Reportes->reporteFiltrado($this->input->post("p1"),$this->input->post("p2"),$this->input->post("p3"),$this->input->post("p4"),explode(',', $this->input->post("p5")))
				);
			$this->load->view('reporte/viewExcelExport',$data);
		}else{
			header("Location: ".base_url());
		}
	}
	public function reporteCompleto(){
		if ($this->lib->tienePermiso(9)) {
			$this->load->model('Reportes');
			$data = array(
				'titulo' => 'Reporte Completo',
				'tabla' => $this->Reportes->reporteCompleto()
				);
			$this->load->view('reporte/viewExcelExport',$data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function reporteDeudaPersona(){
		if ($this->lib->tienePermiso(9)) {
			$this->load->model('Reportes');
			$data = array(
				'titulo' => 'Reporte Deuda Persona',
				'tabla' => $this->Reportes->reporteDeudaPersona()
				);
			$this->load->view('reporte/viewExcelExport',$data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function reporteDeudaVereda(){
		if ($this->lib->tienePermiso(9)) {
			$this->load->model('Reportes');
			$data = array(
				'titulo' => 'Reporte Deuda Vereda',
				'tabla' => $this->Reportes->reporteDeudaVereda()
				);
			$this->load->view('reporte/viewExcelExport',$data);
		}else{
			header("Location: ".base_url());
		}
	}
}