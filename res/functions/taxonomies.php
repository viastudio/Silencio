<?php
function silencio_register_taxonomies() {
    $singular = 'Color';
    $plural = 'Colors';
    $slug = 'color';

    $labels = array(
        'name' => _x( $plural, 'Taxonomy plural name', 'via' ),
        'singular_name' => __( $singular, 'via' ),
        'search_items' => __( 'Search ' . $plural, 'via' ),
        'popular_items' => __( 'Popular ' . $plural, 'via' ),
        'all_items' => __( 'All ' . $plural, 'via' ),
        'parent_item' => __( 'Parent ' . $singular, 'via' ),
        'parent_item_colon' => __( 'Parent ' . $singular, 'via' ),
        'edit_item' => __( 'Edit ' . $singular, 'via' ),
        'update_item' => __( 'Update ' . $singular, 'via' ),
        'add_new_item' => __( 'Add New ' . $singular, 'via' ),
        'new_item_name' => __( 'New ' . $singular, 'via' ),
        'add_or_remove_items' => __( 'Add or remove ' . $plural, 'via' ),
        'choose_from_most_used' => __( 'Choose from most used ' . $plural, 'via' ),
        'menu_name' => __( $plural, 'via' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'rewrite'           => $slug
    );

    register_taxonomy( 'silencio_' . $slug, array( 'silencio_slider' ), $args );
}

add_action( 'init', 'silencio_register_taxonomies' );