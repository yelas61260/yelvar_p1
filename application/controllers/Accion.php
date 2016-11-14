<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Accion extends CI_Controller
{
	public function index(){
		echo "solicitud";
	}

	//Funciones para ejecutar las solicitudes Permiso 1
	public function solicitud(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitud');
			$data = array(
				'titulo' => 'Solicitudes',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAOSolicitud->getTablaVista(),
				'mod_view' => '',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarSolicitud(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOVereda');
			$data = array(
				'titulo' => 'Peticion',
				'StyleView'=>$this->lib->style_solicitud(),
				'titulo' => 'prueba',
				'StyleView' => '',
				'Header' => $this->lib->print_header(),
				'list1' => $this->DAOVereda->getList(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewSolicitud', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarSolicitud(){
		if ($this->lib->tienePermiso(1)) {
			echo "2";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones para ejecutar los usuarios Permiso 2
	public function usuarios(){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOUsuario');
			$data = array(
				'titulo' => 'Usuarios',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAOUsuario->getTablaVista(),
				'mod_view' => 'accion/registrarUsuario',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarUsuario(){
		if ($this->lib->tienePermiso(2)) {
			$data = array(
				'titulo' => 'Registro de usuarios administrativos',
				'StyleView' => '',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOUsuarioIMPL/insert',
				'TextoBtn' => 'Registrar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewUser', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarUsuario(){
		if ($this->lib->tienePermiso(2)) {
			echo "4";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones para ejecutar los roles Permiso 3
	public function roles(){
		if ($this->lib->tienePermiso(3)) {
			$this->load->model('db/DAORol');
			$data = array(
				'titulo' => 'Roles',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAORol->getTablaVista(),
				'mod_view' => 'accion/registrarRol',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarRol(){
		if ($this->lib->tienePermiso(3)) {
			echo "7";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarRol(){
		if ($this->lib->tienePermiso(3)) {
			echo "8";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones para ejecutar los despachos Permiso 4
	public function despachos(){
		if ($this->lib->tienePermiso(4)) {
			$this->load->model('db/DAODespacho');
			$data = array(
				'titulo' => 'Despachos',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAODespacho->getTablaVista(),
				'mod_view' => 'accion/registrarDespacho',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarDespacho(){
		if ($this->lib->tienePermiso(4)) {
			echo "5";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarDespacho(){
		if ($this->lib->tienePermiso(4)) {
			echo "6";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones para ejecutar los ayudas Permiso 5
	public function ayudas(){
		if ($this->lib->tienePermiso(5)) {
			$this->load->model('db/DAOTipoAyuda');
			$data = array(
				'titulo' => 'Tipos de Ayudas',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAOTipoAyuda->getTablaVista(),
				'mod_view' => 'accion/registrarAyuda',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarAyuda(){
		if ($this->lib->tienePermiso(5)) {
			echo "9";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarAyuda(){
		if ($this->lib->tienePermiso(5)) {
			echo "10";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones para ejecutar las veredas Permiso 6 
	public function veredas(){
		if ($this->lib->tienePermiso(6)) {
			$this->load->model('db/DAOVereda');
			$data = array(
				'titulo' => 'Veredas',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAOVereda->getTablaVista(),
				'mod_view' => 'accion/registrarVereda',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarVereda(){
		if ($this->lib->tienePermiso(6)) {
			echo "12";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarVereda(){
		if ($this->lib->tienePermiso(6)) {
			echo "13";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones para ejecutar los corregimientos Permiso 7
	public function corregimientos(){
		if ($this->lib->tienePermiso(7)) {
			$this->load->model('db/DAOCorregimiento');
			$data = array(
				'titulo' => 'Corregimientos',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAOCorregimiento->getTablaVista(),
				'mod_view' => 'accion/registrarCorregimiento',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function registrarCorregimiento(){
		if ($this->lib->tienePermiso(7)) {
			echo "14";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarCorregimiento(){
		if ($this->lib->tienePermiso(7)) {
			echo "15";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones para ejecutar los administradores Permiso 8
	public function administradores(){
		if ($this->lib->tienePermiso(8)) {
			$this->load->model('db/DAOUsuario');
			$data = array(
				'titulo' => 'Usuarios Administradores',
				'StyleView'=> $this->lib->css_js_tables_responsive(), 
				'Header' => $this->lib->print_header(),
				'table_grafic' => $this->DAOUsuario->getTablaVistaAdmin(),
				'mod_view' => 'accion/registrarUsuario',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('viewTabla', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function definirAdmin(){
		if ($this->lib->tienePermiso(8)) {
			echo "11";
		}else{
			header("Location: ".base_url());
		}
	}

}