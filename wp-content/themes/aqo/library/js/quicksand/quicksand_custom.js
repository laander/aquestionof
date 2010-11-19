$(document).ready(function() {
	
	// Set the relative home url variable for the site (front page)
	var homeUrl = '/aquestionof';
	
	// Check if site is accessed correctly through the hashes (for index pages). If not, redirect to home and set hash route.	
	var isSiteHome = $('.home');
	if (isSiteHome.length != 0) {
	
		// Initialize splash screen by getting all items if no hash is set
		if (getRoute() == '') { setRoute('fetch-all'); } 
		else { goQuicksand(); }
			
		// Bind to click handler on gridButtons to set new route hash
		$('a.gridButton').click(function(e) {		
			var route = $(this).attr('href');
			var currentRoute = getRoute();
			if (currentRoute == route) {
				goQuicksand();
			} else {
				setRoute(route);
			}	
			e.preventDefault();
		});
		
		// Bind to route/url hash change
		$(window).hashchange( function(){		
			goQuicksand();
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
		
});
	
// Performs the quicksand goodyness
function goQuicksand() {
	var route = getRoute();
	$.get( route, function(data) {
		$('ul.grid').quicksand( $(data).find('li.grid-item'), { 
			adjustHeight: 'auto',
			duration: 1000	
		});
	});	
}	
	
// Call to set a new route hash value
function setRoute(routeHash){
	window.location.hash = routeHash;
}

// Returns the current hash value, i.e. current page to load
function getRoute(){
	var routeHash = window.location.hash;
	return routeHash.substring(1);
}
