<?php
/**
* 
*/
class DAORol extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[3];

		self::$campos[0] = "id";
		self::$campos[1] = "nombre";
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}

	public function getTabla(){
		return self::$tabla;
	}

	public function getCampos(){
		return self::$campos;
	}
	
}