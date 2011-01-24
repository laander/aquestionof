// To be run when DOM is loaded. Initializes all effects and behaviours
$(document).ready(function() {

	applyCufon();
	masonryGridSetup();
	springloadedMenuEffect();
	outputCartFromOC();

});

// Initiate the masonry grid effect
function masonryGridSetup() {

	initMasonryEffect();

}

// Run the necessary jQuery for the top menu
function springloadedMenuEffect() {
	$("a.topcat, #site-title a").click(function() {
	
		$current = $(this).next("ul.primary-menu-sub");
		$current.animate({width: "show", opacity: 1}, {queue: false, duration: 1000});
		$("ul.primary-menu-sub").not($current).animate(
			{width: "1", opacity: 0}, 
			{queue: false, duration: 1000, complete: function() {
				$(this).removeAttr('style')
			}
		});
	});		
}

// Get cart from OpenCart in JSON, write to page and run cufon on resulting text
function outputCartFromOC() {
	$.ajax({
		url: '/aqo/shop/index.php?route=custom/cart',
		success: function(data) {
			var json = jQuery.parseJSON(data);
			$(".shopping-bag .items").html(json.numberOfItems);
			Cufon.replace('.shopping-bag');
	  }
	});
}

// Will apply custom font with cufon for supplied texts
function applyCufon() {
	Cufon.replace('#primary-menu li a.topcat');
	Cufon.replace('#primary-menu li a.subcat');
	$('body').addClass('cufoned');
}