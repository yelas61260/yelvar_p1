<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $titulo ?></title>
	<?= $StyleView ?>
	</head>
<body>
	<?= $Header ?>
	<div class="contentarea">
		<div><?= $titulo ?></div>
		<form action="" method="post" name="form_solicitud" id="form_solicitud">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="header-sec-form"><span>Datos del solicitante</span></div>
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
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p4">Apellidos<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p5">Dirección<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p6">Teléfono<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="header-sec-form"><span>Datos de petición</span></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p8">Nombre<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p9">Despacho<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p2">Tipo<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p2">Estado<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p2">Descripción<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
		<button id="guardar_btn" onclick="create('<?= $AccionForm ?>','form_solicitud')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
