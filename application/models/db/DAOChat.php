<?php
/**
* 
*/
class DAOChat extends CI_Model
{
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[13];

		self::$campos[0] = "id";
		self::$campos[1] = "usuario_envia";
		self::$campos[2] = "usuario_recibe";
		self::$campos[3] = "mensaje";
		self::$campos[4] = "fecha";
	}

	public function getCampos(){
		return self::$campos;
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function delete($id){
		return $this->db_con->delete(self::$tabla, self::$campos[0], $id);
	}

	public function getFotoById($id){
		return $this->db_con->findWhere(self::$tabla, self::$campos, [self::$campos[0]."=".$id])[0][self::$campos[1]];
	}

	public function getConversacion($id_env, $id_rec){
		return $this->db_con->getQuery("SELECT concat(t2.nombres, ' ', t2.apellidos) nombre_usuario, t1.".self::$campos[3]." FROM ".self::$tabla." t1 JOIN usuario t2 ON t1.usuario_envia = t2.id WHERE (t1.".self::$campos[1]." = ".$id_env." AND t1.".self::$campos[2]." = ".$id_rec.") OR (t1.".self::$campos[1]." = ".$id_rec." AND t1.".self::$campos[2]." = ".$id_env.") ORDER BY t1.id DESC LIMIT 10");
	}
}