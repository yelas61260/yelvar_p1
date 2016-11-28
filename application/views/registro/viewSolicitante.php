<?= $StyleView ?>
<form action="" method="post" name="form_solicitante" id="form_solicitante">
	<input type="hidden" name="p1" id="p1" value="">
	<table class="form_header" id="tab_datos">
		<tr>
			<td>
				<div class="form-label"><label for="p2">Cédula<span>*</span></label></div>
				<div class="form-input"><input type="text" name="p2" id="p2" size="25" value="" required/></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-label"><label for="p3">Nombres<span>*</span></label></div>
				<div class="form-input"><input type="text" name="p3" id="p3" size="25" value="" required/></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-label"><label for="p4">Apellidos<span>*</span></label></div>
				<div class="form-input"><input type="text" name="p4" id="p4" size="25" value="" required/></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-label"><label for="p5">Teléfono<span>*</span></label></div>
				<div class="form-input"><input type="text" name="p5" id="p5" size="25" value="" required/></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-label"><label for="p6">Dirección<span>*</span></label></div>
				<div class="form-input"><input type="text" name="p6" id="p6" size="25" value="" required/></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-label"><label for="p7">Vereda<span>*</span></label></div>
				<div class="form-input"><select name="p7" id="p7" required><?= $list_vereda ?></select></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-label"><label for="p8">Email<span>*</span></label></div>
				<div class="form-input"><input type="text" name="p8" id="p8" size="25" value="" required/></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-label"><label for="p9">Foto<span>*</span></label></div>
				<div class="foto-imag"><img src=""></div>
				<div class="form-input"><input type="hidden" name="p9" id="p9" size="25" value="" required/></div>
			</td>
		</tr>
	</table>
</form>
<button id="guardar_btn" onclick="createUpdate('<?= $AccionForm ?>','form_solicitante')"/><?= $TextoBtn ?></button>