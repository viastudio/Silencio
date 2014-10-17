<?php
/*
 * Custom Meta Box Functions
 */
include_once 'wpalchemy/MetaBox.php';
include_once 'wpalchemy/MediaAccess.php';

if (is_admin()) {
    add_action('admin_enqueue_scripts', 'metabox_style');
}

function metabox_style() {
    wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/res/functions/wpalchemy/meta.css');
}


// Custom Meta Box Specs - Uncomment to activate the example.
/*$custom_metabox = new WPAlchemy_MetaBox(array(
    'id' => '_example_meta',
    'title' => 'Custom Options',
    'context' => 'normal', // same as above, defaults to "normal"
    'priority' => 'high', // same as above, defaults to "high"
    'prefix' => 'silencio_',
    'template' => get_stylesheet_directory() . '/res/functions/wpalchemy/example-meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT
));*/
