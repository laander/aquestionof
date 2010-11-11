$(document).ready(function() {	
	/*** invoke on initial run ***/	
	$.makeAnimattion(getRoute());

	/**invoke hashchange on button click **/
	$('#grid-navigation a.gridButton').click(function(e) {	
		var route = this["search"].substring(7);
		setHash(route);	
		e.preventDefault();
	});	
 
	/** invoke on hashchange **/
	$(window).hashchange( function(){		
		$.makeAnimattion(getRoute());		
	});		
});

/** do quicksand effect **/
$.makeAnimattion = function(route){
	/** load last app state **/
	var url = "index.php?route="+route;
	var $elm = $('<a></a>').attr('href', url);

	$.get($elm.attr('href'), function(data) {			
		$('.grid').quicksand($(data).find('li'), {
			adjustHeight : 'dynamic',
			attribute : function(v) {
				return $(v).find('img').attr('src');
			}
		});
	});
}

/** make hash in url to save app instance (for bookmark, back button etc) **/
function setHash(urlHash){
	window.location.hash = urlHash;
}

function getRoute(){
	/** determine last app state **/
	var urlHash= window.location.hash=="" ? "#product/all" : window.location.hash;
	return urlHash.substring(1);
}

