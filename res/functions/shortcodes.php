<?php
/*
 * Custom Shortcodes
 * Creates shortcodes for column layouts.
 * Tutorial and sample here: http://tutorials.mysitemyway.com/adding-column-layout-shortcodes-to-a-wordpress-theme/
 */

function via_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'via_row');

function via_col1( $atts, $content = null ) {
   return '<div class="col-md-1">' . do_shortcode($content) . '</div>';
}
add_shortcode('span1', 'via_col1');

function via_col2( $atts, $content = null ) {
   return '<div class="col-md-2">' . do_shortcode($content) . '</div>';
}
add_shortcode('span2', 'via_col2');

function via_col3( $atts, $content = null ) {
   return '<div class="col-md-3">' . do_shortcode($content) . '</div>';
}
add_shortcode('span3', 'via_col3');

function via_col4( $atts, $content = null ) {
   return '<div class="col-md-4">' . do_shortcode($content) . '</div>';
}
add_shortcode('span4', 'via_col4');

function via_col5( $atts, $content = null ) {
   return '<div class="col-md-5">' . do_shortcode($content) . '</div>';
}
add_shortcode('span5', 'via_col5');

function via_col6( $atts, $content = null ) {
   return '<div class="col-md-6">' . do_shortcode($content) . '</div>';
}
add_shortcode('span6', 'via_col6');

function via_col7( $atts, $content = null ) {
   return '<div class="col-md-7">' . do_shortcode($content) . '</div>';
}
add_shortcode('span7', 'via_col7');

function via_col8( $atts, $content = null ) {
   return '<div class="col-md-8">' . do_shortcode($content) . '</div>';
}
add_shortcode('span8', 'via_col8');

function via_col9( $atts, $content = null ) {
   return '<div class="col-md-9">' . do_shortcode($content) . '</div>';
}
add_shortcode('span9', 'via_col9');

function via_col10( $atts, $content = null ) {
   return '<div class="col-md-10">' . do_shortcode($content) . '</div>';
}
add_shortcode('span10', 'via_col10');

function via_col11( $atts, $content = null ) {
   return '<div class="col-md-11">' . do_shortcode($content) . '</div>';
}
add_shortcode('span11', 'via_col11');

function via_col12( $atts, $content = null ) {
   return '<div class="col-md-12">' . do_shortcode($content) . '</div>';
}
add_shortcode('span12', 'via_col12');

/*
 * Custom Shortcodes Part 2
 * Disabling Wordpress wpautop and wptexturize filters.
 */


function via_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'via_formatter', 99);
add_filter('widget_text', 'via_formatter', 99);


//Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553
//@ini_set('pcre.backtrack_limit', 500000);

// end shortcodes
?>