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
			$this->load->model('db/DAOSolicitud');
			$this->load->model('db/DAOVereda');
			$this->load->model('db/DAODespacho');
			$this->load->model('db/DAOTipoAyuda');
			$this->load->model('db/DAOEstado');
			$data = array(
				'titulo' => 'Peticion',
				'Header' => $this->lib->print_header(),
				'StyleView' => '',
				'AccionForm' => base_url().'DAOSolicitudIMPL/insert',
				'TextoBtn' => 'Registrar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer(),
				'list_vereda' => $this->DAOVereda->getList(),
				'list_despacho' => $this->DAODespacho->getList(),
				'list_tipo' => $this->DAOTipoAyuda->getList(),
				'list_estado' => $this->DAOEstado->getList()
				);
			$this->load->view('registro/viewSolicitud', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarSolicitud($id){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOSolicitud');
			$this->load->model('db/DAOVereda');
			$this->load->model('db/DAODespacho');
			$this->load->model('db/DAOTipoAyuda');
			$this->load->model('db/DAOEstado');
			$data = array(
				'titulo' => 'Actualización de solicitud',
				'StyleView' => '<script>read('.$id.', "'.base_url().'DAOSolicitudIMPL/getRecords", "form_solicitud")</script>',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOSolicitudIMPL/update',
				'TextoBtn' => 'Actualizar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer(),
				'list_vereda' => $this->DAOVereda->getList(),
				'list_despacho' => $this->DAODespacho->getList(),
				'list_tipo' => $this->DAOTipoAyuda->getList(),
				'list_estado' => $this->DAOEstado->getList()
				);
			$this->load->view('registro/viewSolicitud', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarSolicitante($id){
		if ($this->lib->tienePermiso(1)) {
			$this->load->model('db/DAOVereda');
			$data = array(
				'StyleView' => $this->lib->style_js_general().'<script>read('.$id.', "'.base_url().'DAOSolicitanteIMPL/getRecords", "form_solicitante")</script>',
				'AccionForm' => base_url().'DAOSolicitanteIMPL/update',
				'TextoBtn' => 'Actualizar',
				'list_vereda' => $this->DAOVereda->getList()
				);
			$this->load->view('registro/viewSolicitante', $data);
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

	public function actualizarUsuario($id){
		if ($this->lib->tienePermiso(2)) {
			$data = array(
				'titulo' => 'Actualización de usuarios',
				'StyleView' => '<script>read('.$id.', "'.base_url().'DAOUsuarioIMPL/getRecords", "form_usuario")</script>',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOUsuarioIMPL/update',
				'TextoBtn' => 'Actualizar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewUser', $data);
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
			$data = array(
				'titulo' => 'Registro de roles',
				'StyleView' => '',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAORolIMPL/insert',
				'TextoBtn' => 'Registrar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewRol', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarRol($id){
		if ($this->lib->tienePermiso(3)) {
			$data = array(
				'titulo' => 'Actualización de roles',
				'StyleView' => '<script>read('.$id.', "'.base_url().'DAORolIMPL/getRecords", "form_rol")</script>',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAORolIMPL/update',
				'TextoBtn' => 'Actualizar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewRol', $data);
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
			$data = array(
				'titulo' => 'Registro de despachos',
				'StyleView' => '',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAODespachoIMPL/insert',
				'TextoBtn' => 'Registrar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewDespacho', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarDespacho($id){
		if ($this->lib->tienePermiso(4)) {
			$data = array(
				'titulo' => 'Actualización de despachos',
				'StyleView' => '<script>read('.$id.', "'.base_url().'DAODespachoIMPL/getRecords", "form_despacho")</script>',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAODespachoIMPL/update',
				'TextoBtn' => 'Actualizar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewDespacho', $data);
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
			$data = array(
				'titulo' => 'Registro de ayudas',
				'StyleView' => '',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOTipoAyudaIMPL/insert',
				'TextoBtn' => 'Registrar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewAyuda', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarAyuda($id){
		if ($this->lib->tienePermiso(5)) {
			$data = array(
				'titulo' => 'Actualización de ayudas',
				'StyleView' => '<script>read('.$id.', "'.base_url().'DAOTipoAyudaIMPL/getRecords", "form_ayuda")</script>',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOTipoAyudaIMPL/update',
				'TextoBtn' => 'Actualizar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewAyuda', $data);
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
			$this->load->model('db/DAOCorregimiento');
			$data = array(
				'titulo' => 'Registro de veredas',
				'StyleView' => '',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOVeredaIMPL/insert',
				'lista_corr' => $this->DAOCorregimiento->getList(),
				'TextoBtn' => 'Registrar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewVereda', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarVereda($id){
		if ($this->lib->tienePermiso(6)) {
			$this->load->model('db/DAOCorregimiento');
			$data = array(
				'titulo' => 'Actualización de veredas',
				'StyleView' => '<script>read('.$id.', "'.base_url().'DAOVeredaIMPL/getRecords", "form_vereda")</script>',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOVeredaIMPL/update',
				'lista_corr' => $this->DAOCorregimiento->getList(),
				'TextoBtn' => 'Actualizar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewVereda', $data);
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
			$data = array(
				'titulo' => 'Registro de corregimientos',
				'StyleView' => '',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOCorregimientoIMPL/insert',
				'TextoBtn' => 'Registrar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewCorregimiento', $data);
		}else{
			header("Location: ".base_url());
		}
	}

	public function actualizarCorregimiento($id){
		if ($this->lib->tienePermiso(7)) {
			$data = array(
				'titulo' => 'Actualizaciòn de corregimientos',
				'StyleView' => '<script>read('.$id.', "'.base_url().'DAOCorregimientoIMPL/getRecords", "form_corregimiento")</script>',
				'Header' => $this->lib->print_header(),
				'AccionForm' => base_url().'DAOCorregimientoIMPL/update',
				'TextoBtn' => 'Actualizar',
				'Chat' => $this->lib->print_chat(),
				'Footer' => $this->lib->print_footer()
				);
			$this->load->view('registro/viewCorregimiento', $data);
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
				'mod_view' => 'accion/definirAdmin',
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