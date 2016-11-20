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
		<form class="form_ayuda" action="" method="post" name="form_ayuda" id="form_ayuda">
			<input type="hidden" name="p1" id="p1" value="">
			<table class="form_header" id="tab_datos">
				<tr>
					<td>
						<div class="form-label"><label class="lblfayuda" for="p2">Nombre de Ayuda<span>*</span></label></div>
						<div class="form-input"><input class="inpfayuda" type="text" name="p2" id="p2" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-label"><label class="" for="p3">Descripción<span>*</span></label></div>
						<div class="form-input"><input class="" type="textarea" name="p3" id="p3" size="25" value="" required/></div>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
		<button class="guardar_btn" id="guardar_btn" onclick="createUpdate('<?= $AccionForm ?>','form_ayuda')"/><?= $TextoBtn ?></button>
	</div>
	<?= $Footer ?>
	<?= $Chat ?>
</body>
</html>
