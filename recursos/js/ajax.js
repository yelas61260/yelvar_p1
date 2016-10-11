function validateData(param_formName){
	for(i=0; i<document.forms[param_formName].length; i++){
		if(document.forms[param_formName][i].value == "" && document.forms[param_formName][i].hasAttribute('required')){
			return false;
		}
	}
	return true;
}
function insert(param_formName){
	if(validateData(param_formName)){
		var strDAtos = "";
		var datosExtra = unirExtra();
		if(datosExtra != ""){
			strDAtos += "extra="+datosExtra+"&";
		}
		for(i=0; i<document.forms[param_formName].length; i++){
			if(document.forms[param_formName][i].type != "checkbox"){
				strDAtos += document.forms[param_formName][i].name+"="+document.forms[param_formName][i].value;
			}else{
				if(document.forms[param_formName][i].checked){
					strDAtos += document.forms[param_formName][i].name+"=1";
				}else{
					strDAtos += document.forms[param_formName][i].name+"=0";
				}
			}
			if(i<document.forms[param_formName].length-1){
				strDAtos += "&";
			}
		}
		alert(strDAtos);
		$.ajax({
			type: "POST",
			url: param_ruta+"/jinsert",
			datatype: "html",
			data: strDAtos,
			success: function(data) {
				//alert(data);
				if(data == "OK"){
					alertify.alert("Registro exitoso!", function () {
						window.location.reload(true);
					});
				}else{
					alertify.alert("No se pudo guardar el registro<br>"+data);
				}
			}
		});
	}else{
		alertify.alert("Hay campos obligatorios sin completar<br>Por favor llene todos los campos.");
	}
}