function abrir_ruta(param_ruta){
	window.location= param_ruta;
}
function validateData(param_formName){
	for(i=0; i<document.forms[param_formName].length; i++){
		if(document.forms[param_formName][i].value == "" && document.forms[param_formName][i].hasAttribute('required')){
			return false;
		}
	}
	return true;
}
function createUpdate(param_ruta, param_formName){
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
			url: param_ruta+"",
			datatype: "html",
			data: strDAtos,
			success: function(data) {
				alert(data);
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
function read(id, param_ruta, param_formName){
	var strDAtos = "id="+id;
	var datosArray;
	mostrando = false;
	$.ajax({
		type: "POST",
		url: param_ruta,
		datatype: "html",
		data: strDAtos,
		success: function(data) {
			datosArray = data.split(",");
			if (param_formName == "form_solicitud") {
				$("#img_sol").attr("src", datosArray[8]);
			}
			for(i=0; i<document.forms[param_formName].length; i++){
				if(datosArray[i] != ""){
					document.forms[param_formName][i].value = datosArray[i];
				}
			}
		}
	});
}
function read_solicitante(id){

}
function edit_fun(id, param_ruta){
	abrir_ruta(param_ruta+"/"+id);
}
function delete_fun(id, param_ruta){
	alertify.confirm("¿Esta seguro de eliminar el registro?", function (e){
		if (e){// validacion de eliminar
			var strDAtos = "id="+paramId;
			$.ajax({
				type: "POST",
				url: param_ruta,
				datatype: "html",
				data: strDAtos,
				success: function(data) {
					//alert(data);
					window.location.reload(true);
				}
			});
		}else{
		}
	});
}
function unirExtra(){
	var returnVal = new Array();
	$("#extra tr").each(function(index){
		if($(this).attr("valor") != undefined){
			returnVal.push($(this).attr("valor"));
		}
	});
	return returnVal.join(";");
}