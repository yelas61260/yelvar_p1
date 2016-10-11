<?php
/**
* 
*/
class DAOSolicitante extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[5];

		self::$campos[0] = "id";
		self::$campos[1] = "cedula";
		self::$campos[2] = "nombres";
		self::$campos[3] = "apellidos";
		self::$campos[4] = "telefono";
		self::$campos[5] = "direccion";
		self::$campos[6] = "vereda_id";
		self::$campos[7] = "email";
		self::$campos[8] = "imagen";
		self::$campos[9] = "timecreated";
		self::$campos[11] = "timemodified";
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

}