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
		if ($this->lib->tienePermiso(2)) {
			$this->load->model('db/DAOUsuario');
			$this->load->model('db/DAOUsuarioRol');

			$datos_array[0] = null;
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");
			$datos_array[3] = $this->input->post("p4");
			$datos_array[4] = $this->input->post("p5");
			$datos_array[5] = $this->input->post("p6");
			$datos_array[6] = time();
			$datos_array[7] = time();

			$id_user = $this->DAOUsuario->insert($datos_array);

			if(!empty($this->input->post('extra')) && $this->input->post('extra')!=""){
				$datos_array = explode(";", $this->input->post('extra'));

				foreach ($datos_array as $dato_rol) {
					if($dato_rol != ""){
						$this->DAOUsuarioRol->insert([null, $id_user, $dato_rol]);
					}
				}
			}
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function update(){
		if ($this->lib->tienePermiso(2)) {
			$this->load->model('db/DAOUsuario');
			$this->load->model('db/DAOUsuarioRol');

			$datos_array[0] = $this->input->post("p1");
			$datos_array[1] = $this->input->post("p2");
			$datos_array[2] = $this->input->post("p3");
			$datos_array[3] = $this->input->post("p4");
			$datos_array[4] = $this->input->post("p5");
			$datos_array[5] = $this->input->post("p6");
			$datos_array[6] = time();

			$this->DAOUsuario->update($datos_array);

			if(!empty($this->input->post('extra')) && $this->input->post('extra')!=""){
				$datos_array_extra = explode(";", $this->input->post('extra'));

				$roles_user = $this->DAOUsuario->getRoles($datos_array[0]);
				print_r($roles_user);
				print_r($datos_array[0]);

				foreach ($datos_array_extra as $dato_rol) {
					if($dato_rol != "" && !$this->lib->existeEnArreglo($roles_user, $dato_rol)){
						$this->DAOUsuarioRol->insert([null, $datos_array[0], $dato_rol]);
					}
				}
				$roles_user = $this->DAOUsuario->getRoles($datos_array[0]);
				foreach ($roles_user as $dato_rol) {
					if (!$this->lib->existeEnArreglo($datos_array_extra, $dato_rol)) {
						$this->DAOUsuarioRol->deleteRol($datos_array[0], $dato_rol);
					}
				}
			}
			echo "OK";
		}else{
			header("Location: ".base_url());
		}
	}
	public function makeAdmin($user_id){
		if ($this->lib->tienePermiso(8)) {
			$this->load->model('db/DAOUsuario');
			$this->DAOUsuario->makeAdmin($user_id);
		}else{
			header("Location: ".base_url());
		}
	}
	public function removeadmin($user_id){
		if ($this->lib->tienePermiso(8)) {
			$this->load->model('db/DAOUsuario');
			$this->DAOUsuario->removeadmin($user_id);
		}else{
			header("Location: ".base_url());
		}
	}
	public function actionLogin(){
		$this->load->model('db/DAOUsuario');

		print_r($this->input->post("p1"));
		print_r($this->input->post("p2"));

		$this->DAOUsuario->getUserAuth($this->input->post("p1"), $this->input->post("p2"));
	}
	public function actionLongout(){
		$this->session->sess_destroy();
		header("Location: ".base_url());
	}
	public function getRecords(){
		if ($this->lib->tienePermiso(7)) {
			$this->load->model('db/DAOUsuario');

			$etiquetas = $this->DAOUsuario->getCamposForm();
			$datos = $this->DAOUsuario->getDataFormById($this->input->post("id"));
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