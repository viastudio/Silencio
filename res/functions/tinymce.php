<?php
// init process for registering our button
add_action('init', 'silencio_shortcode_button_init');
function silencio_shortcode_button_init() {

    //Abort early if the user will never see TinyMCE
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
        return;
    }

    //Add a callback to register our tinymce plugin
    add_filter("mce_external_plugins", "silencio_register_tinymce_plugin");

    // Add a callback to add our button to the TinyMCE toolbar
    add_filter('mce_buttons_2', 'silencio_add_tinymce_button');
}


//This callback registers our plug-in
function silencio_register_tinymce_plugin($plugin_array) {
    $plugin_array['silencio_grid'] = get_template_directory_uri() . '/res/functions/js/tinymce.grid.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function silencio_add_tinymce_button($buttons) {
    //Add the button ID to the $button array
    $buttons[] = "silencio_grid";
    return $buttons;
}
