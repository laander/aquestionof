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

	$("a.topcat, #site-title a.gridButton").click(function() {
		$("a.subcat").hide();
		$(this).parent().find("a.subcat").show();
	})

});

Cufon.replace('#primary-menu li a.topcat');
Cufon.replace('#primary-menu li a.subcat');

