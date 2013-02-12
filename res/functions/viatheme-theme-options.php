<?php
/**
 * Define our settings sections
 *
 * array key=$id, array value=$title in: add_settings_section( $id, $title, $callback, $page );
 * @return array
 */
function viatheme_options_page_sections() {

	$sections = array();
	$sections['txt_section'] 		= __('VIA Theme Options', 'via');

	return $sections;
}

/**
 * Define our form fields (settings)
 *
 * @return array
 */
function viatheme_options_page_fields() {
	// Text Form Fields section

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_street_txt_input",
		"title"   => __( 'Street Address', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "nohtml"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_city_txt_input",
		"title"   => __( 'City', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "nohtml"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_state_txt_input",
		"title"   => __( 'State', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "nohtml"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_zip_txt_input",
		"title"   => __( 'Zip Code', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "nohtml"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_phone_txt_input",
		"title"   => __( 'Phone Number', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "nohtml"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_facebook_txt_input",
		"title"   => __( 'Facebook Link', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "url"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_twitter_txt_input",
		"title"   => __( 'Twitter Link', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "url"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_youtube_txt_input",
		"title"   => __( 'YouTube Link', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "url"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_googleplus_txt_input",
		"title"   => __( 'Google Plus Link', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "url"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_email_txt_input",
		"title"   => __( 'Email Address', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "email"
	);

	$options[] = array(
		"section" => "txt_section",
		"id"      => viatheme_SHORTNAME . "_typekit_txt_input",
		"title"   => __( 'Typekit ID', 'via' ),
		"desc"    => "",
		"type"    => "text",
		"class"   => "text"
	);

	return $options;
}

/**
 * Contextual Help
 */
function viatheme_options_page_contextual_help() {

	$text 	= "<h3>" . __('viatheme Settings - Contextual Help','via') . "</h3>";
	$text 	.= "<p>" . __('Contextual help goes here. You may want to use different html elements to format your text as you want.','via') . "</p>";

	// must return text! NOT echo
	return $text;
} ?>