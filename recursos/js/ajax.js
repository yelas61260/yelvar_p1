var separador_split = "|yv|";
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
function createUpdate(param_ruta, param_formName, param_redirect){
	if(validateData(param_formName)){
		var strDAtos = {};
		var datosExtra = unirExtra();
		if(datosExtra != ""){
			strDAtos["extra"] = datosExtra;
		}
		for(i=0; i<document.forms[param_formName].length; i++){
			if(document.forms[param_formName][i].type != "checkbox"){
				strDAtos[document.forms[param_formName][i].name+""] = document.forms[param_formName][i].value;
			}else{
				if(document.forms[param_formName][i].checked){
					strDAtos[document.forms[param_formName][i].name+""] = 1;
				}else{
					strDAtos[document.forms[param_formName][i].name+""] = 0;
				}
			}
		}
		//alert(JSON.stringify(strDAtos));
		$.ajax({
			type: "POST",
			url: param_ruta+"",
			datatype: "html",
			data: strDAtos,
			success: function(data) {
				//alert(data);
				if(data == "OK"){
					alertify.alert("Registro exitoso!", function () {
						if (param_formName == "form_solicitante") {
//							window.top.location.reload();
							$('#modal_solicitante', window.parent.document).hide();
							parent.buscar_solicitante();
						}else{
							abrir_ruta(param_redirect);
						}
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
			datosArray = data.split(separador_split);
			if (param_formName == "form_solicitud") {
				if(datosArray[9] != ''){
					$("#foto_btn").html("Cambiar Foto");
					$("#foto_btn").attr("onclick","cambiarFoto()");
				}
				cargarFoto(datosArray[9]);
			}
			for(i=0; i<document.forms[param_formName].length; i++){
				if(datosArray[i] != ""){
					document.forms[param_formName][i].value = datosArray[i];
				}
			}
		}
	});
}
function readListVereda(param_ruta, param_id){
	var xmlhttp;

	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("p7").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST",param_ruta,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+param_id);
}
function edit_fun(id, param_ruta){
	abrir_ruta(param_ruta+"/"+id);
}
function delete_fun(id, param_ruta){
	alertify.confirm("¿Esta seguro de eliminar el registro?", function (e){
		if (e){// validacion de eliminar
			var strDAtos = "id="+id;
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

//Acciones de formularios
function read_roles_usuario(){
	var content = "<tr id='ext_"+document.getElementById("rol").value+"' valor='"+document.getElementById("rol").value+"'><td>"+$("#rol option:selected").html()+"</td>";
	content += "<td><button class='form_button' style='margin-top: 0 !important;' onclick='quitar("+document.getElementById("rol").value+", "+0+");'>Quitar</button></td></tr>";
	document.getElementById("cont_roles").innerHTML += content;
}
function read_roles_usuario_edit(id_rol, id_prin){
	var content = "<tr id='ext_"+id_rol+"' valor='"+id_rol+"'><td>"+$("#rol option[value='"+id_rol+"']").text()+"</td>";
	content += "<td><button class='form_button' style='margin-top: 0 !important;' onclick='quitar("+id_rol+", "+id_prin+");'>Quitar</button></td></tr>";
	document.getElementById("cont_roles").innerHTML += content;
}
function read_permiso(){
	var content = "<tr id='ext_"+document.getElementById("permiso").value+"' valor='"+document.getElementById("permiso").value+"'><td>"+$("#permiso option:selected").html()+"</td>";
	content += "<td><button class='form_button' style='margin-top: 0 !important;' onclick='quitar("+document.getElementById("permiso").value+", "+0+");'>Quitar</button></td></tr>";
	document.getElementById("cont_permisos").innerHTML += content;
}
function read_permiso_edit(id_permiso, id_prin){
	var content = "<tr id='ext_"+id_permiso+"' valor='"+id_permiso+"'><td>"+$("#permiso option[value='"+id_permiso+"']").text()+"</td>";
	content += "<td><button class='form_button' style='margin-top: 0 !important;' onclick='quitar("+id_permiso+", "+id_prin+");'>Quitar</button></td></tr>";
	document.getElementById("cont_permisos").innerHTML += content;
}
function quitar(id_ext, id_ext_parent){
	$("#ext_"+id_ext).remove();
}

//Funciones de chat
function abrirCerrarChat(){
	if ($('#content_chat').attr('visible') == '0') {
		$('#content_chat').attr('visible',1);
		$('#content_chat').show();
	}else{
		$('#content_chat').attr('visible',0);
		$('#content_chat').hide();
	}
}
$(document).on("ready", function(){				
	registerMessages();
	$.ajaxSetup({"cache":false});
	setInterval("loadOldMessages()", 500);
});
var registerMessages = function(){
	$('#content_chat').attr('visible',0);
	$("#chat_btn").on("click", function(e){
		e.preventDefault();
		var strDAtos = "p1="+$('#chat_user_send').attr('id_user')+"&p2="+$('#user_chat').val()+"&p3="+$('#chat_msn').val();
		$.ajax({
			type: "POST",
			url: $('#chat_user_send').attr('url_chat')+"DAOChatIMPL/insert",
			data: strDAtos
		}).done(function(info){
			$("#chat_msn").val("");
		})
	});
}
var loadOldMessages = function(){
	var strDAtos = "p1="+$('#chat_user_send').attr('id_user')+"&p2="+$('#user_chat').val();
	console.log(strDAtos);
	if($('#user_chat').val() != undefined && $('#user_chat').val() != ""){
		$.ajax({
			type: "POST",
			url: $('#chat_user_send').attr('url_chat')+"DAOChatIMPL/getRecords",
			data: strDAtos
		}).done(function( info ){
			$("#chat_text").html( info );
			var  altura = $("#chat_text").prop("scrollHeight");
			$("#chat_text").scrollTop(altura);
		});
	}
}

//doble lista de seleccion
function findItem(){
	$("#c1 option").each(function(i, elem){
		$(elem).prop('selected', false);
	});
	$('#c1 option').filter(function () { return $(this).html() == $("#ct1").val(); }).prop('selected', true);
}
function selectItem(){
	$("#c2").append($('#c1 :selected'));
	$('#c1 :selected').remove();
	var listSelect = "";
	$("#c2 option").each(function(i, elem){
		if(listSelect == ""){
			listSelect += ""+$(elem).val();
		}else{
			listSelect += ","+$(elem).val();
		}
	});
	$("#p5").val(listSelect);
}
function quitItem(){
	$("#c1").append($('#c2 :selected'));
	$('#c2 :selected').remove();
	var listSelect = "";
	$("#c2 option").each(function(i, elem){
		if(listSelect == ""){
			listSelect += ""+$(elem).val();
		}else{
			listSelect += ","+$(elem).val();
		}
	});
	$("#p5").val(listSelect);
}