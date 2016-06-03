<?php
/*
 * Custom Shortcodes
 * Creates shortcodes for column layouts.
 * Tutorial and sample here: http://tutorials.mysitemyway.com/adding-column-layout-shortcodes-to-a-wordpress-theme/
 */

function silencio_row($atts, $content = null) {
    return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'silencio_row');

function silencio_col1($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-1' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col1', 'silencio_col1');

function silencio_col2($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-2' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col2', 'silencio_col2');

function silencio_col3($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-3' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col3', 'silencio_col3');

function silencio_col4($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-4' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col4', 'silencio_col4');

function silencio_col5($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-5' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col5', 'silencio_col5');

function silencio_col6($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-6' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col6', 'silencio_col6');

function silencio_col7($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-7' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col7', 'silencio_col7');

function silencio_col8($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-8' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col8', 'silencio_col8');

function silencio_col9($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-9' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col9', 'silencio_col9');

function silencio_col10($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-10' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col10', 'silencio_col10');

function silencio_col11($atts, $content = null) {
    $a = shortcode_atts(array('offset' => ''), $atts);
    $offset = $a['offset'] ? ' col-md-offset-' . esc_attr($a['offset']) : '';
    return '<div class="col-md-11' . $offset . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col11', 'silencio_col11');

function silencio_col12($atts, $content = null) {
    return '<div class="col-md-12">' . do_shortcode($content) . '</div>';
}
add_shortcode('col12', 'silencio_col12');

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
