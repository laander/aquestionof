// SETTINGS
var base = $("base").attr("href"); // Base site url from WP html head
var gridContainer = "#grid";
var gridElement = "div.box";
var gridElementSpecific = gridContainer + " " + gridElement;
var menuGridButton = "a.gridButton";
var loadingIcon = "#loader";
var gridColumnWidth = 40;

// SCRIPT
$(document).ready(function() { // To be run when DOM is loaded

	$allElm = $(gridElementSpecific); // Get all elements from DOM and set allElm variable
	$allElm.hide(); // Hide html elements prelimenary 
	
	// If the grid is present (#grid has elements), do masonry
	if ($allElm.length != 0) {
	
		// Check if site is accessed correctly through the hashes (for index pages). If not, redirect to home and set hash route.
		if ($('body.home').length == 0) { 
			var newUrl = hashizeUrl(window.location.href);
			setUrl(newUrl);
			
		// If no hash is set, initialize splash screen with all items
		} else if (getHash() == '') {
			setHash('all');
		
		// Page is ready for masonry
		} else {			
			prepareMasonry();
		}
		
		// Change hash on click
		$('a.gridButton').click(function() {
			var category = $(this).attr("href");	
			category = category.replace(/\//g,"-");
			setHash(category);
			return false;
		});			

		// Watch for hash change and do masonry when changed
		$(window).hashchange(function() {
			prepareMasonry();
		});		
		
	// The grid is not present, wait for clicks
	} else {
			
		// Change hash on click
		$('a.gridButton').click(function() {
			var category = $(this).attr("href");
			category = category.replace(/\//g,"-");		
			var url = base + "#" + category;			
			setUrl(url);
			return false;
		});						
	}
});

// Performs pre-masonry actions before the effect is run by adding/removing necessary elements
function prepareMasonry() {
	$(loadingIcon).fadeIn("fast"); // Show the loading icon

	var category = getHash();
	// $("#status").html("id: "+category+"<br>");
	// $("#status").append("All: "+$allElm.size()+"<br>");

	// previous elements
	var $previousElm = $(gridElementSpecific);
	// $("#status").append("Prev: "+$previousElm.size()+"<br>");
	
	// If hash is set to show all
	if (category == "all") {
		$elmToBeRemoved = $([]); //create empty jQuery object
		var $newElm = $allElm.not($previousElm);
	
	// If hash is set to show categories
	} else {	
		// remove elements which are not chosen from previous
		var $removeElm = $previousElm.not(gridElement + "." + category);
		// $("#status").append("Remove: "+$removeElm.size()+"<br>");

		// previous elements which are to be kept
		var $keptElm = $previousElm.filter(gridElement + "." + category);
		// $("#status").append("Kept: "+$keptElm.size()+"<br>");

		// get new elements - select all elm that have the corresponding
		// category and deselect all that are already there (from previous)
		var $newElm = $allElm.filter(gridElement + "." + category).not($keptElm);
		// $("#status").append("new: "+$newElm.size()+"<br>");

		// make changes: remove elements from previous view
		var counter = 0;
		var $elmToBeRemoved = $(gridElementSpecific).filter($removeElm);					
	}	
		
	// Check if there are any elements to remove
	if($elmToBeRemoved.size() > 0){		
		$elmToBeRemoved.fadeOut("slow", function() {
			$(this).remove();
			counter++;
			// Append new items and do masonry
			if ($elmToBeRemoved.length == counter) {
				$(gridContainer).append($newElm);				
				doMasonry($newElm);				
				$(gridElementSpecific).fadeIn("slow");
			}
		});
		
	// No elements to remove (e.g. going from subcat to topcat)
	} else {
		// Append new items and do masonry	
		$(gridContainer).append($newElm);		
		doMasonry($newElm);
		$(gridElementSpecific).fadeIn("slow");		
	}
}

// Do masonry effect
function doMasonry() {	
	$(gridContainer).masonry({
		columnWidth : gridColumnWidth,
		animate : true,
		itemSelector : gridElement,
		animationOptions : {
			duration : 750,
			easing : 'swing',
			queue : false
		}
	}, function(){
		$(loadingIcon).fadeOut("fast");
	});	
	
	//if there are no boxes we wont get a callback above
	if($(gridElementSpecific).size()==0){
		$(loadingIcon).fadeOut("fast");
	}
}

// Call to set a new route hash value
function setHash(routeHash) {
	window.location.hash = routeHash;
}

// Returns the current hash value, i.e. current page to load
function getHash() {
	var routeHash = window.location.hash;
	return routeHash.substring(1);
}

// Set the location to a specified full url
function setUrl(url) {
	window.location = url;
}

// Gets a direct long url (typically to a cat or subcat) and hashize it from the base url
// e.g. http://aquestionof.net/category/media/campaigns > http://aquestionof.net/#category-media-campaigns
function hashizeUrl(url) {
	
	var currentUrl = url.replace(/\/$/,""); // Replaces the trailing slash if exists so it doesnt cause trouble when hashing
	var category = currentUrl.replace(base,"").replace(/\//g,"-"); // Make url relative and turn slashes to dashes			
	var url = base + "#" + category; // Create new url with hash

	return url;
}