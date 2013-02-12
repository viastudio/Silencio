$(document).ready(function() {
	prepare_image_slider();
	prepare_fitvid();
	prepare_menu();
});

function prepare_image_slider() {
	var sliders = $('.flexslider');
	
	if (sliders.length < 1) {
		return false;
	}
	
	sliders.flexslider({
		controlNav: true,
		directionNav: false
	});
}

function prepare_fitvid() {
    $("#page").fitVids();
}

function prepare_menu() {
  
  $('body').addClass('js');
  
  var $menu = $('#access'),
    $menulink = $('.menu-button'),
    $wrap = $('#page');
  
  $menulink.click(function() {
    $menulink.toggleClass('active');
    $wrap.toggleClass('active');
    return false;
  });
}