$(document).ready(function() {	
	/*** invoke on initial run ***/	
	$.makeAnimattion(getRoute());

	/**invoke hashchange on button click **/
	$('#grid-navigation a.gridButton').click(function(e) {	
		var hlink = $(this).attr("href"); //get clicked link
		var routePos = hlink.indexOf("route")+6; //find route param in hlink - NB: "route=" is 6 long
		var test = 1;	
		var route = hlink.substring(routePos);
		window.location.hash = route; //set hash
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

function getRoute(){
	/** determine last app state **/
	var urlHash= window.location.hash=="" ? "#product/all" : window.location.hash;
	urlHash = urlHash.substring(1); //remove # (hash) from beginning string
	return urlHash; 
}

