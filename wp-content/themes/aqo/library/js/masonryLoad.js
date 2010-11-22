var base = $("base").attr("href");
$(document).ready(function() {
	$allElm = $('#grid div.box'); // set allElm variable
	$allElm.hide(); //hide prelimenary	
	
	//if the grid is present do masonry
	if($allElm.length != 0){		
		// Check if site is accessed correctly through the hashes (for index pages). If not, redirect to home and set hash route.
		if ($('body.home').length == 0) { 
			goToTopDir();
		// Initialize splash screen by getting all items - filter if hash is set
		}else if (getRoute() == '') {
			setRoute('all');
		} else {			
			prepareMasonry();
		}
		
		//change hash on click
		$('a.gridButton').click(function() {
			var category = $(this).attr("href");	
			category = category.replace(/\//g,"-");
			setRoute(category);
			return false;
		});			

		// do masonry on hash change
		$(window).hashchange(function() {
			prepareMasonry();
		});		
		
	//the grid is not present	
	}else{		
		//change hash on click
		$('a.gridButton').click(function() {
			var category = $(this).attr("href");
			category = category.replace(/\//g,"-");		
			var url = base + "#"+category;			
			setUrl(url);
			return false;
		});						
	}
});

function prepareMasonry() {
	$("#loader").fadeIn("fast");
	var category = getRoute();
	// $("#status").html("id: "+category+"<br>");
	// $("#status").append("All: "+$allElm.size()+"<br>");

	// previous elements
	var $previousElm = $('#grid div.box');
	// $("#status").append("Prev: "+$previousElm.size()+"<br>");

	if (category != "all") {
		// remove elements which are not chosen from previous
		var $removeElm = $previousElm.not("div.box." + category);
		// $("#status").append("Remove: "+$removeElm.size()+"<br>");

		// previous elements which are to be kept
		var $keptElm = $previousElm.filter("div.box." + category);
		// $("#status").append("Kept: "+$keptElm.size()+"<br>");

		// get new elements - select all elm that have the corresponding
		// category and deselect all that are already there (from previous)
		var $newElm = $allElm.filter("div.box." + category).not($keptElm);
		// $("#status").append("new: "+$newElm.size()+"<br>");

		// make changes: remove elements from previous view
		var counter = 0;
		var $elmToBeRemoved = $('#grid div.box').filter($removeElm);					
	// get all elements not in previous view
	}else{
		$elmToBeRemoved = $([]); //create empty jQuery object
		var $newElm = $allElm.not($previousElm);
	}	
		
	//check if there are any elements to remove
	if($elmToBeRemoved.size()>0){		
		$elmToBeRemoved.fadeOut("slow", function() {
			$(this).remove();

			counter++;
			// make changes!
			if ($elmToBeRemoved.length == counter) {
				$('#grid').append($newElm);				
				doMasonry($newElm);				
				$('#grid div.box').fadeIn("slow");
			}
		});		
	}else{		
		// make changes!
		$('#grid').append($newElm);		
		doMasonry($newElm);
		$('#grid div.box').fadeIn("slow");		
	}
}

//use hashes instead of static pages
function goToTopDir(){
	// get the full path
	var path = window.location.pathname;		
	var posOfSlash = path.length-1;
	
	//remove the very last character if it is a slash (/)
	if(path.charAt(posOfSlash)=="/"){ path = path.substr(0,posOfSlash);}
	
	//find the category
	var posOfCat = path.lastIndexOf('/category/');
	var category = path.substr(posOfCat+1);
	category = category.replace(/\//g,"-");	
	
	//make new path with hashes
	var pathHashed = path.substr(0, posOfCat+1)+"#"+category;		
	window.location.assign(pathHashed);		
}

//do masonry effect
function doMasonry() {	
	$('#grid').masonry({
		columnWidth : 40,
		animate : true,
		itemSelector : '.box',
		animationOptions : {
			duration : 750,
			easing : 'swing',
			queue : false
		}
	}, function(){
		$("#loader").fadeOut("fast");
	});	
	
	//if there are no boxes we wont get a callback above
	if($('#grid div.box').size()==0){
		$("#loader").fadeOut("fast");
	}
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

function setUrl(url) {
	window.location = url;
}