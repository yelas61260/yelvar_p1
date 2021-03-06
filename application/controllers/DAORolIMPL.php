<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class DAORolIMPL extends CI_Controller
{
	public function index(){
		echo "Servicio REST para la manipulacion de los Roles";
	}
	public function insert(){
		if ($this->lib->tienePermiso(3)) {
			$this->load->model('db/DAORol');
			$this->load->model('db/DAORolPermiso');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");

			$id_rol = $this->DAORol->insert($datos_array);

			if(!empty($this->input->post('extra')) && $this->input->post('extra')!=""){
				$datos_array = explode(";", $this->input->post('extra'));
				
				foreach ($datos_array as $dato_rol) {
					if($dato_rol != ""){
						$this->DAORolPermiso->insert([null, $id_rol, $dato_rol]);
					}
				}
			}
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(3)) {
			$this->load->model('db/DAORol');
			$this->load->model('db/DAORolPermiso');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");

			$this->DAORol->update($datos_array);

			if(!empty($this->input->post('extra')) && $this->input->post('extra')!=""){
				$datos_array_extra = explode(";", $this->input->post('extra'));

				$permisos_rol = $this->DAORol->getPermisos($datos_array[0]);

				foreach ($datos_array_extra as $dato_permiso) {
					if($dato_permiso != "" && !$this->lib->existeEnArreglo($permisos_rol, $dato_permiso)){
						$this->DAORolPermiso->insert([null, $datos_array[0], $dato_permiso]);
					}
				}
				$permisos_rol = $this->DAORol->getPermisos($datos_array[0]);
				foreach ($permisos_rol as $dato_rol) {
					if (!$this->lib->existeEnArreglo($datos_array_extra, $dato_rol)) {
						$this->DAORolPermiso->deletePermiso($datos_array[0], $dato_rol);
					}
				}
			}
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function delete_fun(){
		if ($this->lib->tienePermiso(3)) {
			$this->load->model('db/DAORol');

			$this->DAORol->delete($this->input->post("id"));
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function getRecords(){
		if ($this->lib->tienePermiso(7)) {
			$this->load->model('db/DAORol');

			$etiquetas = $this->DAORol->getCampos();
			$datos = $this->DAORol->getDataFormById($this->input->post("id"));
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