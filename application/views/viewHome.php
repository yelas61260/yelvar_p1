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
	
<table>
	<tr>
		<td>
			<form>
			<h1>Bienvenido(a)</h1>
			<div id="usuarioLog"><?= $userName ?></div>
			<h4>Este es el  Sistema de gestion y control de acceso a para la Alcaldia de Tiquisio Bolivar</h4>
			</form>
		</td>	
		<td>
			<IMG class="pueblo1" SRC="<?=base_url() ?>recursos/pix/Home/pueblo1.png">
		</td>
	</tr>
		
</div>

<?= $Footer ?>


</body>
</html>
