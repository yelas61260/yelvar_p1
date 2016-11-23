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
		self::$campos[10] = "timemodified";
	}

	public function getCampos(){
		return self::$campos;
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}

	public function getRecords(){
		return $this->db_con->getRecordsTable(self::$tabla, self::$campos[1]);
	}

	public function getByCedula($cedula){
		$result = $this->db_con->findWhere(self::$tabla, self::$campos, [self::$campos[1]."=".$cedula]);
		if (count($result)>0) {
			return $result[0];
		}else{
			return null;
		}
	}

}