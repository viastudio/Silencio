<?php
/*
 * Custom Meta Box Functions
 */
include_once 'res/functions/wpalchemy/MetaBox.php';
include_once 'res/functions/wpalchemy/MediaAccess.php';
$wpalchemy_media_access = new WPAlchemy_MediaAccess();

// Custom Meta Box Specs
$custom_metabox = new WPAlchemy_MetaBox(array
(
    'id' => '_example_meta',
    'title' => 'Custom Options',
    'types' => array('silencio_example'),
    'context' => 'normal', // same as above, defaults to "normal"
    'priority' => 'high', // same as above, defaults to "high"
    'prefix' => 'silencio_',
    'template' => get_stylesheet_directory() . '/res/functions/wpalchemy/example-meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT
));