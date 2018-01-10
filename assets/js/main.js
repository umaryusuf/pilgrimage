$(function(){

	$('.details-btn').on('click', function(){
		var panelid = $(this).attr('data-details-id');
		//console.log(panelid)
		$('.'+panelid).toggle();
	});

	$('.order-btn').on('click', function(){
		window.open('placeorder.php', '_self');
	});
});