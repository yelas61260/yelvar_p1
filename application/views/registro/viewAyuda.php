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
		<form class="form_ayuda" action="" method="post" name="form_ayuda" id="form_ayuda">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label class="lblfayuda" for="p2">Manual de Ayuda<span>*</span></label></div>
						<div class="form-input"><input class="inpfayuda" type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
		<button class="guardar_btn" id="guardar_btn" onclick="create('<?= $AccionForm ?>','form_ayuda')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
