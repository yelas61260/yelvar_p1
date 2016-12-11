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
	$("#act_sol").on('click', guardarFoto);
	sayCheese.start();
});
function tomarFoto(){
	sayCheese.takeSnapshot(280,280);
	return false;
}
/*
function guardarFoto(){
	$.ajax({
		type: "POST",
		url: "http://localhost/GitHub/yelvar_p1/DAOSolicitanteIMPL/setFoto",
		data: {
			p9: $("#img_sol img").attr("src")
		},
		success: function() {
		}
	});
}
*/
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