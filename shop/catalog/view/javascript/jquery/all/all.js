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

// DOMContentLoaded
$(function() {
	// bind radiobuttons in the form
	var $filterType = $('#filter div.type a');
	var $filterSort = $('#filter div.sort a');

	// get the first collection
	var $applications = $('#applications');

	// clone applications to get a second collection
	var $data = $applications.clone();	
	
	// attempt to call Quicksand on every form change
	$filterType.add($filterSort).click(function(e) {
		$(this).parent().children('a.selected').removeClass('selected');
		$(this).addClass('selected');		
		
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

		// finally, call quicksand
		$applications.quicksand($sortedData, {
			duration : 800,
			easing : 'swing' // easeInOutQuad
		});
		return false;
	});
});
