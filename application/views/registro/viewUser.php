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
		<div class="title_main"><?= $titulo ?></div>
		<div class="header-sec-form"><span>Datos del usuario</span></div>
		<form action="" method="post" name="form_usuario" id="form_usuario">
			<input type="hidden" name="p1" id="p1" value="">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label for="p2">Usuario<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" pattern="[0-9]{5,15}" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p3">Contraseña<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p3" id="p3" size="45" value="" required /></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p3c">Confirmar Contraseña<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p3c" id="p3c" size="45" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p4">Cedula</label></div>
						<div class="form-input"><input type="text" name="p4" id="p4" size="45" value=""/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p5">Nombres</label></div>
						<div class="form-input"><input type="text" name="p5" id="p5" size="45" value=""/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p6">Apellidos</label></div>
						<div class="form-input"><input type="text" name="p6" id="p6" size="45" value=""/></div>
					</td>
				</tr>
			</table>
		</form>
		<div class="header-sec-form"><span>Roles del usuario</span></div>
		<div class="cont_tbl_roles">
			<table>
				<tr>
					<td><div class="form-label"><label for="rol">Rol</label></td>
					<td><select name="rol" id="rol" required>
						<?= $lista_roles ?>
					</select></td>
				</tr>
				<tr>
					<td>
						<button id="roles_btn" onclick="read_roles_usuario()"/>Agregar Rol</button>
					</td>
				</tr>
			</table>
			<table id="extra" class="tabla_general" border="2">
				<thead>
					<th>Rol</th>
					<th>Acción</th>
				</thead>
				<tbody id="cont_roles"></tbody>
			</table>
		</div>
		<button class="" id="guardar_btn" onclick="createUpdate('<?= $AccionForm ?>','form_usuario')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
