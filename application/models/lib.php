<?php
/**
* 
*/
class lib extends CI_Model
{
	private $opcionesMenu;
	public function __construct()
	{
		parent::__construct();
	}
	public function tienePermiso($id_permiso){
		if(empty($this->session->userdata("id"))){
			return false;
		}else if($id_permiso == 0){
			return true;
		}else{
			$permisos = $this->session->userdata('permisos');
			$c_permisos = count($permisos);
			for ($i=0; $i < $c_permisos; $i++) { 
				if ($id_permiso == $permisos[$i]) {
					return true;
				}
			}
			return false;
		}
	}
	public function print_tabla(){
		return "tabla";
	}
	public function print_lista_filtrada($tabla, $campo, $get_campo, $condiciones, $order_by=null){
		$content = '<option value="">Seleccionar</option>';
		if($order_by == null){
			$datos = $this->db_con->findWhere($tabla, $get_campo, $condiciones);
		}else{
			$datos = $this->db_con->findWhere($tabla, $get_campo, $condiciones, $order_by);
		}
		foreach ($datos as $valor) {
			$content .= '<option value="'.$valor[$campo[0]].'">'.$valor[$campo[1]].'</option>';
		}
		return $content;
	}
	public function print_menu(){
		$permisos_app = $this->db_con->getRecordsTable($this->db_struc->getTablas()[2]);
		$content = '';
		$content .= "<ul>";
		$permisos = $this->session->userdata('permisos');
		$c_permisos = count($permisos);
		for ($i=0; $i < $c_permisos; $i++) {
			$content .= "<li class='btnMenu'><a href='".base_url()."accion/".strtolower($permisos_app[intval($permisos[$i])-1]["accion"])."'>".$permisos_app[intval($permisos[$i])-1]["accion"]."</a></li>";
		}
		$content .= "<li id='salir_btn' class='btnMenu'><a href='".base_url()."DAOUsuarioIMPL/actionLongout'><span>Salir</span></a></li>";
		$content .= "</ul>";
		return $content;
	}
	public function print_header(){
		$content = '';
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/general.css'>";
		$content .= "<div class='header'>";
		$content .= "<div id='logo_img'><img src='".base_url()."recursos/pix/logo.png'/></div>";
		$content .= "<div id='menu'><div class='punta_menu'></div><div class='menuitems'>";
		if(!empty($this->session->userdata("id"))){
			$content .=  self::print_menu();
		}
		$content .= "</div></div>";
		$content .= "</div>";
		return $content;
	}
	public function print_footer(){
		return "footer";
	}
	public function print_chat(){
		return "chat";
	}
	public function style_login(){
		$content = '';
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/StyleLogin.css'>";
		return $content;
	}
		public function style_home(){
		$content = '';
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/StyleHome.css'>";
		return $content;
	}
<<<<<<< HEAD
		public function style_rgusuarios(){
		$content = '';
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/StyleFormUsuarios.css'>";
		return $content;
	}

		public function style_solicitud(){
=======
			public function style_regusuarios(){
>>>>>>> parent of 2e7c7db... HV_2016_11_7
		$content = '';
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/StyleFormPeticion.css'>";
		return $content;
	}
	public function css_js_tables_responsive(){
		$content = '';
		$content .="<script type='text/javascript' src='".base_url()."recursos/js/responsive/jquery-1.12.0.min.js'></script>";
		$content .="<script type='text/javascript' src='".base_url()."recursos/js/responsive/jquery.dataTables.min.js'></script>";
		$content .="<script type='text/javascript' src='".base_url()."recursos/js/responsive/dataTables.responsive.min.js'></script>";
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/responsive/responsive.dataTables.min.css'>";
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/responsive/jquery.dataTables.min.css'>";
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/estilotabla.css'>";
		return $content;
	}
}