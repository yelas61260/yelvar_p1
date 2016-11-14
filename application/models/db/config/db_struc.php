<?php

class db_struc extends CI_Model {

	private static $tablas;
	private static $procedimientos;

	public function __construct()
	{
		parent::__construct();

		self::$tablas[0] = "corregimiento";
		self::$tablas[1] = "despacho";
		self::$tablas[2] = "permiso";
		self::$tablas[3] = "rol";
		self::$tablas[4] = "rol_permiso";
		self::$tablas[5] = "solicitante";
		self::$tablas[6] = "solicitud";
		self::$tablas[7] = "tipo_ayuda";
		self::$tablas[8] = "usuario";
		self::$tablas[9] = "usuarios_roles";
		self::$tablas[10] = "vereda";
		self::$tablas[11] = "estado";
	}

	public function getTablas(){
		return self::$tablas;
	}

}