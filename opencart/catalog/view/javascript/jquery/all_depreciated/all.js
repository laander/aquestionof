// Custom sorting plugin
(function($) {
	$.fn.sorted = function(customOptions) {
		var options = {
			reversed : false,
			by : function(a) {
				return a.text();
			}
		};
		$.extend(options, customOptions);
		$data = $(this);
		arr = $data.get();
		arr.sort(function(a, b) {
			var valA = options.by($(a));
			var valB = options.by($(b));
			if (options.reversed) {
				return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;
			} else {
				return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;
			}
		});
		return $(arr);
	};
})(jQuery);

// bind radiobuttons in the form
var $filterType = $('#filter div.type a');
var $filterSort = $('#filter div.sort a');

// DOMContentLoaded
$(document).ready(function() {
	
	// get the first collection
	var $applications = $('#applications');	
	
	// clone applications to get a second collection
	var $data = $applications.clone();		
			
	// call Quicksand on every category click 
	$filterType.add($filterSort).click(function(e) {
		var $elm = $(this);
		$sortedData = $.makeAnimation($elm, $data);
		
		// finally, call quicksand
		$applications.quicksand($sortedData, {
			duration : 800,
			easing : 'swing' // easeInOutQuad
		});					
		
		return false;
	});	
	
	/*** first load of page. Envoke quicksand to filter categories ***/
	var valueParam = $.urlParam('data-value');
	if(valueParam!=0){
		$elm = $('#filter div.type a[data-value="'+valueParam+'"]');
		$sortedData = $.makeAnimation($elm, $data);
		
		// finally, call quicksand
		$applications.quicksand($sortedData, {
			duration : 800,
			easing : 'swing'
		});			
	};		
});

$.makeAnimation = function($elm, $data){
	
	$elm.parent().children('a.selected').removeClass('selected');
	$elm.addClass('selected');		
		
	var chosenType = $filterType.filter('.selected').attr('data-value');
	var chosenSort = $filterSort.filter('.selected').attr('data-value');	

	if (chosenType == 'all') {
		var $filteredData = $data.find('li');
	} else {
		var $filteredData = $data.find('li[data-type='+ chosenType + ']');
	}	

	// if sorted by size
	if (chosenSort == "size") {
		var $sortedData = $filteredData.sorted({
			by : function(v) {
				return parseFloat($(v).find('span[data-type=size]')
						.text());
			}
		});
	} else {
		// if sorted by name
		var $sortedData = $filteredData.sorted({
			by : function(v) {
				return $(v).find('strong').text().toLowerCase();
			}
		});
	}	
	return $sortedData;	
};

$.urlParam = function(name){
	var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (!results) { return 0; }
	return results[1] || 0;
};