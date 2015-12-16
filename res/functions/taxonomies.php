<?php
function silencio_register_taxonomies() {
    $singular = 'Color';
    $plural = 'Colors';
    $slug = 'color';

    $labels = array(
        'name' => _x($plural, 'Taxonomy plural name', 'silencio'),
        'singular_name' => __($singular, 'silencio'),
        'search_items' => __('Search ' . $plural, 'silencio'),
        'popular_items' => __('Popular ' . $plural, 'silencio'),
        'all_items' => __('All ' . $plural, 'silencio'),
        'parent_item' => __('Parent ' . $singular, 'silencio'),
        'parent_item_colon' => __('Parent ' . $singular, 'silencio'),
        'edit_item' => __('Edit ' . $singular, 'silencio'),
        'update_item' => __('Update ' . $singular, 'silencio'),
        'add_new_item' => __('Add New ' . $singular, 'silencio'),
        'new_item_name' => __('New ' . $singular, 'silencio'),
        'add_or_remove_items' => __('Add or remove ' . $plural, 'silencio'),
        'choose_from_most_used' => __('Choose from most used ' . $plural, 'silencio'),
        'menu_name' => __($plural, 'silencio')
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'rewrite'           => $slug
    );

    register_taxonomy('sil_' . $slug, array('silencio_slider'), $args);
}

add_action('init', 'silencio_register_taxonomies');
