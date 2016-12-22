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
		<div>
			<button class="form_button" onClick="abrir_ruta('<?= base_url() ?>reporte/reporteCompleto');">Reporte Completo</button>
			<button class="form_button" onClick="abrir_ruta('<?= base_url() ?>reporte/reporteDeudaPersona');">Reporte Deuda Por Persona</button>
			<button class="form_button" onClick="abrir_ruta('<?= base_url() ?>reporte/reporteDeudaVereda');">Reporte Deuda Por Vereda</button>
		</div>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>