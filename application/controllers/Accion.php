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
			$data = array(
				'titulo' => 'Solicitudes',
				'StyleView'=>'', 
				'Header' => $this->lib->print_header(),
				'table_grafic' => '',
				'mod_view' => 'accion/registrarSolicitud',
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
			$this->load->model('db/DAOCorregimiento');
			$this->load->model('db/DAODespacho');
			$this->load->model('db/DAOPermiso');
			$this->load->model('db/DAORol');
			$this->load->model('db/DAOTipoAyuda');
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
			$this->load->view('viewPrueba', $data);
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
			$this->load->model('db/DAOCorregimiento');
			$this->load->model('db/DAODespacho');
			$this->load->model('db/DAOPermiso');
			$this->load->model('db/DAORol');
			$this->load->model('db/DAOTipoAyuda');
			$this->load->model('db/DAOVereda');
			$data = array(
				'titulo' => 'Registro de usuarios administrativos',
				'StyleView'=>$this->lib->style_rgusuarios(), 
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

	}

	public function definirAdmin(){
		if ($this->lib->tienePermiso(8)) {
			echo "11";
		}else{
			header("Location: ".base_url());
		}
	}

	//Funciones par ejecutar los permisos Permiso 9
	public function permisos(){

	}

	public function registrarPermiso(){
		if ($this->lib->tienePermiso(9)) {
			echo "16";
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarPermiso(){
		if ($this->lib->tienePermiso(9)) {
			echo "17";
		}else{
			header("Location: ".base_url());
		}
	}

}