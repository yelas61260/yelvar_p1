<?php
/**
* 
*/
class DAOPermiso extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[2];

		self::$campos[0] = "id";
		self::$campos[1] = "accion";
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}

	public function delete($id){
		$this->load->model('db/DAORolPermiso');
		$this->DAORolPermiso->deleteForPermiso($id);
		return $this->db_con->delete(self::$tabla, self::$campos[0], $id);
	}

	public function getRecords(){
		return $this->db_con->getRecordsTable(self::$tabla, self::$campos[1]);
	}

	public function getList(){
		return $this->lib->print_lista_filtrada(self::$tabla, self::$campos, ['*'], [], self::$campos[1]);
	}
	
}