var sayCheese = null;
var img = null;
$(function(){
	sayCheese = new SayCheese('#cam_sol', { audio: false, snapshots: true });
	sayCheese.on('start', function() {
	});
	sayCheese.on('snapshot', function(snapshot) {
		$("#img_sol img").attr("src", snapshot.toDataURL('image/png'));
		$('#cam_sol').hide();
		$('#img_sol').show();

		$('#p9').val($("#img_sol img").attr("src"));
	});
	$("#act_sol").on('click', actualizar_solicitante);
	$("#bus_sol").on('click', buscar_solicitante);
	sayCheese.start();
});
function tomarFoto(){
	sayCheese.takeSnapshot(280,280);
	return false;
}
function buscar_solicitante(){
	var strDAtos = "id="+$('#p2').val();
	var datosArray;
	mostrando = false;
	$.ajax({
		type: "POST",
		url: $('#bus_sol').attr('url'),
		datatype: "html",
		data: strDAtos,
		success: function(data) {
			datosArray = data.split(separador_split);
			for(i=2; i<=9; i++){
				if(datosArray[i] != ""){
					$('#p'+i).val(datosArray[i-1]);
				}
			}
			cargarFoto(datosArray[8]);
		}
	});
}
function actualizar_solicitante(){
	$('#solicitante').attr('src', $('#solicitante').attr('url')+$('#p2').val());
	$('#modal_solicitante').show();
}
function cargarFoto(id){
	$.ajax({
		type: "POST",
		url: $("#img_sol").attr("url"),
		data: "id="+id,
		success: function(data_foto) {
			$("#img_sol img").attr("src", data_foto);
			$('#cam_sol').hide();
			$('#img_sol').show();
		}
	});
}