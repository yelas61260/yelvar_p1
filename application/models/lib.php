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
	public function separador(){
		return "|yv|";
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
	public function print_tabla($tablas, $encabezados, $campos, $aliasSQL, $condiciones, $ico=null, $acciones=null, $eventos=null, $order_by=null){
		$datosSQL = null;
		$sentenciaSQL = "SELECT ";

		$content = "";
		$content .= '<thead><tr>';

		$length = count($encabezados);
		for ($i=0; $i < $length; $i++) {
			$content .= '<th id="encabezado">'.$encabezados[$i].'</th>';
		}
		$length = count($acciones);
		for ($i=0; $i < $length ; $i++) {
			$content .= '<th id="encabezado"></th>';
		}
		$content .= '</tr></thead>';
		$content .= '<tbody>';

		//Construir consulta SQL para pintar en la tabla
		//Campos que se van a tomar de la consulta para pintar la tabla
		if ($campos == null || empty($campos)) {
			$sentenciaSQL .= "*";
		}else{
			$length = count($campos);
			for ($i=0; $i < $length-1 ; $i++) {
				$sentenciaSQL .= $campos[$i].", ";
			}
			$sentenciaSQL .= $campos[$length-1];
		}
		
		$sentenciaSQL .= " FROM ";
		//Tablas de donde se sacaran los datos
		$length = count($tablas);
		for ($i=0; $i < $length-1 ; $i++) { 
			$sentenciaSQL .= $tablas[$i].", ";
		}
		$sentenciaSQL .= $tablas[$length-1];

		//Condiciones que se agregaran a la sentencia sql
		if ($condiciones != null && !empty($condiciones)) {
			$sentenciaSQL .= " WHERE ";
			$length = count($condiciones);
			for ($i=0; $i < $length-1 ; $i++) { 
				$sentenciaSQL .= $condiciones[$i]." AND ";
			}
			$sentenciaSQL .= $condiciones[$length-1];
		}

		//Ordenamiento para la tabla
		if($order_by != null && !empty($order_by)){
			$sentenciaSQL .= " ORDER BY ".$order_by;
		}

		//Script para definir la tabla a pintar
		$datosSQL = $this->db_con->getQuery($sentenciaSQL);
		foreach ($datosSQL as $value) {
			$content .= "<tr>";
			$length = count($aliasSQL);
			for ($i=0; $i < $length ; $i++) {
				$content .= "<td class='campo'>".$value[$aliasSQL[$i]]."</td>";
			}
			$length = count($acciones);
			for ($i=0; $i < $length ; $i++) {
				$content .= "<td><button onclick='".$acciones[$i]."_fun(".$value[$aliasSQL[0]].",\"".base_url().$eventos[$i]."\")'><img src='".base_url()."recursos/pix/".$ico[$i].".png' width='25' height='25'></button></td>";
			}
			$content .= "</tr>";
		}
		$content .= "</tbody>";

		return $content;
	}
	public function print_tabla_simple($sentenciaSQL, $encabezados, $aliasSQL){
		$datosSQL = null;

		$content = "";
		$content .= '<thead><tr>';

		$length = count($encabezados);
		for ($i=0; $i < $length; $i++) {
			$content .= '<th id="encabezado">'.$encabezados[$i].'</th>';
		}
		$content .= '</tr></thead>';
		$content .= '<tbody>';

		//Script para definir la tabla a pintar
		$datosSQL = $this->db_con->getQuery($sentenciaSQL);
		foreach ($datosSQL as $value) {
			$content .= "<tr>";
			$length = count($aliasSQL);
			for ($i=0; $i < $length ; $i++) {
				$content .= "<td class='campo'>".$value[$aliasSQL[$i]]."</td>";
			}
			$content .= "</tr>";
		}
		$content .= "</tbody>";

		return $content;
	}
	public function print_lista_filtrada($tabla, $campo, $get_campo, $condiciones, $order_by=null){
		$content = '<option class="opt0" value="">Seleccionar</option>';
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
		$content = self::style_js_general();
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
		$content = '';
		$content .= "<div class='footer'>";
		$content .= "<div id='logo_img'><img src='".base_url()."recursos/pix/logo2.png'/></div>";
		$content .= "<div id='block_info'>";
		$content .= "<span>Celular: 315 509 9352 - 304 379 4016 - 322 217 9751</span>";
		$content .= "<span>Ciudad: Magangué - Bolivar / NIT:9116661-0</span>";
		$content .= "</div>";
		$content .= "</div>";
		return '';
	}
	public function print_chat(){
		$this->load->model('db/DAOUsuario');
		$content = '';
		$content .= "<div class='chat'>";
		$content .= "<div id='chat_user_send' id_user='".$this->session->userdata("id")."' url_chat='".base_url()."'></div>";
		$content .= "<div class='header_chat' onclick='abrirCerrarChat();'><img src='".base_url()."recursos/pix/chat.png'/><span>Chat</span></div>";
		$content .= "<div class='content_chat' id='content_chat'>";
		$content .= "<span>Usuarios: </span><select id='user_chat'>".$this->DAOUsuario->getListNombre()."</select>";
		$content .= "<div class='chat_text' id='chat_text'>";
		$content .= "</div>";
		$content .= "<div class='chat_controller'>";
		$content .= "<textarea id='chat_msn'></textarea>";
		$content .= "<button class='chat_btn' id='chat_btn'>Enviar</button>";
		$content .= "</div>";
		$content .= "</div>";
		$content .= "</div>";
		return $content;
	}

	public function style_js_general(){
		$content = '';
		$content .= "<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/general.css'>";
		$content .= "<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/alertify.core.css' />";
		$content .= "<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/alertify.default.css' />";
		$content .= "<script type='text/javascript' src='".base_url()."recursos/js/jquery-1.7.1.min.js'></script>";
		$content .= "<script type='text/javascript' src='".base_url()."recursos/js/jquery.js'></script>";
		$content .= "<script type='text/javascript' src='".base_url()."recursos/js/alertify.js'></script>";
		$content .= "<script type='text/javascript' src='".base_url()."recursos/js/ajax.js'></script>";
		return $content;
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

	public function style_regusuarios(){
		$content = '';
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/StyleFormUsuarios.css'>";
		return $content;
	}

	public function style_js_solicitud(){
		$content = '';
		$content .= "<script type='text/javascript' src='".base_url()."recursos/js/say-cheese.js'></script>";
		$content .= "<script type='text/javascript' src='".base_url()."recursos/js/camara.js'></script>";
		return $content;
	}
	
	public function css_js_tables_responsive(){
		$content = '';
		$content .="<script type='text/javascript' src='".base_url()."recursos/js/responsive/jquery-1.12.0.min.js'></script>";
		$content .="<script type='text/javascript' src='".base_url()."recursos/js/responsive/jquery.dataTables.min.js'></script>";
		$content .="<script type='text/javascript' src='".base_url()."recursos/js/responsive/dataTables.responsive.min.js'></script>";
		$content .="<script type='text/javascript' src='".base_url()."recursos/js/tabla.js'></script>";
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/responsive/responsive.dataTables.min.css'>";
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/responsive/jquery.dataTables.min.css'>";
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/estilotabla.css'>";
		return $content;
	}

	public function existeEnArreglo($lista, $valor){
		foreach ($lista as $element) {
			if ($element == $valor) {
				return true;
			}
		}
		return false;
	}
}