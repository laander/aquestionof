$(function() {
	
	var $elm = $('<a></a>').attr('href', "fetch-all/");	
	$.makeAnimattion($elm)
	
	$('a.gridButton').click(function(e) {			
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
				return $(v).attr('data-id');
			}
		});
	});
}

$.urlParam = function(name){
	var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (!results) { return 0; }
	return results[1] || 0;
};