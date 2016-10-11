<?php
/**
* 
*/
class DAOSolicitud extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[6];

		self::$campos[0] = "id";
		self::$campos[1] = "nombre";
		self::$campos[2] = "solicitante_id";
		self::$campos[3] = "colaborador_id";
		self::$campos[4] = "despacho_id";
		self::$campos[5] = "tipo_id";
		self::$campos[6] = "fecha";
		self::$campos[7] = "estado_id";
		self::$campos[8] = "descripcion";
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}
	
}