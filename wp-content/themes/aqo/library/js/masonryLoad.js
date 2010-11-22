var $allElm = "";
$(document).ready(function() {
	$allElm = $('#grid div.box'); // set allElm variable

	// Check if site is accessed correctly through the hashes (for index pages).
	// If not, redirect to home and set hash route.
	var isSiteHome = $('body.home');
	if (isSiteHome.length != 0) {
		
		// Initialize splash screen by getting all items - filter if hash is set
		if (getRoute() == '') {
			setRoute('fetch-all');
		} else {			
			prepareMasonry();
		}

		jQuery('a.gridButton').click(function() {
			var category = $(this).attr("href");
			// supercategory: category/about => about -- subcategory: about/contact => about/contact		
			category = (category.substring(0, 9) == "category/") ? "cat_" + category.substr(9) : category.replace("/", "-");
			setRoute(category);
			return false;
		});

		// Bind to route/url hash change
		$(window).hashchange(function() {
			prepareMasonry();
		});
		
	//if the client is located in a subdirectory we want to redirect him to the same path but with hashes	
	} else {
		// Set the relative home url variable for the site (front page)
		var path = window.location.pathname;		
		var posOfSlash = path.length-1;
		//remove the very last character if it is a slash (/)
		if(path.charAt(posOfSlash)=="/"){ path = path.substr(0,posOfSlash);}
		
		//find the last directory
		posOfLastSlash = path.lastIndexOf('/');
		var lastDir = path.substr(posOfLastSlash+1);
		
		//make new path with hashes
		var pathHashed = path.substr(0, posOfLastSlash+1)+"#"+lastDir;		
		window.location.assign(pathHashed);
	}
});

function prepareMasonry() {
	var category = getRoute();
	// jQuery("#status").html("id: "+category+"<br>");
	// jQuery("#status").append("All: "+$allElm.size()+"<br>");

	// previous elements
	var $previousElm = jQuery('#grid div.box');
	// jQuery("#status").append("Prev: "+$previousElm.size()+"<br>");

	if (category != "fetch-all") {
		// remove elements which are not chosen from previous
		var $removeElm = $previousElm.not("div.box." + category);
		// jQuery("#status").append("Remove: "+$removeElm.size()+"<br>");

		// previous elements which are to be kept
		var $keptElm = $previousElm.filter("div.box." + category);
		// jQuery("#status").append("Kept: "+$keptElm.size()+"<br>");

		// get new elements - select all elm that have the corresponding
		// category and deselect all that are already there (from previous)
		var $newElm = $allElm.filter("div.box." + category).not($keptElm);
		// jQuery("#status").append("new: "+$newElm.size()+"<br>");

		// make changes: remove elements from previous view
		var counter = 0;
		var $elmToBeRemoved = jQuery('#grid div.box').filter($removeElm);
		$elmToBeRemoved.fadeOut("slow", function() {
			jQuery(this).remove();

			counter++;
			// make changes!
			if ($elmToBeRemoved.length == counter) {
				jQuery('#grid').append($newElm);
				jQuery('#grid div.box').fadeIn("slow");
				bindMasonry();
			}
		});
		
	// get all elements not in previous view
	} else {
		var $newElm = $allElm.not($previousElm);
		// make changes!
		jQuery('#grid').append($newElm);
		jQuery('#grid div.box').fadeIn("slow");
		bindMasonry();
	}
}

function bindMasonry() {
	jQuery('#grid').masonry({
		columnWidth : 40,
		animate : true,
		itemSelector : '.box',
		animationOptions : {
			duration : 750,
			easing : 'swing',
			queue : false
		}
	});
}

// Call to set a new route hash value
function setRoute(routeHash) {
	window.location.hash = routeHash;
}

// Returns the current hash value, i.e. current page to load
function getRoute() {
	var routeHash = window.location.hash;
	return routeHash.substring(1);
}
