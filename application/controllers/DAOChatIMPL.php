<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAOChatIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de las Veredas";
	}
	public function insert(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOChat');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p1");
			$datos_array[2] = $this->input->post("p2");
			$datos_array[3] = $this->input->post("p3");
			$datos_array[4] = time();

			$this->DAOChat->insert($datos_array);
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}

	public function getRecords(){
		//if ($this->lib->tienePermiso(1)) {
			$mensaje_str = '';
			$this->load->model('db/DAOChat');

			$result = $this->DAOChat->getConversacion($this->input->post("p1"), $this->input->post("p2"));
			for ($i=9; $i >= 0 ; $i--) { 
				$mensaje_str .= "<p><b>".$result[$i]['nombre_usuario'].":</b> ".$result[$i]['mensaje']."</p>";
			}
			echo $mensaje_str;
		//}else{
		//	header("Location: ".base_url());
		//}
	}
}