<?php
// Sets the post excerpt length to 40 words
function via_excerpt_length($length) {
    return 40;
}

add_filter('excerpt_length', 'via_excerpt_length');

// Continue Reading" link for excerpts
function via_continue_reading_link() {
    return ' <a href="' . esc_url(get_permalink()) . '" class="continue-reading">' . __('Continue reading <span class="meta-nav">&rarr;</span>', 'via') . '</a>';
}

// Replaces "[…]"
function via_auto_excerpt_more($more) {
    return ' &hellip;' . via_continue_reading_link();
}

add_filter('excerpt_more', 'via_auto_excerpt_more');

// Adds a pretty "Continue Reading" link to custom post excerpts.
function via_custom_excerpt_more($output) {
    if (has_excerpt() && ! is_attachment()) {
        $output .= via_continue_reading_link();
    }
    return $output;
}

add_filter('get_the_excerpt', 'via_custom_excerpt_more');
