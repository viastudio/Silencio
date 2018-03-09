<?php
/*
 * Custom Shortcodes
 * Creates shortcodes for column layouts.
 * Tutorial and sample here: http://tutorials.mysitemyway.com/adding-column-layout-shortcodes-to-a-wordpress-theme/
 */

function silencio_row($atts, $content = null) {
    return '<div class="columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'silencio_row');

function silencio_column($atts, $content = null) {
    return '<div class="column">' . do_shortcode($content) . '</div>';
}
add_shortcode('column', 'silencio_column');

function silencio_column_third($atts, $content = null) {
    return '<div class="column is-one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('column-33', 'silencio_column_third');

function silencio_column_half($atts, $content = null) {
    return '<div class="column is-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('column-50', 'silencio_column_half');

function silencio_column_two_thirds($atts, $content = null) {
    return '<div class="column is-two-thirds">' . do_shortcode($content) . '</div>';
}
add_shortcode('column-66', 'silencio_column_two_thirds');

function silencio_column_quarter($atts, $content = null) {
    return '<div class="column is-one-quarter">' . do_shortcode($content) . '</div>';
}
add_shortcode('column-25', 'silencio_column_quarter');

function silencio_column_three_quarters($atts, $content = null) {
    return '<div class="column is-three-quarters">' . do_shortcode($content) . '</div>';
}
add_shortcode('column-75', 'silencio_column_three_quarters');


function silencio_table($atts, $content = null) {
    return '<table class="table">' . do_shortcode($content) . '</table>';
}
add_shortcode('table', 'silencio_table');

function silencio_table_head($atts, $content = null) {
    return '<thead>' . do_shortcode($content) . '</thead>';
}
add_shortcode('table_head', 'silencio_table_head');

function silencio_table_body($atts, $content = null) {
    return '<tbody>' . do_shortcode($content) . '</tbody>';
}
add_shortcode('table_body', 'silencio_table_body');

function silencio_tr($atts, $content = null) {
    return '<tr>' . do_shortcode($content) . '</tr>';
}
add_shortcode('tr', 'silencio_tr');
function silencio_th($atts, $content = null) {
    return '<th>' . do_shortcode($content) . '</th>';
}
add_shortcode('th', 'silencio_th');
function silencio_td($atts, $content = null) {
    return '<td>' . do_shortcode($content) . '</td>';
}
add_shortcode('td', 'silencio_td');


/**
* Clean up extra p & br tags around shortcodes post-wpautop
* Adapted from: https://github.com/MWDelaney/bootstrap-3-shortcodes/blob/master/includes/actions-filters.php#L42
* @param $content string WordPress content
*/
function silencio_clean_shortcodes($content) {
    return strtr(
        $content,
        array(
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']',
            ']<br>' => ']'
        )
    );
}
add_filter('the_content', 'silencio_clean_shortcodes');

// end shortcodes
