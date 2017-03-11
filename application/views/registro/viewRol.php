<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $titulo ?></title>
	</head>
<body>
	<?= $Header ?>
	<?= $StyleView ?>
	<div class="contentarea">
		<div class="title_main"><img src="<?= base_url() ?>recursos/pix/titulo_form.png"><span><?= $titulo ?></span></div>
		<div class="header-sec-form"><span>Datos del Rol</span></div>
		<form action="" method="post" name="form_rol" id="form_rol">
			<input type="hidden" name="p1" id="p1" value="">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label for="p2">Nombre<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
		<div class="header-sec-form"><span>Permisos del Rol</span></div>
		<div class="cont_tbl_permisos">
			<table>
				<tr>
					<td><div class="form-label"><label for="permiso">Permiso</label></td>
					<td><select name="permiso" id="permiso" required>
						<?= $lista_permisos ?>
					</select></td>
				</tr>
				<tr>
					<td>
						<button class="form_button" id="permisos_btn" onclick="read_permiso()"/>Agregar Permiso</button>
					</td>
				</tr>
			</table>
			<table id="extra" class="tabla_general" border="2">
				<thead>
					<th>Permiso</th>
					<th>Acción</th>
				</thead>
				<tbody id="cont_permisos"></tbody>
			</table>
		</div>
		<button class="form_button" id="guardar_btn" onclick="createUpdate('<?= $AccionForm ?>','form_rol','<?= base_url() ?>accion/roles')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
