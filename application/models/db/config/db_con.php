<?php

class db_con extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($tabla, $parametros, $valores)
	{
		$tamParam = count($parametros);
		$datos_array = [];
		for($i = 0; $i<$tamParam; $i++){
			$datos_array[$parametros[$i]] = $valores[$i];
		}

		if($sql1 = $this->db->insert($tabla, $datos_array)){
			return $this->db->insert_id();
		}else{
			echo "error: ".$this->db->error();
			return 0;
		}
		
	}

	public function update($tabla, $parametros, $valores, $nameID, $valueID){
		$tamParam = count($parametros);
		$sentenciaSQL = "UPDATE $tabla SET ";
		for($i = 0; $i<$tamParam-1; $i++){
			$sentenciaSQL .= "`".$parametros[$i]."` = '".$valores[$i]."', ";
		}
		$sentenciaSQL .= "`".$parametros[$tamParam-1]."`= '".$valores[$i]."' WHERE ";
		$tamParam = count($nameID);
		for($i = 0; $i<$tamParam-1; $i++){
			$sentenciaSQL .= "`".$nameID[$i]."` = '".$valueID[$i]."' AND ";
		}
		$sentenciaSQL .= "`".$nameID[$tamParam-1]."` = '".$valueID[$i]."'";
		
		if($sql1 = $this->db->query($sentenciaSQL)){
			return "ok";
		}else{
			return "error";
			echo "error: ".$this->db->error();
		}
	}
}