<?php
/**
* 
*/
class DAOSolicitante extends CI_Model
{
	
	private static $tabla;
	private static $campos;
	private static $campos_form;

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
		self::$campos[6] = "corregimiento_id";
		self::$campos[7] = "vereda_id";
		self::$campos[8] = "email";
		self::$campos[9] = "imagen";
		self::$campos[10] = "timecreated";
		self::$campos[11] = "timemodified";

		self::$campos_form[0] = "id";
		self::$campos_form[1] = "cedula";
		self::$campos_form[2] = "nombres";
		self::$campos_form[3] = "apellidos";
		self::$campos_form[4] = "telefono";
		self::$campos_form[5] = "direccion";
		self::$campos_form[6] = "corregimiento_id";
		self::$campos_form[7] = "vereda_id";
		self::$campos_form[8] = "email";
		self::$campos_form[9] = "imagen";
	}

	public function getCampos(){
		return self::$campos;
	}

	public function getCamposForm(){
		return self::$campos_form;
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos_form, $param, array(self::$campos[0]), array($param[0]));
	}

	public function delete($id){
		return $this->db_con->delete(self::$tabla, self::$campos[0], $id);
	}

	public function getRecords(){
		return $this->db_con->getRecordsTable(self::$tabla, self::$campos[1]);
	}

	public function getByCedula($cedula){
		$result = $this->db_con->findWhere(self::$tabla, self::$campos_form, [self::$campos[1]."=".$cedula]);
		if (count($result)>0) {
			return $result[0];
		}else{
			return null;
		}
	}

	public function getDataFormById($id){
		$result = $this->db_con->findWhere(self::$tabla, self::$campos_form, [self::$campos[0]."=".$id]);
		if (count($result)>0) {
			return $result[0];
		}else{
			return null;
		}
	}

	public function getList(){
		return $this->lib->print_lista_filtrada(self::$tabla, [self::$campos[0],self::$campos[1]], [self::$campos[0].','.self::$campos[1]], [], self::$campos[1]);
	}

}