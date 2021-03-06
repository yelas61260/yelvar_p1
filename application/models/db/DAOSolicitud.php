<?php
/**
* 
*/
class DAOSolicitud extends CI_Model
{
	
	private static $tabla;
	private static $campos;
	private static $campos_form;

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
		self::$campos[8] = "valor";
		self::$campos[9] = "descripcion";

		self::$campos_form[0] = "id";
		self::$campos_form[1] = "solicitante_id";
		self::$campos_form[2] = "nombre";
		self::$campos_form[3] = "despacho_id";
		self::$campos_form[4] = "tipo_id";
		self::$campos_form[5] = "estado_id";
		self::$campos_form[6] = "valor";
		self::$campos_form[7] = "descripcion";
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
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}

	public function delete($id){
		return $this->db_con->delete(self::$tabla, self::$campos[0], $id);
	}

	public function getRecords(){
		return $this->db_con->getRecordsTable(self::$tabla, self::$campos[1]);
	}

	public function getDataFormById($id){
		return $this->db_con->findWhere(self::$tabla, self::$campos_form, [self::$campos[0]."=".$id])[0];
	}

	public function getTablaVista(){
		$this->load->model('db/DAOSolicitante');
		$cmpSolicitante = $this->DAOSolicitante->getCampos();
		$this->load->model('db/DAOUsuario');
		$cmpUsuarios = $this->DAOUsuario->getCampos();
		$this->load->model('db/DAODespacho');
		$cmpDespacho = $this->DAODespacho->getCampos();
		$this->load->model('db/DAOEstado');
		$cmpEstado = $this->DAOEstado->getCampos();
		return $this->lib->print_tabla(
			[self::$tabla." AS t1",$this->db_struc->getTablas()[5]." AS t2",$this->db_struc->getTablas()[8]." AS t3",$this->db_struc->getTablas()[1]." AS t4",$this->db_struc->getTablas()[11]." AS t5"],
			["ID", "Nombre", "Solicitante", "Colaborador", "Despacho"],
			["t1.".self::$campos[0],"t1.".self::$campos[1],"CONCAT(t2.".$cmpSolicitante[2].", ' ', t2.".$cmpSolicitante[3].") AS solicitante","CONCAT(t3.".$cmpUsuarios[4].", t3.".$cmpUsuarios[5].") AS colaborador","t4.".$cmpDespacho[1]." AS despacho"],
			[self::$campos[0],self::$campos[1],"solicitante","colaborador","despacho"],
			["t1.".self::$campos[2]."=t2.".$cmpSolicitante[0],"t1.".self::$campos[3]."=t3.".$cmpUsuarios[0],"t1.".self::$campos[4]."=t4.".$cmpDespacho[0],"t1.".self::$campos[7]."=t5.".$cmpEstado[0]],
			["edit", "delete"], ["edit", "delete"], ["accion/actualizarSolicitud","DAOSolicitudIMPL/delete_fun"]);
	}
	
}