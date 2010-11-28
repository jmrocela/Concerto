jQuery(function($){
	$('#access .menu li').hover(function() {
		if ($(this).children('.children').length) {
			$(this).find('.children').slideDown(100);
			$(this).find('a:eq(0)').addClass('active');
		}
	}, function() {
		if ($(this).children('.children').length) {
			var storethis = this;
			$(this).find('.children').slideUp(100, function(){
				$(storethis).find('a:eq(0)').removeClass('active');
			});
		}
	});
});