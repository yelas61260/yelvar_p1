<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $titulo ?></title>
	<style type="text/css">
	.opt0{
		display:none;
	}
	td{
		padding: 10px;
	}
	</style>
</head>
<body>
	<?= $Header ?>
	<?= $StyleView ?>
	<div class="contentarea">
		<div class="title_main"><img src="<?= base_url() ?>recursos/pix/titulo_form.png"><span><?= $titulo ?></span></div>
		<div class="header-sec-form"><span>Filtros</span></div>
		<form action="<?= base_url() ?>Reporte/reporteFiltrado" method="post" name="form_corregimiento" id="form_despacho">
			<table class="form_header">
				<tr>
					<td>
						<div class="form-label"><label for="p1">Corregimiento</label></div>
						<div class="form-input"><select name="p1[]" id="p1" class="list_reporte" multiple>
							<?= $lista_corre ?>
						</select></div>
					</td>
					<td>
						<div class="form-label"><label for="p2">Tipo de ayuda</label></div>
						<div class="form-input"><select name="p2[]" id="p2" class="list_reporte" multiple>
							<?= $lista_ayuda ?>
						</select></div>
					</td>
					<td>
						<div class="form-label"><label for="p3">Estado</label></div>
						<div class="form-input"><select name="p3[]" id="p3" class="list_reporte" multiple>
							<?= $lista_estado ?>
						</select></div>
					</td>
					<td>
						<div class="form-label"><input type="radio" name="p4" value="0" checked><label for="p4">Ninguno</label></div>
						<div class="form-label"><input type="radio" name="p4" value="1"><label for="p4">Totales por Solicitante</label></div>
						<div class="form-label"><input type="radio" name="p4" value="2"><label for="p4">Totales por Corregimiento</label></div>
						<div class="form-label"><input type="radio" name="p4" value="3"><label for="p4">Totales por Ayuda</label></div>
						<div class="form-label"><input type="radio" name="p4" value="4"><label for="p4">Totales por Estado</label></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		<button class="form_button" id="guardar_btn" ><?= $TextoBtn ?></button>
		</form>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>