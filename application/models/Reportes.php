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
}