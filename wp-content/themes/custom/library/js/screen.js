jQuery.noConflict();
(function($) {

	// Base site url from WP html head
	var base = $("base").attr("href");
	
	// To be run when DOM is loaded. Initializes all effects and behaviours
	$(document).ready(function() {
			
		// Apply cufon custom font and get cart from OC
		applyCufon();	
		//outputCartFromOC();
		
		// Initiate the masonry grid effect (see masonry-grid.js)
		initMasonryEffect();
		
		// Fancy pancy springloaded menu effects	
		primaryMenuEvents();
		
		nivoProductImages();
		
		masterbarLinkHoverEvent();
		
		addToCartEvent();
		
		emailFormFocusClear();
	
	});
	
	function emailFormFocusClear() {
		$('form#mc-embedded-subscribe-form input[type="text"]').focus(function() {
			if($(this).val() == 'Fill in e-mail') {
				$(this).val('');
			}
		});
	}
	
	
	/**
	 * When item is added to cart, it will show shopping bag with incremented count and bounce links
	 */
	function addToCartEvent() {
		$("form.product_form").submit(function() {
			
			$(".masterbar-goshop").hide();
			$(".masterbar-shoppingbag").show();
			
			var bagCount = parseInt($(".masterbar-shoppingbag span").html());
			if(isNaN(bagCount)) { bagCount == 0; }
			
			$(".masterbar-shoppingbag span").html(bagCount + 1);
			bounceEffect('.masterbar-shoppingbag');
						
			$('.wpsc_buy_button_container input').val('Added to Shopping Bag!');
			bounceEffect('.wpsc_buy_button_container input');			
		});
	}
	
	/**
	 * Makes the masterbar links bounce when hovered
	 */
	function masterbarLinkHoverEvent() {
		$("#masterbar a").hover(
			function () {
				bounceEffect(this);			
			}, function () {}
		);
	}
	
	/**
	 * Run a bounce effect on the supplied element
	 */
	function bounceEffect(element) {
    	if ( !$(element).is(':animated') ) { 		  	
	        $(element).css('position','relative');
	        $(element).animate({'top': '-=3px'}, 50, function(){
	            $(element).animate({'top': '+=6px'}, 100, function(){
	                $(element).animate({'top': '-=6px'}, 100, function(){
	                    $(element).animate({'top': '+=6px'}, 100, function(){
	                        $(element).animate({'top': '-=3px'}, 50);
	                    });
	                });
	            });
	        });
		}	
	}
	
	/**
	 * Make WPEC product pages feature a image gallery based on Nivo jQuery plugin
	 */
	function nivoProductImages() {
		$(window).load(function() {
			var total = $('#nivo_product_images img').length;
			var rand = Math.floor(Math.random()*total);
			$('#nivo_product_images').nivoSlider({
				effect: 'fade', //Specify sets like: 'fold,fade,sliceDown'
				animSpeed: 600, //Slide transition speed
				pauseTime: 6000,
				directionNav: true, //Next and Prev
				controlNav: false, //1,2,3...
				pauseOnHover: false, //Stop animation while hovering
				captionOpacity: 0, //Universal caption opacity
				startSlide: 0, //Set starting Slide (0 index)
				directionNavHide: false,
				keyboardNav: true,
				manualAdvance: false,
	    	    prevText: '<', // Prev directionNav text
    	    	nextText: '>', // Next directionNav text
			});
		});	
	}
	
	
	/**
	 * Bind the primary menu effects to events
	 */
	function primaryMenuEvents() {
		
		// Only run on masonry-enabled grid pages
		if ($('#grid').length != 0) {
			$("#primary-menu > li.menu-item-type-taxonomy > a, #site-title a").click(function() {
				primaryMenuEffect(this);
			});	
		}		
	
	}
	
	/**
	 * Run the primary menu effect on the supplied item
	 */
	function primaryMenuEffect(activateMenuItem) {
	
		// Only run if the clicked menu item is not already the current one
		if ($(activateMenuItem).next("ul.sub-menu.current").length == 0) {
			
			// Collapse the previous current
			$("ul.sub-menu.current").removeClass("current").animate(
				{width: "1", opacity: 0}, 
				{queue: false, duration: 1000, complete: function() {
					$(this).removeAttr('style')
				}
			});
			
			// Expand the new current (that is clicked)
			$current = $(activateMenuItem).next("ul.sub-menu");
			$current.addClass("current").animate({width: "show", opacity: 1}, {queue: false, duration: 1000});
		}	
	
	}
			
	/**
	 * Will apply custom font with cufon for supplied texts
	 */
	function applyCufon() {
	    if(!$.fontAvailable('DIN')) {
			Cufon.replace('#primary-menu li a');
			Cufon.replace('#masterbar-menu li a');
			Cufon.replace('.master-shoppingbag a');
			Cufon.replace('.entry-content h1');
			Cufon.replace('.entry-content .related-post-title');
			Cufon.replace('.wpsc_buy_button');
	    }
	}
	
	/**
	 * ------------------------------------------------------
	 * Masonry Grid Effect
	 * ------------------------------------------------------	 
	 */
	 
	// Global settings
	var gridContainer = "#grid";
	var gridElement = "div.box";
	var gridElementSpecific = gridContainer + " " + gridElement;
	var menuGridButton = "a.gridButton";
	var loadingIcon = "#loader";
	var gridColumnWidth = 40;
	var elmBusy = false;
	
	// To be run first!!! Will initiate the effect and keep track of changes etc.
	function initMasonryEffect() {
	
		$allElm = $(gridElementSpecific); // Get all elements from DOM and set allElm variable
		$allElm.hide(); // Hide html elements prelimenary 
		$allElm.css('position', 'absolute'); // Positions elements absolutely
		
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
			$('li.menu-item-type-taxonomy > a').click(function() {
				var category = hashizeUrl($(this).attr("href"), true);
//				category = category.replace(/\//g,"-");
				setHash(category);

				// Alert Google Analytics that new page has been called
//				var hash = location.hash;
//				if (hash && hash.charAt(0) != '#') hash = '#' + hash;
//				pageTracker._trackPageview(location.pathname + location.search + escape(hash));				

				return false;
			});			
	
			// Watch for hash change and do masonry when changed
			$(window).hashchange(function() {
				prepareMasonry();
			});		
			
		// The grid is not present, wait for clicks
		} else {
				
			// Change hash on click
			$('li.menu-item-type-taxonomy > a').click(function() {
				var category = hashizeUrl($(this).attr("href"), true);
//				category = category.replace(/\//g,"-");		
				var url = base + "#" + category;			
				setUrl(url);
				return false;
			});						
		}
	
	}
	
	// Performs pre-masonry actions before the effect is run by adding/removing necessary elements
	function prepareMasonry() {
		$(loadingIcon).fadeIn("fast"); // Show the loading icon
		elmBusy = true;
	
		// Get the current category and attempt to find the link in primary-menu that it should correspondingly open
		var category = getHash();
		var searchUrl = antiHashizeUrl(category, false, true);
		var possibleMenuItem = '#primary-menu li a[href="' + searchUrl + '"]';
		if($(possibleMenuItem).length != 0) {
			primaryMenuEffect(possibleMenuItem);	
		}
	
		// previous elements
		var $previousElm = $(gridElementSpecific);
		
		// If hash is set to show all
		if (category == "all") {
			var $elmToBeRemoved = $([]); //create empty jQuery object
			var $newElm = $allElm.not($previousElm);
		
		// If hash is set to show categories
		} else {	
			// remove elements which are not chosen from previous
			var $matchedElm = $(gridElement + "." + category);
			var $removeElm = $previousElm.not($matchedElm);
	
			// previous elements which are to be kept
			var $keptElm = $previousElm.filter($matchedElm);
	
			// get new elements - select all elm that have the corresponding
			// category and deselect all that are already there (from previous)
			var $newElm = $allElm.filter(gridElement + "." + category).not($keptElm);
			var $elmToBeRemoved = $previousElm.filter($removeElm);	
		}	
			
		// Check if there are any elements to remove
		if($elmToBeRemoved.size() > 0){		
			var counterRemoved = 0;				
			$elmToBeRemoved.fadeOut("slow", function() {
				$(this).remove();
				counterRemoved++;
				// Append new items and do masonry
				if ($elmToBeRemoved.length == counterRemoved) {
					$(gridContainer).prepend($newElm);				
					doMasonry($newElm);								
					fadeInElm($(gridElementSpecific));
				}
			});
			
		// No elements to remove (e.g. going from subcat to topcat)
		} else {
			// Append new items and do masonry	
			$(gridContainer).prepend($newElm);		
			doMasonry($newElm);
			fadeInElm($(gridElementSpecific));	
		}
	}
	
	// Fades in elements and removes the loader icon when done
	function fadeInElm($elm){
		var counterElm = 0;
		$elm.fadeIn("slow", function() {
			counterElm++;		
			if ($elm.length == counterElm) {
				$(loadingIcon).fadeOut("fast");
				elmBusy = false;
			}			
		});
	}
	
	// Do masonry effect
	function doMasonry() {	
		$(gridContainer).masonry({
			columnWidth : gridColumnWidth,
			animate : true,
			itemSelector : gridElement,
			resizeable: true,
			animationOptions : {
				duration : 750,
				easing : 'swing',
				queue : true
			}
		});	
		
		//if there are no boxes we wont get a callback above
		if($(gridElementSpecific).size()==0){
			$(loadingIcon).fadeOut("fast");
		}		
	}
	
	// Call to set a new route hash value
	function setHash(routeHash) {
		window.location.hash = routeHash; }
	// Returns the current hash value, i.e. current page to load
	function getHash() {
		var routeHash = window.location.hash;
		return routeHash.substring(1); }
	// Set the location to a specified full url
	function setUrl(url) {
		window.location = url; }
	
	// Gets a direct long url (typically to a cat or subcat) and hashize it from the base url
	// e.g. http://aquestionof.net/category/media/campaigns > http://aquestionof.net/#category-media-campaigns
	function hashizeUrl(url, relative) {
		if(!relative) { var relative = false }
		
		var currentUrl = url.replace(/\/$/,""); // Replaces the trailing slash if exists so it doesnt cause trouble when hashing
		var category = currentUrl.replace(base,"").replace(/\//g,"-"); // Make url relative and turn slashes to dashes			

		if (!relative) {
			return base + "#" + category; // Create new url with hash
		} else {
			return category; // Create new url with hash
		}
	}
	
	// If supplied by a hashed url (from hashizeUrl), it will attempt to convert it back to its static counterpart
	function antiHashizeUrl(url, relative, trailingslash) {
		if(!relative) { var relative = false }
		
		var currentUrl = url.replace(/\/$/,""); // Replaces the trailing slash if exists so it doesnt cause trouble when hashing
		
		if (trailingslash) {
			currentUrl = url + "/";
		}
		
		var category = currentUrl.replace(base,"").replace(/-/g,"/").replace(/#/g,""); // Make url relative and turn slashes to dashes			

		if (!relative) {
			return base + category; // Create new url with hash
		} else {
			return category; // Create new url with hash
		}
	}


})(jQuery)