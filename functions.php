<?php

if ( ! isset( $content_width ) ) $content_width = 900;

if ( ! function_exists( 'via_setup' ) ):

function via_setup() {

	require_once( dirname( __FILE__ ) . '/res/functions/admin.php' );
	
	require( get_template_directory() . '/res/functions/template-tags.php' );
	require( get_template_directory() . '/res/functions/shortcodes.php' );
	require( get_template_directory() . '/res/functions/widgets.php' );
	require( get_template_directory() . '/res/functions/excerpts.php' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'video', 'gallery' ) );

	register_nav_menu( 'primary', __( 'Primary Menu', 'via' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'via' ) );
}

endif; // via_setup

add_action( 'after_setup_theme', 'via_setup' );

// Custom Thumbnail Sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-thumb', 200, 160, true ); //(cropped)
	add_image_size( 'slide-thumb', 1170, 400, true ); //(cropped)
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function via_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'via' ),
		'id' => 'home-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'via' ),
		'id' => 'page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'via' ),
		'id' => 'post-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'via' ),
		'id' => 'footer-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
}

add_action( 'widgets_init', 'via_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function via_scripts() {
	if(!is_admin() && VIA_ENVIRONMENT == 'dev'){
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://code.jquery.com/jquery-1.8.2.js"), false, '1.8.2', true);
		wp_enqueue_script('jquery');

		// Enqueue 3rd party libs
		wp_enqueue_script('flexslider', get_template_directory_uri() . '/res/js/flexslider.min.js', array('jquery'), false, true);
		wp_enqueue_script('fitvids', get_template_directory_uri() . '/res/js/fitvids.min.js', array('jquery'), false, true);
		wp_enqueue_script('be-ios-bug', get_template_directory_uri() . '/res/js/ios-bug.js');
	}
	else if(!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"), false, '1.8.2', true);
		wp_enqueue_script('jquery');
	}

    if (VIA_ENVIRONMENT == 'dev') {
        $global = 'js/global.js';
        $style = 'css/global.css';
    }
    else {
        $global = 'build/global.min.js';
        $style = 'build/global.min.css';
    }
    
    wp_enqueue_script('global', get_template_directory_uri() . '/res/' . $global, array('jquery'), filemtime(get_stylesheet_directory() . '/res/' . $global), true);

	// Register the style like this for a theme:  
	wp_register_style( 'via-style', get_template_directory_uri() . '/res/' . $style, array(), filemtime(get_stylesheet_directory() . '/res/'. $style), 'all' );

	// enqueing:
	wp_enqueue_style( 'via-style' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'via_scripts' );

/**
 * Custom Post Types - Slider
 */
function via_custom_post_types() {
	register_post_type( 'via_slider',
		array(
			'labels' => array(
				'name' => __( 'Sliders', 'via' ),
				'singular_name' => __( 'Slider', 'via' )
			),
			'public' => true,
			'supports' => array('title', 'thumbnail', 'page-attributes'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'sliders')
		)
	);
}

add_action( 'init', 'via_custom_post_types' );

/*
 * Custom Meta Box Functions
 */
include_once 'res/functions/wpalchemy/MetaBox.php';

include_once 'res/functions/wpalchemy/MediaAccess.php';

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

// Custom Meta Box Specs

$custom_metabox =  new WPAlchemy_MetaBox(array
(
	'id' => '_slider_meta',
	'title' => 'Slider Options',
	'types' => array('via_slider'),
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'prefix' => 'via_',
	'template' => get_stylesheet_directory() . '/res/functions/wpalchemy/slider-meta.php',
	'mode' => WPALCHEMY_MODE_EXTRACT
));

/*
 * Registering Theme Options:
 */
if(is_admin()){
	require_once('res/functions/viatheme-theme-settings-basic.php');
}

/*
 * Collects our theme options
 * @return array
 */
function viatheme_get_global_options(){
	$viatheme_option = array();
	$viatheme_option 	= get_option('viatheme_options');
return $viatheme_option;
}

 /*
 * Call the function and collect in variable
 *
 * Should be used in template files like this:
 * <?php echo $viatheme_option['viatheme_txt_input']; ?>
 *
 * Note: Should you notice that the variable ($viatheme_option) is empty when used in certain templates such as header.php, sidebar.php and footer.php
 * you will need to call the function (copy the line below and paste it) at the top of those documents (within php tags)!
 */
$viatheme_option = viatheme_get_global_options();

/*
 * Takes our theme option's location info and produces a maps link appropriate to the user's device.
 * @return string URL to appropriate maps service.
 */
function via_build_directions_url($street, $city, $state, $zip) {
	// Format our address for URLs
	$address = str_replace(' ', '+', implode('+', array($street, $city, $state, $zip))); // replaces all spaces w/ +

	// Check UA to see if this is an iPhone
	$is_iOS = strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone');

	// If yes, parse out the version of iOS
	if ($is_iOS !== false) {
	    $results = array();
	    preg_match('/iPhone OS (\d+)_(\d+)\s+/',$_SERVER['HTTP_USER_AGENT'], $results);
	    $iOS_version = $results[1] . '.' . $results[2];
	}

	// Serve up an Apple Maps link if on an iOS 6 device, otherwise serve up a Google Maps link.
	if ($iOS_version >= 6) {
		return "https://maps.apple.com/maps?q=" . $address; 
	}
	else {
		return "https://maps.google.com/maps?q=" . $address;
	}
}

/*
* Helper function for debugging variables
*
*/
if (!function_exists('debug')) {
	function debug($var) {
		$bt = debug_backtrace();
	  	$caller = array_shift($bt);

		echo '<p><strong>' . basename($caller['file']) .  ' - Line: ' . $caller['line'] . '</strong></p>';
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}
}
