<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $titulo ?></title>
	</head>
<body>
	<?= $Header ?>
	<?= $StyleView ?>
	<div class="modal_solicitante">
		<iframe id="solicitante" url="<?= base_url(); ?>accion/actualizarSolicitante/" src=""></iframe>
	</div>
	<div class="contentarea">
		<div class="title_main"><?= $titulo ?></div>
		<div class="header-sec-form"><span>Datos del solicitante</span></div>
		<button class="form_button">Buscar Solicitante</button>
		<button class="form_button">Actualizar Solicitante</button>
		<div class="cuadro_foto">
			<div class="form-label"><label for="p9">Foto<span>*</span></label></div>
			<div class="foto-imag"><div id="cam_sol"></div><div id="img_sol"></div></div>
			<button id="foto_btn" onclick="tomarFoto()"/>Tomar Foto</button>
		</div>
		<form action="" method="post" name="form_solicitud" id="form_solicitud">
			<input type="hidden" name="p1" id="p1" value="">
			<table class="form_table" id="tab_datos_solicitante">
				<tbody>
				<tr>
					<td>
						
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p2">Cédula<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p3">Nombres<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p3" id="p3" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p4">Apellidos<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p4" id="p4" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p5">Teléfono<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p5" id="p5" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p6">Dirección<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p6" id="p6" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p7">Vereda<span>*</span></label></div>
						<div class="form-input"><select name="p7" id="p7" required><?= $list_vereda ?></select></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p8">Email<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p8" id="p8" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>	
						<div class="form-input"><input type="hidden" name="p9" id="p9" size="25" value=""/></div>
					</td>
				</tr>
				</tbody>
			</table>
			
			<div class="header-sec-form"><span>Datos de petición</span></div>
			<table class="form_table" id="tab_datos_solicitud">
				<tbody>
				<tr>
					<td>
						<div class="form-label"><label for="p10">Nombre<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p10" id="p10" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p11">Despacho<span>*</span></label></div>
						<div class="form-input"><select name="p11" id="p11" required><?= $list_despacho ?></select></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p12">Tipo<span>*</span></label></div>
						<div class="form-input"><select name="p12" id="p12" required><?= $list_tipo ?></select></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p13">Estado<span>*</span></label></div>
						<div class="form-input"><select name="p13" id="p13" required><?= $list_estado ?></select></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p14">Descripción<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p14" id="p14" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
				</tr>
				</tbody>
			</table>
		</form>
		<button id="guardar_btn" onclick="createUpdate('<?= $AccionForm ?>','form_solicitud')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
