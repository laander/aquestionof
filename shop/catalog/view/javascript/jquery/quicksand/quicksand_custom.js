$(function() {
	
	$('#grid-navigation a.gridButton').click(function(e) {			
		$.makeAnimattion(this);
		e.preventDefault();
	});
	
	if($.urlParam('path')!=0 && $.urlParam('route')=="product/all"){
		var url = this["URL"];
		var url = url.replace("product/all", "product/category");
		var $elm = $('<a></a>').attr('href', url);
		$.makeAnimattion($elm);		
	}	
});

$.makeAnimattion = function(elm){
	$.get($(elm).attr('href'), function(data) {			
		$('.grid').quicksand($(data).find('li'), {
			adjustHeight : 'dynamic',
			attribute : function(v) {
				return $(v).find('img').attr('src');
			}
		});
	});
}

$.urlParam = function(name){
	var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (!results) { return 0; }
	return results[1] || 0;
};