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
		<div><?= $titulo ?></div>
		<form action="" method="post" name="form_rol" id="form_rol">
			<input type="hidden" name="p1" id="p1" value="">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label for="p2">Nombre<span>*</span></label></div>
						<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
		<button id="guardar_btn" onclick="createUpdate('<?= $AccionForm ?>','form_rol')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
