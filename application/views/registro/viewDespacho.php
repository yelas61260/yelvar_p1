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
		<div><?= $titulo ?></div>
		<form action="" method="post" name="form_corregimiento" id="form_corregimiento">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label for="p2">Nombre<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label for="p3">Dirección<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p3" id="p3" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
		<button id="guardar_btn" onclick="create('<?= $AccionForm ?>','form_corregimiento')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
