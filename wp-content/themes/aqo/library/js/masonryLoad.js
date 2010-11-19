jQuery(document).ready(function() {

	var $allElm = jQuery('#grid div');	//get all elements  
	doMasonry(); //bind masonry to grid initially

	/************* quicksand code to be reused ******************/	
/*
	// Set the relative home url variable for the site (front page)
	var homeUrl = '/aquestionof';
	
	// Check if site is accessed correctly through the hashes (for index pages). If not, redirect to home and set hash route.	
	var isSiteHome = $('.home');
	if (isSiteHome.length != 0) {
	
		// Initialize splash screen by getting all items if no hash is set
		if (getRoute() == '') { setRoute('fetch-all'); } 
		else { doMasonry(); }
			
		// Bind to click handler on gridButtons to set new route hash
		$('a.gridButton').click(function(e) {		
			var route = $(this).attr('href');
			var currentRoute = getRoute();
			if (currentRoute == route) {
				doMasonry();
			} else {
				setRoute(route);
			}	
			e.preventDefault();
		});
		
		// Bind to route/url hash change
		$(window).hashchange( function(){		
			doMasonry();
		});		
		
	} else {
	
		// Bind to click handler on gridButtons to set new route hash
		$('a.gridButton').click(function(e) {	
			
			
			var route = $(this).attr('href');
			// Send to home URL with chosen hash route attached			
			var newLocation = 'http://' + window.location.host + homeUrl + '/#' + route;
			window.location.assign(newLocation);
			e.preventDefault();
		});
	
	}

*/

/************* masonry ******************/
	  			  		  		
	jQuery('.link a').click(function(){
		var id = this.id;
		//jQuery("#status").html("id: "+id+"<br>");
		//jQuery("#status").append("All: "+$allElm.size()+"<br>");  			
		 			
		//previous elements
		var $previousElm = jQuery('#grid div');  
		//jQuery("#status").append("Prev: "+$previousElm.size()+"<br>");
		
		//remove elements which are not chosen from previous 
		var $removeElm = $previousElm.not("."+id);  			
		//jQuery("#status").append("Remove: "+$removeElm.size()+"<br>");  			
		
		//previous elements which are to be kept
		var $keptElm = $previousElm.filter("."+id);
		//jQuery("#status").append("Kept: "+$keptElm.size()+"<br>");

		//get new elements
		var $newElm = $allElm.filter("."+id).not($keptElm);  			
		//jQuery("#status").append("new: "+$newElm.size()+"<br>");
				
		jQuery('#grid div').filter($removeElm).fadeOut().remove();
		jQuery('#grid').append($newElm);
		jQuery('#grid div').fadeIn("slow");  			
		doMasonry();
	});  		  		  		  		
});
  	
  	
function doMasonry(){  
	var route = getRoute();
	$.get( route, function(data) {
		jQuery('#grid').masonry({
		  columnWidth: 100, 
		  animate: true,
		  itemSelector: '.box', 
		  animationOptions: {
			    duration: 750,
			    easing : 'swing',
			    queue: false
		  }    		  
		});  
	});
}
 
//Call to set a new route hash value
 function setRoute(routeHash){
 	window.location.hash = routeHash;
 }

 // Returns the current hash value, i.e. current page to load
 function getRoute(){
 	var routeHash = window.location.hash;
 	return routeHash.substring(1);
 }

