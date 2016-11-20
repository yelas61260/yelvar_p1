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
		<div id="principalTabla"><!--DIV PRINCIPAL-->
			<div id="div_tabla">
				<table id="tablaCRUD" class="display responsive nowrap" cellspacing="0" width="100%">
					<?= $table_grafic ?>
				</table>
				<br>
				<button id="boton_agregar" onclick="abrir_ruta('<?= base_url().$mod_view; ?>')">Agregar</button>
				<br>
			</div>
		</div>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
