// JSHint ignores
/* global FastClick: true */

$(document).ready(function() {
	prepare_fitvid();
	prepare_menu($('body'), $('#main, #masthead, .menu-nav'), 'menu-active');
});

function prepare_fitvid() {
    $("#page").fitVids();
}

function prepare_menu(body, page, menu_active_class) {
	$('.menu-button').on('fastClick', function (e) {
	    e.preventDefault();
	    body.toggleClass('menu-active');

	    // if the menu is displayed, hook up an event to hide the menu when #page is tapped but not scrolled
	    if(body.hasClass('menu-active')) {
	        page.on('fastClick', function () {
	            body.toggleClass('menu-active');
	            page.off('fastClick'); // don't need to listen to this until the menu is opened
	        });
	    }
	    else {
	        page.off('fastClick'); // don't need to listen to this until the menu is opened
	    }
	});
}