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
<<<<<<< HEAD


<table>
	<tr>
		<td bgcolor="#000000">
		<IMG class="Titulo" SRC="<?=base_url() ?>recursos/pix/RegistroUsuarios/TituloRegistroUsuarios.png" >	
		</td>
	</tr>
</table>	
	<form action="<?=base_url() ?>DAOUsuarioIMPL/actionLogin"  method="POST">
		<Input  class="pwd1" type="password" max-length="20" placeholder="Confirmar Contraseña"/>
		<h4 class="nombres">Nombres</h4>
		<Input  class="nombres" type="text" max-length="20" placeholder="Nombres"/>
		<h4 class="apellidos">Apellidos</h4>
		<Input  class="apellidos"  max-length="20" placeholder="Apellidos"/>
		<h4 class="User">Usuario</h4>
		<Input  class="User" type="text" max-length="20" placeholder="Usuario"/>
		<IMG class="ok" SRC="<?=base_url() ?>recursos/pix/RegistroUsuarios/ok.png">	
		<h4 class="pwd">Contraseña</h4>
		<Input  class="pwd" type="password" max-length="20" placeholder="Contraseña"/>
		<IMG class="unok" SRC="<?=base_url() ?>recursos/pix/RegistroUsuarios/unok.png">	
		<h4 class="pwd1">Confirmar Contraseña</h4>
	
		
		<button type="subimit">Actualizar o Registrar</Button>	
	
	</form>
	
		<?= $Footer ?>
	

=======
		<div><?= $titulo ?></div>
		<form action="" method="post" name="form_usuario" id="form_usuario">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label for="p2">Usuario<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" pattern="[0-9]{5,15}" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p2">Contraseña<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="45" value="" required /></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p2c">Confirmar Contraseña<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2c" id="p2c" size="45" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p3">Cedula</label></div>
						<div class="form-input"><input type="text" name="p3" id="p3" size="45" value=""/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p4">Nombres</label></div>
						<div class="form-input"><input type="text" name="p4" id="p4" size="45" value=""/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p5">Apellidos</label></div>
						<div class="form-input"><input type="text" name="p5" id="p5" size="45" value=""/></div>
					</td>
				</tr>
			</table>
		</form>
		<button class="accion_btn" id="guardar_btn" onclick="create('<?= $AccionForm ?>','form_usuario')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
>>>>>>> parent of 2e7c7db... HV_2016_11_7
</body>
</html>
