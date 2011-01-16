$(document).ready(function() { // To be run when DOM is loaded

/*
	// Make the specified div 'follow' when scrolling
    var $sidebar   = $("#bar-container"),
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 15;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            }, 700);
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            }, 700);
        }
    });	
*/
	//$("a.subcat").css({width: 0})
	$("a.topcat, #site-title a").click(function() {
	
		$current = $(this).next("ul.primary-menu-sub");
		$current.animate({width: "show", opacity: 1}, {queue: false, duration: 1000});
		$("ul.primary-menu-sub").not($current).animate(
			{width: "1", opacity: 0}, 
			{queue: false, duration: 1000, complete: function() {
				$(this).removeAttr('style')
			}
		});
	
/*	
		//$("a.subcat").hide();
		var elementWidth = [];
		var containerWidth = 0;
		$element = $(this).parent().find("a.subcat");
		
		$("a.subcat").not($element).animate({width: "hide", opacity: 0}, {queue: false, duration: 1000});
		
		$element.each(function(index) {
			//elementWidth[index] = $(this).width();
			$element.css("white-space", "nowrap");		
			$element.animate({width: "show", opacity: 1}, {queue: false, duration: 1000});
		});		
		//alert(elementWidth);
		//width = $element.width();
		//$element.show();
		//$element.animate({width: auto});
*/		
		
	});

});

Cufon.replace('#primary-menu li a.topcat');
Cufon.replace('#primary-menu li a.subcat');
Cufon.replace('.shopping-bag');

