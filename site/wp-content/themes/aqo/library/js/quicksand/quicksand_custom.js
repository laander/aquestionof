$(document).ready(function() {
	
	// Initialize splash screen by getting all items
	var init_elements = $('ul.grid').has('li');
	if (init_elements.length == 0) {
		var init_link = $('<a></a>').attr('href', "fetch-all/");
		goQuicksand(init_link);
	}
	
	// Bind to click handler on gridButtons to start quicksand
	$('a.gridButton').click(function(e) {
		goQuicksand(this);
		e.preventDefault();
	});
	
	// Performs the quicksand goodyness
	function goQuicksand(elements) {
		$.get( $(elements).attr('href'), function(data) {
			$('ul.grid').quicksand( $(data).find('li'), { 
				adjustHeight: 'dynamic'	
			});
		});	
	}
		
/*	// sqreen's code!
	if($.urlParam('path')!=0 && $.urlParam('route')=="product/all"){
		var url = this["URL"];
		var url = url.replace("product/all", "product/category");
		var $elm = $('<a></a>').attr('href', url);
		$.makeAnimattion($elm);		
	}
	
	function makeAnimattion(elm){
		$.get($(elm).attr('href'), function(data) {			
			$('.grid').quicksand(
				$(data).find('li'), {
				adjustHeight : 'dynamic',
				attribute : function(v) {
					return $(v).attr('data-id');
				}
			});
		});
	}
	
	$.urlParam = function(name){
		var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (!results) { return 0; }
		return results[1] || 0;
	};	
*/	
	
});

