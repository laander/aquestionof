var $allElm = "";
$(document).ready(function() {	
	$allElm = $('#grid div.box'); //set allElm variable
	
	/************* quicksand code to be reused ******************/	
	// Check if site is accessed correctly through the hashes (for index pages). If not, redirect to home and set hash route.	
	var isSiteHome = $('body.home');
	if (isSiteHome.length != 0) {		
		// Initialize splash screen by getting all items if no hash is set
		if (getRoute() == '') {			
			setRoute('fetch-all'); 
		}else {
			prepareMasonry();
		}		
				
		jQuery('a.gridButton').click(function(){
			alert("masonry!");
			var category = $(this).attr("href");
			
			//category - form: category/about
			if(category.substring(0,9)=="category/"){ 
				category = "cat_"+category.substr(9);
			//subcategory - form: about/contact
			}else{
				category = category.replace("/", "-");			
			}
			
			var currentRoute = getRoute();
			if (currentRoute == category) {
				prepareMasonry();
			} else {
				setRoute(category);
			}					
			return false;
		});  		
			
		
		// Bind to route/url hash change
		$(window).hashchange( function(){		
			prepareMasonry();
		});				
	} else {
		// Set the relative home url variable for the site (front page)
		var homeUrl = '/aquestionof';
	
		/*
		// Bind to click handler on gridButtons to set new route hash
		$('a.gridButton').click(function(e) {	
			var route = $(this).attr('href');
			// Send to home URL with chosen hash route attached			
			var newLocation = 'http://' + window.location.host + homeUrl + '/#' + route;
			window.location.assign(newLocation);
			e.preventDefault();
		});	
		*/
	}
		  		  		  		
});
  	  	
function prepareMasonry(){  
	var category = getRoute();	
	//jQuery("#status").html("id: "+category+"<br>");
	//jQuery("#status").append("All: "+$allElm.size()+"<br>");
	
	alert("prepare "+category);
	 			
	//previous elements
	var $previousElm = jQuery('#grid div.box');  
	//jQuery("#status").append("Prev: "+$previousElm.size()+"<br>");
	
	
	if(category!="fetch-all"){
		//remove elements which are not chosen from previous 
		var $removeElm = $previousElm.not("div.box."+category);  			
		//jQuery("#status").append("Remove: "+$removeElm.size()+"<br>");  			
		
		//previous elements which are to be kept
		var $keptElm = $previousElm.filter("div.box."+category);
		//jQuery("#status").append("Kept: "+$keptElm.size()+"<br>");
		
		//get new elements - select all elm that have the corresponding category and deselect all that are already there (from previous)
		var $newElm = $allElm.filter("div.box."+category).not($keptElm);  			
		//jQuery("#status").append("new: "+$newElm.size()+"<br>");	
		
		//make changes: remove elements from previous view 
		jQuery('#grid div.box').filter($removeElm).fadeOut().remove();
	}else{
		//get all elements not in previous view
		var $newElm = $allElm.not($previousElm);
		//jQuery("#status").append("new: "+$newElm.size()+"<br>");
	}
	
	//make changes!
	jQuery('#grid').append($newElm);
	jQuery('#grid div.box').fadeIn("slow");
	bindMasonry();
}

function bindMasonry(){	

	jQuery('#grid').masonry({
		  columnWidth: 40, 
		  animate: true,
		  itemSelector: '.box', 
		  animationOptions: {
			    duration: 750,
			    easing : 'swing',
			    queue: false
		  }    		  
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

