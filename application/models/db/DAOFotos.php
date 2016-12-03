<?php
/**
* 
*/
class DAOFotos extends CI_Model
{
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[12];

		self::$campos[0] = "id";
		self::$campos[1] = "foto";
	}

	public function getCampos(){
		return self::$campos;
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function getFotoById($id){
		return $this->db_con->findWhere(self::$tabla, self::$campos, [self::$campos[0]."=".$id])[0][self::$campos[1]];
	}
}