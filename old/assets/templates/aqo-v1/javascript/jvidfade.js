$(document).ready(function() {
	//$('.vidobject').css('opacity', 0);
	$('.vidimg').click(function () {
		//$('.vidobject').fadeTo(500, 1);
		$('.vidimg').fadeTo(500, 0, function() {$('.vidimg').hide()} );
	});
});