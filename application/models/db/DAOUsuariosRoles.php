<?php
/**
* 
*/
class DAOUsuarios_Roles extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[9];

		self::$campos[0] = "id";
		self::$campos[1] = "user_id";
		self::$campos[2] = "rol_id";

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}
	
}