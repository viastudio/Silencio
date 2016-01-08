<?php
/**
 * Define our settings sections
 *
 * array key=$id, array value=$title in: add_settings_section($id, $title, $callback, $page );
 * @return array
 */
function silencio_options_page_sections() {

    $sections = array();
    $sections['theme_options'] = array(
        'title' => __('Theme Options', 'silencio'),
        'description' => __('Customize your theme', 'silencio')
    );

    return $sections;
}

/**
 * Define our form fields (settings)
 *
 * @return array
 */
function silencio_options_page_fields() {
    // Text Form Fields section

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "street_txt_input",
        "label"   => __('Street Address', 'silencio'),
        "type"    => "text"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "city_txt_input",
        "label"   => __('City', 'silencio'),
        "type"    => "text"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "state_txt_input",
        "label"   => __('State', 'silencio'),
        "type"    => "text"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "zip_txt_input",
        "label"   => __('Zip Code', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => "silencio_zip"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "phone_txt_input",
        "label"   => __('Phone Number', 'silencio'),
        "type"    => "text"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "fax_txt_input",
        "label"   => __('Fax Number', 'silencio'),
        "type"    => "text"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "facebook_txt_input",
        "label"   => __('Facebook Link', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => "silencio_url"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "twitter_txt_input",
        "label"   => __('Twitter Link', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => "silencio_url"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "youtube_txt_input",
        "label"   => __('YouTube Link', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => "silencio_url"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "googleplus_txt_input",
        "label"   => __('Google Plus Link', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => "silencio_url"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "linkedin_txt_input",
        "label"   => __('LinkedIn Link', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => "silencio_url"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "instagram_txt_input",
        "label"   => __('Instagram Link', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => "silencio_url"
    );

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "email_txt_input",
        "label"   => __('Email Address', 'silencio'),
        "type"    => "text",
        "sanitize_callback" => 'silencio_email'
    );

    $choices = array(
        ' ' => '- select page -'
    );
    $pages = get_pages(array('sort_column' => 'post_title', 'hierarchical' => 0));

    foreach ($pages as $page) {
        $choices[$page->ID] = $page->post_title;
    }

    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "_calendar_page_select_input",
        "label"   => __('Calendar Page', 'viatheme_textdomain'),
        "type"    => "select",
        "choices" => $choices
    );
    $options[] = array(
        "section" => "theme_options",
        "id"      => SILENCIO_SHORTNAME . "guide_url_txt_input",
        "label"   => __('WordPress User Guide URL', 'silencio'),
        "type"    => "text"
    );

    return $options;
}
