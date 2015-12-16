<?php
function silencio_register_post_types() {
    $singular = 'Slider';
    $plural = 'Sliders';
    $slug = 'slider';

    register_post_type(
        'sil_' . $slug,
        array(
            'labels' => array(
                'name' => __($plural, 'silencio'),
                'singular_name' => __($singular, 'silencio'),
                'add_new' => _x('Add New ' . $singular, 'silencio', 'silencio'),
                'edit_item' => __('Edit ' . $singular, 'silencio'),
                'new_item' => __('New ' . $singular, 'silencio'),
                'view_item' => __('View ' . $singular, 'silencio'),
                'search_items' => __('Search ' . $plural, 'silencio'),
                'not_found' => __('No ' . $plural . ' found', 'silencio'),
                'not_found_in_trash' => __('No ' . $plural . ' found in Trash', 'silencio')
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'author', 'excerpt', 'revisions', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug' => $slug)
        )
    );
}
add_action('init', 'silencio_register_post_types');
