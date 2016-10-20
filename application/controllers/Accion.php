<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Accion extends CI_Controller
{
	public function index(){
		echo "solicitud";
	}

	public function registrarSolicitud(){
		if ($this->lib->tienePermiso(1)) {
			echo "1";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarSolicitud(){
		if ($this->lib->tienePermiso(2)) {
			echo "2";
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarUsuario(){
		if ($this->lib->tienePermiso(3)) {
			echo "3";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarUsuario(){
		if ($this->lib->tienePermiso(4)) {
			echo "4";
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarDependencia(){
		if ($this->lib->tienePermiso(5)) {
			echo "5";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarDependencia(){
		if ($this->lib->tienePermiso(6)) {
			echo "6";
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarRol(){
		if ($this->lib->tienePermiso(7)) {
			echo "7";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarRol(){
		if ($this->lib->tienePermiso(8)) {
			echo "8";
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarAyuda(){
		if ($this->lib->tienePermiso(9)) {
			echo "9";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarAyuda(){
		if ($this->lib->tienePermiso(10)) {
			echo "10";
		}else{
			header("Location: ".base_url());
		}
	}

	public function definirAdmin(){
		if ($this->lib->tienePermiso(11)) {
			echo "11";
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarVereda(){
		if ($this->lib->tienePermiso(12)) {
			echo "12";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarVereda(){
		if ($this->lib->tienePermiso(13)) {
			echo "13";
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarCorregimiento(){
		if ($this->lib->tienePermiso(14)) {
			echo "14";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarCorregimiento(){
		if ($this->lib->tienePermiso(15)) {
			echo "15";
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarPermiso(){
		if ($this->lib->tienePermiso(16)) {
			echo "16";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarPermiso(){
		if ($this->lib->tienePermiso(17)) {
			echo "17";
		}else{
			header("Location: ".base_url());
		}
	}

}