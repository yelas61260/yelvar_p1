var sayCheese = null;
var img = null;
$(function(){
	sayCheese = new SayCheese('#cam_sol', { audio: false });
	sayCheese.on('start', function() {
	});
	sayCheese.on('snapshot', function(snapshot) {
		img = document.createElement('img');
		$(img).on('load',function(){
			$('#img_sol').html(img);
			$('#cam_sol').hide();
			$('#img_sol').show();
		});
		img.src = snapshot.toDataURL('image/png');
		$('#p9').val(img.src);
	});
	sayCheese.start();
});
function tomarFoto(){
	sayCheese.takeSnapshot(280,280);
	return false;
}