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