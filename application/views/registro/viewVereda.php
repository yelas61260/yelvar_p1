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
		<div class="header-sec-form"><span>Datos de la vereda</span></div>
		<form action="" method="post" name="form_vereda" id="form_vereda">
			<input type="hidden" name="p1" id="p1" value="">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label for="p2">Nombre<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p3">Corregimiento<span>*</span></label></div>
						<div class="form-input"><select name="p3" id="p3" required><?= $lista_corr ?></select></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
		<button class="form_button" id="guardar_btn" onclick="createUpdate('<?= $AccionForm ?>','form_vereda','<?= base_url() ?>accion/veredas')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
