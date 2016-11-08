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


	<table class="form_header" id="tab_datos">
				
					

<table>
	<tr>
		<td>
			<div class="header-sec-form"><span>Datos del solicitante</span></div>
		</td>
	</tr>
</table>	
		<form name="form_solicitud"  action="<?=base_url() ?>DAOUsuarioIMPL/actionLogin"  method="POST">
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
	</table>
		
	
		
		<button type="subimit">Actualizar o Registrar</Button>	
	
	</form>
	
		<?= $Footer ?>
	

</body>
</html>
