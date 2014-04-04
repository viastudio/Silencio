<?php
/**
 * Define Constants
 */
define('SILENCIO_SHORTNAME', 'theme_option_');
define('SILENCIO_PAGE_BASENAME', 'silencio-settings'); // the settings page slug

/**
 * Include the required files
 */
// page settings sections & fields as well as the contextual help text.
require_once('silencio-theme-options.php');

/**
 * Specify Hooks/Filters
 */
add_action( 'customize_register', 'silencio_register_settings' );

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
 * src: http://alisothegeek.com/2011/01/wordpress-settings-api-tutorial-1/
 * @param (array) $args The array of arguments to be used in creating the field
 * @return function call
 */
function silencio_create_settings_field($wp_customize, $args = array() ) {
    // default array to overwrite when calling the function
    $defaults = array(
        'id'      => 'default_field',                   // the ID of the setting in our options array, and the ID of the HTML form element
        'label'   => 'Default Field',                   // the label for the HTML form element
        'type'    => 'text',                            // the HTML form element to use
        'section' => 'main_section',                    // the section this setting belongs to — must match the array key of a section in silencio_options_page_sections()
        'choices' => array(),                           // (optional): the values in radio buttons or a drop-down menu
        'sanitize_callback' => ''
    );

    // "extract" to be able to use the array keys as variables in our function output below
    extract( wp_parse_args( $args, $defaults ) );

    $setting_args = array(
        'sanitize_callback' => $sanitize_callback,
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
 */
function silencio_register_settings($wp_customize){

	// get the settings sections array
	$settings_output 	= silencio_get_settings();
    $silencio_option_name = $settings_output['silencio_option_name'];

    // sections
    if(!empty($settings_output['silencio_page_sections'])){
        // call the "add_settings_section" for each!
        foreach ( $settings_output['silencio_page_sections'] as $id => $options ) {
            $wp_customize->add_section(
                $id,
                array(
                    'title' => $options['title'],
                    'description' => $options['description'],
                    'priority' => 35,
                )
            );
        }
    }

	// fields
	if(!empty($settings_output['silencio_page_fields'])){
		foreach ($settings_output['silencio_page_fields'] as $option) {
			silencio_create_settings_field($wp_customize, $option);
		}
	}
}
?>