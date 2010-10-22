$(function() {
	
	$('#grid-navigation a.gridButton').click(function(e) {			
		$.makeAnimattion(this);
		e.preventDefault();
	});
	
	if($.urlParam('path')!=0 && $.urlParam('route')=="product/all"){
		var test = this;
		var url = test.replace("product/all", "product/category");
		$.makeAnimattion(test);		
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