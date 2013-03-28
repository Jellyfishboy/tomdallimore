// General sitewide settings and stuff

$(document).ready(function () {
	// Remove img width and height from http://wpwizard.net/jquery/remove-img-height-and-width-with-jquery/	
    $('img').each(function(){
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    $('#twitter_div a').attr('target', '_blank');
    });
	function scrollNav(){
	var win=$(window);
	var scrolled=win.scrollTop();
	// if ($.browser.msie){
	// 	if (scrolled>250){
	// 		$('.secondary_nav').fadeIn();
	// 	} else {
	// 		$('.secondary_nav').fadeOut();
	// 	}
	// }
	// else{
		if (scrolled>140){
			$('.secondary_nav').removeClass('fadeOutUp').show().addClass('fadeInDown');
		} else {
			$('.secondary_nav').removeClass('fadeInDown').addClass('fadeOutUp').one('webkitAnimationEnd animationend', function(){
			});
		}
	// }
	
}
$(window).scroll(function(){
	scrollNav();
});
});
