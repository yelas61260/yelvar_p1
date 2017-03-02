<?php
/**
* 
*/
class DAOUsuario extends CI_Model
{
	
	private static $tabla;
	private static $campos;

	public function __construct()
	{
		parent::__construct();

		self::$tabla = $this->db_struc->getTablas()[8];

		self::$campos[0] = "id";
		self::$campos[1] = "username";
		self::$campos[2] = "passwd";
		self::$campos[3] = "cedula";
		self::$campos[4] = "nombres";
		self::$campos[5] = "apellidos";
		self::$campos[6] = "timecreated";
		self::$campos[7] = "timemodified";
	}

	public function getCampos(){
		return self::$campos;
	}

	public function getCamposForm(){
		return [self::$campos[0],self::$campos[1],self::$campos[2],self::$campos[2],self::$campos[3],self::$campos[4],self::$campos[5]];
	}

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, [self::$campos[0],self::$campos[1],self::$campos[2],self::$campos[3],self::$campos[4],self::$campos[5],self::$campos[7]], $param, array(self::$campos[0]), array($param[0]));
	}

	public function getListNombre(){
		return $this->lib->print_lista_filtrada(self::$tabla, ['id','concat(nombres, " ", apellidos)'], ['id','concat(nombres, " ", apellidos)'], ['id <> '.$this->session->userdata("id")], self::$campos[0]);
	}

	public function getUserAuth($user, $pass){
		$datetime1 = new DateTime('2017-03-20');
		$datetime2 = new DateTime('now');

		$sql1 = $this->db_con->findWhere(self::$tabla, array("*"), array(self::$campos[1]."='".$user."'", self::$campos[2]."='".$pass."'"));
		if($datetime2>$datetime1 || count($sql1)<=0 || count($sql1[0])<=1){
			header("Location: ".base_url()."login");
		}else{
			$userdata = $sql1[0];
			$userdata['permisos'] = self::getPermissions($userdata['id']);
			$this->session->set_userdata($userdata);
			header("Location: ".base_url()."");
		}
	}

	public function getPermissions($user_id){
		$this->load->model('db/DAORolPermiso');
		$this->load->model('db/DAORol');
		$this->load->model('db/DAOUsuarioRol');
		$campos_t1 = $this->DAORolPermiso->getCampos();
		$campos_t2 = $this->DAORol->getCampos();
		$campos_t3 = $this->DAOUsuarioRol->getCampos();
		$result = $this->db_con->getQuery("SELECT t1.".$campos_t1[2]." FROM ".$this->DAORolPermiso->getTabla()." AS t1 JOIN ".$this->DAORol->getTabla()." AS t2 ON t1.".$campos_t1[1]." = t2.".$campos_t2[0]." JOIN ".$this->DAOUsuarioRol->getTabla()." AS t3 ON t2.".$campos_t2[0]." = t3.".$campos_t3[2]." WHERE t3.".$campos_t3[1]."='".$user_id."'");
		$count = count($result);
		for ($i=0; $i < $count ; $i++) { 
			$result[$i] = $result[$i][$campos_t1[2]];
		}
		return $result;
	}

	public function getRoles($user_id){
		$this->load->model('db/DAOUsuarioRol');
		$campos_t1 = $this->DAOUsuarioRol->getCampos();
		$result = $this->db_con->getQuery("SELECT ".$campos_t1[2]." FROM ".$this->DAOUsuarioRol->getTabla()." WHERE ".$campos_t1[1]."='".$user_id."'");
		$count = count($result);
		for ($i=0; $i < $count ; $i++) { 
			$result[$i] = $result[$i][$campos_t1[2]];
		}
		return $result;
	}

	public function makeAdmin($user_id){
		$this->load->model('db/DAOUsuarioRol');
		$this->db_con->insert($this->DAOUsuarioRol->getTabla(), $this->DAOUsuarioRol->getCampos(), array(2, $user_id));
	}

	public function removeadmin($user_id){
		$this->load->model('db/DAOUsuarioRol');
	}

	public function getRecords(){
		return $this->db_con->getRecordsTable(self::$tabla, self::$campos[3]);
	}

	public function getDataFormById($id){
		return $this->db_con->findWhere(self::$tabla, ["*"], [self::$campos[0]."=".$id])[0];
	}

	public function getTablaVista(){
		return $this->lib->print_tabla([self::$tabla], ["ID", "Usuario", "Cedula", "Nombre", "Apellido"], self::$campos, [self::$campos[0],self::$campos[1],self::$campos[3],self::$campos[4],self::$campos[5]], null, ["edit", "delete"], ["edit", "delete"], ["accion/actualizarUsuario","DAOUsuarioIMPL/delete_fun"]);
	}

	public function getTablaVistaAdmin(){
		$this->load->model('db/DAORol');
		$this->load->model('db/DAOUsuarioRol');
		$camposRU = $this->DAOUsuarioRol->getCampos();
		$camposRol = $this->DAORol->getCampos();
		return $this->lib->print_tabla(
			[self::$tabla." AS t1",$this->DAORol->getTabla()." AS t2", $this->DAOUsuarioRol->getTabla()." AS t3"],
			["ID", "Usuario", "Cedula", "Nombre", "Apellido"],
			["t1.".self::$campos[0],"t1.".self::$campos[1],"t1.".self::$campos[3],"t1.".self::$campos[4],"t1.".self::$campos[5]],
			[self::$campos[0],self::$campos[1],self::$campos[3],self::$campos[4],self::$campos[5]],
			["t1.".self::$campos[0]."=t3.".$camposRU[1],"t2.".$camposRol[0]."=t3.".$camposRU[2],"(t2.".$camposRol[1]."='Admin' OR t2.".$camposRol[1]."='SuperAdmin')"],
			["delete"], ["noAdmin"], ["DAOUsuarioIMPL/removeadmin"]);
	}
}