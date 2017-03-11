<?php
/**
* 
*/
class DAOVereda extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[10];

		self::$campos[0] = "id";
		self::$campos[1] = "nombre";
		self::$campos[2] = "corregimiento_id";
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

	public function delete($id){
		return $this->db_con->delete(self::$tabla, self::$campos[0], $id);
	}

	public function getDataFormById($id){
		return $this->db_con->findWhere(self::$tabla, ["*"], [self::$campos[0]."=".$id])[0];
	}

	public function getRecords(){
		return $this->db_con->getRecordsTable(self::$tabla, self::$campos[1]);
	}

	public function getList($id){
		return $this->lib->print_lista_filtrada(self::$tabla, self::$campos, ['*'], [self::$campos[2]."=".$id], self::$campos[1]);
	}

	public function getTablaVista(){
		$this->load->model('db/DAOCorregimiento');
		$campos_corregimiento = $this->DAOCorregimiento->getCampos();
		return $this->lib->print_tabla([self::$tabla." AS t1", $this->db_struc->getTablas()[0]." AS t2"], ["ID", "Nombre", "Corregimiento"], ["t1.".self::$campos[0], "t1.".self::$campos[1], "t2.".$campos_corregimiento[1]." AS corregimiento"], [self::$campos[0],self::$campos[1],"corregimiento"], ["t1.".self::$campos[2]."=t2.".$campos_corregimiento[0]], ["edit", "delete"], ["edit", "delete"], ["accion/actualizarVereda","DAOVeredaIMPL/delete_fun"]);
	}
	
}