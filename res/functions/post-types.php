<?php
function via_register_post_types() {
    register_post_type( 'via_slider',
        array(
            'labels' => array(
                'name' => __( 'Sliders', 'via' ),
                'singular_name' => __( 'Slider', 'via' ),
                'add_new' => _x( 'Add New Slider', 'via', 'via' ),
                'edit_item' => __( 'Edit Slider', 'via' ),
                'new_item' => __( 'New Slider', 'via' ),
                'view_item' => __( 'View Slider', 'via' ),
                'search_items' => __( 'Search Sliders', 'via' ),
                'not_found' => __( 'No Sliders found', 'via' ),
                'not_found_in_trash' => __( 'No Sliders found in Trash', 'via' )
            ),
            'public' => true,
            'supports' => array('title', 'thumbnail', 'page-attributes'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'sliders')
        )
    );
}

// add_action( 'init', 'via_register_post_types' );