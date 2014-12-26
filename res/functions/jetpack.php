<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Silencio
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function silencio_jetpack_setup() {
    add_theme_support(
        'infinite-scroll',
        array(
            'container' => 'main',
            'footer' => 'page'
        )
    );
}
// add_action('after_setup_theme', 'silencio_jetpack_setup');

/**
 * Disables auto-activation of Jetpack modules
 * See: http://jetpack.me/2013/10/07/do-not-automatically-activate-a-jetpack-module/
 */
add_filter('jetpack_get_default_modules', '__return_empty_array');
