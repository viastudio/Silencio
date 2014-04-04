<?php
function silencio_register_post_types() {
    $singular = 'Slider';
    $plural = 'Sliders';
    $slug = 'slider';

    register_post_type( 'silencio_' . $slug,
        array(
            'labels' => array(
                'name' => __( $plural, 'via' ),
                'singular_name' => __( $singular, 'via' ),
                'add_new' => _x( 'Add New ' . $singular, 'via', 'via' ),
                'edit_item' => __( 'Edit ' . $singular, 'via' ),
                'new_item' => __( 'New ' . $singular, 'via' ),
                'view_item' => __( 'View ' . $singular, 'via' ),
                'search_items' => __( 'Search ' . $plural, 'via' ),
                'not_found' => __( 'No ' . $plural .' found', 'via' ),
                'not_found_in_trash' => __( 'No ' . $plural . ' found in Trash', 'via' )
            ),
            'public' => true,
            'supports' => array('title', 'thumbnail', 'page-attributes'),
            'has_archive' => true,
            'rewrite' => array('slug' => $slug)
        )
    );
}
add_action( 'init', 'silencio_register_post_types' );