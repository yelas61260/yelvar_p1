
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $titulo ?></title>
	<?= $StyleView ?>
</head>
<body>
	<?= $Header ?>
	<div id="etiqueta">	
		
			<table class="tform">
			<tr><td class="centrar">
				<form action="<?=base_url() ?>DAOUsuarioIMPL/actionLogin"  method="POST">
				<h1>Ingresar</h1>
				<IMG class="userim" SRC="<?=base_url() ?>recursos/pix/Login/userim.png">
				<Input name="p1" class="usuario" type="text" max-length="20" placeholder="Usuario"/>
				<IMG class="lock" SRC="<?=base_url() ?>recursos/pix/Login/lock.png">
				<Input name="p2" class="password" type="password" max-length="20" placeholder="Contraseña"/>
				<button class="form_button" type="subimit">Entrar</Button><br/>
				<a href="Olvido Contraseña">Olvido Contraseña</a>
				</form>
			</td><td class="ocultar">
				<IMG class="pueblo" SRC="<?=base_url() ?>recursos/pix/Login/pueblo.png" ALT="">
			</td></tr>
		</table>
		
	
	</div>
	<?= $Footer ?>
</body>