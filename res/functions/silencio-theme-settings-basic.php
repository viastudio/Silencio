<?php
define('SILENCIO_SHORTNAME', 'theme_option_');
define('SILENCIO_PAGE_BASENAME', 'silencio-settings'); // the settings page slug

require_once('silencio-theme-options.php');

add_action('customize_register', 'silencio_register_settings');

/**
 * Helper function for defining variables for the current page
 *
 * @return array
 */
function silencio_get_settings() {

    $output = array();
    $output['silencio_option_name'] = 'silencio_options';
    $output['silencio_page_sections'] = silencio_options_page_sections();
    $output['silencio_page_fields'] = silencio_options_page_fields();

    return $output;
}

/**
 * Helper function for registering our form field settings
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @param (array) $args The array of arguments to be used in creating the field
 * @return function call
 */
function silencio_create_settings_field($wp_customize, $args = array()) {
    // default array to overwrite when calling the function
    $defaults = array(
        'id'      => 'default_field',
        'label'   => 'Default Field',
        'type'    => 'text',
        'section' => 'main_section',
        'choices' => array(),
        'sanitize_callback' => ''
    );

    // "extract" to be able to use the array keys as variables in our function output below
    extract(wp_parse_args($args, $defaults));

    $setting_args = array(
        'sanitize_callback' => $sanitize_callback
    );

    $wp_customize->add_setting($id, $setting_args);

    $control_args = array(
        'label' => $label,
        'section' => $section,
        'type' => $type,
        'choices' => $choices
    );

    $wp_customize->add_control($id, $control_args);
}

/**
 * Register our setting, settings sections and settings fields
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function silencio_register_settings($wp_customize) {
    $settings_output = silencio_get_settings();
    $silencio_option_name = $settings_output['silencio_option_name'];

    // sections
    if (!empty($settings_output['silencio_page_sections'])) {
        // call the "add_settings_section" for each!
        foreach ($settings_output['silencio_page_sections'] as $id => $options) {
            $wp_customize->add_section(
                $id,
                array(
                    'title' => $options['title'],
                    'description' => $options['description'],
                    'priority' => 35
                )
            );
        }
    }

    // fields
    if (!empty($settings_output['silencio_page_fields'])) {
        foreach ($settings_output['silencio_page_fields'] as $option) {
            silencio_create_settings_field($wp_customize, $option);
        }
    }
}

/**
 * Validates a URL
 *
 * @param string $value
 * @return string
 */
function silencio_url($value) {
    // See http://code.tutsplus.com/tutorials/8-regular-expressions-you-should-know--net-6149
    $pattern = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
    return preg_match($pattern, $value) ? $value : false;
}

/**
 * Validates an email address
 *
 * @param string $value
 * @return string
 */
function silencio_email($value) {
    return is_email($value);
}

/**
 * Validates a numeric value
 *
 * @param string $value
 * @return string
 */
function silencio_number($value) {
    return is_numeric($value) ? $value : false;
}

/**
 * Strips HTML from $value
 *
 * @param string $value
 * @return string
 */
function silencio_no_html($value) {
    return sanitize_text_field($value);
}

/**
 * Validates a ZIP Code in following formats:
 * 12345
 * 12345 1234
 * 12345-1234
 *
 * @param string $value
 * @return string
 */
function silencio_zip($value) {
    return preg_match('/^\d{5}(?:[-\s]\d{4})?$/', $value) ? $value : false;
}
