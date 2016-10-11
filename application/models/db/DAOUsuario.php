<?php
/**
* 
*/
class DAOUsuario extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[8];

		self::$campos[0] = "id";
		self::$campos[1] = "username";
		self::$campos[2] = "passwd";
		self::$campos[3] = "cedula";
		self::$campos[4] = "nombres";
		self::$campos[5] = "apellidos";
		self::$campos[6] = "timecreated";
		self::$campos[7] = "timemodified";

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}

	public function getUserAuth($user, $pass){
		return $this->db_con->findWhere(self::$tabla, array("*"), array(self::$campos[1]."=".$user, self::$campos[2]."=".$pass));
	}
	
}