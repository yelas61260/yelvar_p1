<?php
/**
* 
*/
class lib extends CI_Model
{
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
			$datos = $this->db_con->get_all_records_tabla_where($tabla, $get_campo, $condiciones);
		}else{
			$datos = $this->db_con->get_all_records_tabla_where($tabla, $get_campo, $condiciones, $order_by);
		}
		foreach ($datos as $valor) {
			$content .= '<option value="'.$valor[$campo[0]].'">'.$valor[$campo[1]].'</option>';
		}
		return $content;
	}
	public function print_menu(){
		return "menu";
	}
	public function print_header(){
		return "header";
	}
	public function print_footer(){
		return "footer";
	}
	public function style_login(){
		$content = '';
		$content .="<link rel='stylesheet' type='text/css' href='".base_url()."recursos/css/StyleLogin.css'>";
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