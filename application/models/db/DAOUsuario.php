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

	public function insert($param){
		return $this->db_con->insert(self::$tabla, self::$campos, $param);
	}

	public function update($param){
		return $this->db_con->update(self::$tabla, self::$campos, $param, array(self::$campos[0]), array($param[0]));
	}

	public function getUserAuth($user, $pass){
		$sql1 = $this->db_con->findWhere(self::$tabla, array("*"), array(self::$campos[1]."='".$user."'", self::$campos[2]."='".$pass."'"));
		if(count($sql1)<=0 || count($sql1[0])<=1){
			header("Location: ".base_url()."login");
		}else{
			$userdata = $sql1[0];
			$userdata['permisos'] = self::getPermissions($userdata['id']);
			$this->session->set_userdata($userdata);
			header("Location: ".base_url()."");
		}
	}

	public function requiredLogin(){
		if(empty($this->session->userdata("id"))){
			header("Location: ".base_url());
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
}