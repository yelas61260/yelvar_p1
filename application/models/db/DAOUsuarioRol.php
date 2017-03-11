<?php
/**
* 
*/
class DAOUsuarioRol extends CI_Model
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
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}

	public function deleteForUser($id){
		return $this->db_con->delete(self::$tabla, self::$campos[1], $id);
	}

	public function deleteForRol($id){
		return $this->db_con->delete(self::$tabla, self::$campos[2], $id);
	}

	public function deleteRol($user_id, $rol_id){
		return $this->db_con->getQuery("DELETE FROM ".self::$tabla." WHERE ".self::$campos[1]."='".$user_id."' AND ".self::$campos[2]."='".$rol_id."'");
	}

	public function getTabla(){
		return self::$tabla;
	}

	public function getCampos(){
		return self::$campos;
	}
	
}