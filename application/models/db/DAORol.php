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

	public function getRecords(){
		return $this->db_con->getRecordsTable(self::$tabla, self::$campos[1]);
	}

	public function getPermisos($rol_id){
		$this->load->model('db/DAORolPermiso');
		$campos_t1 = $this->DAORolPermiso->getCampos();
		$result = $this->db_con->getQuery("SELECT ".$campos_t1[2]." FROM ".$this->DAORolPermiso->getTabla()." WHERE ".$campos_t1[1]."='".$rol_id."'");
		$count = count($result);
		for ($i=0; $i < $count ; $i++) { 
			$result[$i] = $result[$i][$campos_t1[2]];
		}
		return $result;
	}

	public function getDataFormById($id){
		return $this->db_con->findWhere(self::$tabla, ["*"], [self::$campos[0]."=".$id])[0];
	}

	public function getList(){
		return $this->lib->print_lista_filtrada(self::$tabla, self::$campos, ['*'], [self::$campos[0]."<>1"], self::$campos[1]);
	}

	public function getTablaVista(){
		return $this->lib->print_tabla([self::$tabla], ["ID", "Nombre"], self::$campos, self::$campos, null, ["edit", "delete"], ["edit", "delete"], ["accion/actualizarRol","DAORolIMPL/delete_fun"]);
	}
	
}