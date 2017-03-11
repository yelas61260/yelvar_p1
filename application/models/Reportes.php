<?php
/**
* 
*/
class Reportes extends CI_Model
{
	private static $tablas;

	public function __construct()
	{
		parent::__construct();

		self::$tablas = $this->db_struc->getTablas();
	}

	public function reporteCompleto(){
		$encabezados[0] = "Cedula";
		$encabezados[1] = "Nombre Completo";
		$encabezados[2] = "Telefono";
		$encabezados[3] = "Dirección";
		$encabezados[4] = "E-mail";
		$encabezados[5] = "Vereda";
		$encabezados[6] = "Solicitud";
		$encabezados[7] = "Fecha";
		$encabezados[8] = "Descripción";
		$encabezados[9] = "Deuda";

		$aliasSQL[0] = "cedula";
		$aliasSQL[1] = "nombre_completo";
		$aliasSQL[2] = "telefono";
		$aliasSQL[3] = "direccion";
		$aliasSQL[4] = "email";
		$aliasSQL[5] = "vereda";
		$aliasSQL[6] = "solicitud";
		$aliasSQL[7] = "fecha";
		$aliasSQL[8] = "descripcion";
		$aliasSQL[9] = "valor";

		return $this->lib->print_tabla_simple("SELECT t1.cedula, concat(t1.nombres, ' ', t1.apellidos) nombre_completo, t1.telefono, t1.direccion, t1.email, t3.nombre as vereda, t2.nombre AS solicitud, from_unixtime(t2.fecha) fecha, t2.descripcion, t2.valor FROM solicitante t1 JOIN solicitud t2 ON t1.id = t2.solicitante_id JOIN vereda t3 on t3.id = t1.vereda_id ORDER BY `t1`.`cedula` ASC", $encabezados, $aliasSQL);
	}

	public function reporteDeudaPersona(){
		$encabezados[0] = "Cedula";
		$encabezados[1] = "Nombre Completo";
		$encabezados[2] = "Telefono";
		$encabezados[3] = "Dirección";
		$encabezados[4] = "E-mail";
		$encabezados[5] = "Vereda";
		$encabezados[6] = "Total Deuda";

		$aliasSQL[0] = "cedula";
		$aliasSQL[1] = "nombre_completo";
		$aliasSQL[2] = "telefono";
		$aliasSQL[3] = "direccion";
		$aliasSQL[4] = "email";
		$aliasSQL[5] = "vereda";
		$aliasSQL[6] = "deuda";

		return $this->lib->print_tabla_simple("SELECT t1.cedula, concat(t1.nombres, ' ', t1.apellidos) nombre_completo, t1.telefono, t1.direccion, t1.email, t3.nombre as vereda, (SELECT SUM(t2.valor) FROM solicitud t2 WHERE t2.solicitante_id = t1.id) deuda FROM solicitante t1 JOIN vereda t3 on t3.id = t1.vereda_id", $encabezados, $aliasSQL);
	}

	public function reporteDeudaVereda(){
		$encabezados[0] = "Nombre de la Vereda";
		$encabezados[1] = "Corregimiento";
		$encabezados[2] = "Deuda";

		$aliasSQL[0] = "vereda";
		$aliasSQL[1] = "corregimiento";
		$aliasSQL[2] = "deuda";

		return $this->lib->print_tabla_simple("SELECT t3.nombre vereda, t4.nombre corregimiento, (SELECT SUM(t2.valor) FROM solicitante t1 JOIN solicitud t2 on t1.id = t2.solicitante_id WHERE t1.vereda_id = t3.id) deuda FROM vereda t3 JOIN despacho t4 ON t3.corregimiento_id = t4.id", $encabezados, $aliasSQL);
	}

	public function reporteFiltrado($filter_corre, $filter_tipo, $filter_estad, $filter_total){
		$count_corre = count($filter_corre);
		$count_tipo = count($filter_tipo);
		$count_estad = count($filter_estad);
		$sentenciaaSQL_corre = '';
		$sentenciaaSQL_tipo = '';
		$sentenciaaSQL_estad = '';

		$encabezados = [];
		$aliasSQL = [];


		if (!empty($filter_corre)) {
			$sentenciaaSQL_corre .= "(";
			for ($i=0; $i < $count_corre ; $i++) { 
				$sentenciaaSQL_corre .= "t4.id=".$filter_corre[$i];
				if ($i<$count_corre-1) {
					$sentenciaaSQL_corre .= " OR ";
				}
			}
			$sentenciaaSQL_corre .= ")";
		}
		if (!empty($filter_tipo)) {
			$sentenciaaSQL_tipo .= "(";
			for ($i=0; $i < $count_tipo ; $i++) { 
				$sentenciaaSQL_tipo .= "t2.tipo_id=".$filter_tipo[$i];
				if ($i<$count_tipo-1) {
					$sentenciaaSQL_tipo .= " OR ";
				}
			}
			$sentenciaaSQL_tipo .= ")";
		}
		if (!empty($filter_estad)) {
			$sentenciaaSQL_estad .= "(";
			for ($i=0; $i < $count_estad ; $i++) { 
				$sentenciaaSQL_estad .= "t2.estado_id=".$filter_estad[$i];
				if ($i<$count_estad-1) {
					$sentenciaaSQL_estad .= " OR ";
				}
			}
			$sentenciaaSQL_estad .= ")";
		}
		$sentenciaaSQL = '';
		if ($filter_total == 0) {
			$encabezados[] = "Cedula";
			$encabezados[] = "Nombre Completo";
			$encabezados[] = "Telefono";
			$encabezados[] = "Dirección";
			$encabezados[] = "E-mail";
			$encabezados[] = "Corregimiento";
			$encabezados[] = "Vereda";
			$encabezados[] = "Solicitud";
			$encabezados[] = "Tramitador";
			$encabezados[] = "Despacho";
			$encabezados[] = "Ayuda";
			$encabezados[] = "Estado";
			$encabezados[] = "Fecha";
			$encabezados[] = "Descripción";
			$encabezados[] = "Deuda";

			$aliasSQL[] = "cedula";
			$aliasSQL[] = "nombre";
			$aliasSQL[] = "telefono";
			$aliasSQL[] = "direccion";
			$aliasSQL[] = "email";
			$aliasSQL[] = "corregimiento";
			$aliasSQL[] = "vereda";
			$aliasSQL[] = "solicitud";
			$aliasSQL[] = "tramitador";
			$aliasSQL[] = "despacho";
			$aliasSQL[] = "ayuda";
			$aliasSQL[] = "estado";
			$aliasSQL[] = "fecha";
			$aliasSQL[] = "descripcion";
			$aliasSQL[] = "valor";

			$sentenciaaSQL = 'SELECT t1.cedula, concat(t1.nombres, " ", t1.apellidos) nombre, t1.telefono, t1.direccion, t1.email, t4.nombre corregimiento,';
			$sentenciaaSQL .='COALESCE((SELECT vereda.nombre FROM vereda WHERE vereda.id = t1.vereda_id), "") vereda, ';
			$sentenciaaSQL .='t2.nombre solicitud, concat(t6.nombres," ",t6.apellidos) tramitador, t7.nombre despacho, t5.nombre ayuda, t3.nombre estado, from_unixtime(t2.fecha) fecha, t2.descripcion, t2.valor';
			$sentenciaaSQL .=' FROM solicitante t1 ';
			$sentenciaaSQL .='JOIN solicitud t2 ON t1.id = t2.solicitante_id';
			$sentenciaaSQL .=' JOIN estado t3 ON t2.estado_id = t3.id';
			$sentenciaaSQL .=' JOIN corregimiento t4 ON t1.corregimiento_id = t4.id';
			$sentenciaaSQL .=' JOIN tipo_ayuda t5 ON t2.tipo_id = t5.id';
			$sentenciaaSQL .=' JOIN usuario t6 ON t2.colaborador_id = t6.id';
			$sentenciaaSQL .=' JOIN despacho t7 ON t2.despacho_id = t7.id';
			if(!empty($filter_corre) || !empty($filter_tipo) || !empty($filter_estad)){
				$sentenciaaSQL .= " WHERE ";
				if(!empty($filter_corre)){
					$sentenciaaSQL .= $sentenciaaSQL_corre;
				}
				if (!empty($filter_tipo)) {
					if (!empty($filter_corre)) {
						$sentenciaaSQL .= " AND ";
					}
					$sentenciaaSQL .= $sentenciaaSQL_tipo;
				}
				if (!empty($filter_estad)) {
					if (!empty($filter_corre) || !empty($filter_tipo)) {
						$sentenciaaSQL .= " AND ";
					}
					$sentenciaaSQL .= $sentenciaaSQL_estad;
				}
			}
		}elseif($filter_total == 1){
			$encabezados[] = "Cedula";
			$encabezados[] = "Nombre Completo";
			$encabezados[] = "Telefono";
			$encabezados[] = "Dirección";
			$encabezados[] = "E-mail";
			$encabezados[] = "Corregimiento";
			$encabezados[] = "Vereda";
			$encabezados[] = "Deuda";

			$aliasSQL[] = "cedula";
			$aliasSQL[] = "nombre";
			$aliasSQL[] = "telefono";
			$aliasSQL[] = "direccion";
			$aliasSQL[] = "email";
			$aliasSQL[] = "corregimiento";
			$aliasSQL[] = "vereda";
			$aliasSQL[] = "valor";

			$sentenciaaSQL .= 'SELECT t1.cedula, concat(t1.nombres, " ", t1.apellidos) nombre, t1.telefono, t1.direccion, t1.email, t4.nombre corregimiento,';
			$sentenciaaSQL .= 'COALESCE((SELECT vereda.nombre FROM vereda WHERE vereda.id = t1.vereda_id), "") vereda,';
			$sentenciaaSQL .= '(SELECT SUM(t2.valor) FROM solicitud t2 WHERE t2.solicitante_id = t1.id ';
				if (!empty($filter_tipo) || !empty($filter_estad)) {
					$sentenciaaSQL .= " AND (";
					if (!empty($filter_tipo)) {
						$sentenciaaSQL .= $sentenciaaSQL_tipo;
					}
					if(!empty($filter_estad)){
						if (!empty($filter_tipo)) {
							$sentenciaaSQL .= " AND ";
						}
						$sentenciaaSQL .= $sentenciaaSQL_estad;
					}
					$sentenciaaSQL .= ")";
				}
			$sentenciaaSQL .= ') valor';
			$sentenciaaSQL .= ' FROM solicitante t1';
			$sentenciaaSQL .= ' JOIN corregimiento t4 ON t1.corregimiento_id = t4.id';
			if (!empty($filter_corre)) {
				$sentenciaaSQL .= ' WHERE '.$sentenciaaSQL_corre;
			}
		}elseif ($filter_total == 2) {
			$encabezados[] = "Corregimiento";
			$encabezados[] = "Deuda";

			$aliasSQL[] = "corregimiento";
			$aliasSQL[] = "valor";

			$sentenciaaSQL .= 'SELECT t4.nombre corregimiento,';
			$sentenciaaSQL .= '(SELECT SUM(t2.valor) FROM solicitante t1 JOIN solicitud t2 on t1.id = t2.solicitante_id WHERE t1.corregimiento_id = t4.id ';
				if (!empty($filter_tipo) || !empty($filter_estad)) {
					$sentenciaaSQL .= " AND (";
					if (!empty($filter_tipo)) {
						$sentenciaaSQL .= $sentenciaaSQL_tipo;
					}
					if(!empty($filter_estad)){
						if (!empty($filter_tipo)) {
							$sentenciaaSQL .= " AND ";
						}
						$sentenciaaSQL .= $sentenciaaSQL_estad;
					}
					$sentenciaaSQL .= ")";
				}
			$sentenciaaSQL .= ') valor';
			$sentenciaaSQL .= ' FROM corregimiento t4';
			if (!empty($filter_corre)) {
				$sentenciaaSQL .= ' WHERE '.$sentenciaaSQL_corre;
			}
		}elseif ($filter_total == 3) {
			$encabezados[] = "Ayuda";
			$encabezados[] = "Descripción";
			$encabezados[] = "Deuda";

			$aliasSQL[] = "nombre";
			$aliasSQL[] = "descripcion";
			$aliasSQL[] = "valor";

			$sentenciaaSQL .= 'SELECT t5.nombre, t5.descripcion, ';
			$sentenciaaSQL .= '(SELECT SUM(t2.valor) FROM solicitud t2 JOIN solicitante t1 ON t1.id = t2.solicitante_id JOIN corregimiento t4 ON t4.id = t1.corregimiento_id WHERE t2.tipo_id = t5.id ';
				if (!empty($filter_tipo) || !empty($filter_estad)) {
					$sentenciaaSQL .= " AND (";
					if (!empty($filter_tipo)) {
						$sentenciaaSQL .= $sentenciaaSQL_tipo;
					}
					if(!empty($filter_estad)){
						if (!empty($filter_tipo)) {
							$sentenciaaSQL .= " AND ";
						}
						$sentenciaaSQL .= $sentenciaaSQL_estad;
					}
					if(!empty($filter_corre)){
						if (!empty($filter_tipo) || !empty($filter_estad)) {
							$sentenciaaSQL .= " AND ";
						}
						$sentenciaaSQL .= $sentenciaaSQL_corre;
					}
					$sentenciaaSQL .= ")";
				}
			$sentenciaaSQL .= ') valor';
			$sentenciaaSQL .= ' FROM tipo_ayuda t5';
		}elseif ($filter_total == 4) {
			$encabezados[] = "Estado";
			$encabezados[] = "Deuda";

			$aliasSQL[] = "nombre";
			$aliasSQL[] = "valor";

			$sentenciaaSQL .= 'SELECT t3.nombre, ';
			$sentenciaaSQL .= '(SELECT SUM(t2.valor) FROM solicitud t2 JOIN corregimiento t4 ON t4.id = t2.colaborador_id WHERE t2.estado_id = t3.id ';
				if (!empty($filter_tipo) || !empty($filter_estad)) {
					$sentenciaaSQL .= " AND (";
					if (!empty($filter_tipo)) {
						$sentenciaaSQL .= $sentenciaaSQL_tipo;
					}
					if(!empty($filter_estad)){
						if (!empty($filter_tipo)) {
							$sentenciaaSQL .= " AND ";
						}
						$sentenciaaSQL .= $sentenciaaSQL_estad;
					}
					if(!empty($filter_corre)){
						if (!empty($filter_tipo) || !empty($filter_estad)) {
							$sentenciaaSQL .= " AND ";
						}
						$sentenciaaSQL .= $sentenciaaSQL_corre;
					}
					$sentenciaaSQL .= ")";
				}
			$sentenciaaSQL .= ') valor';
			$sentenciaaSQL .= ' FROM estado t3';
		}
		return $this->lib->print_tabla_simple($sentenciaaSQL,$encabezados,$aliasSQL);
	}
}