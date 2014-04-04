<?php
if ( ! function_exists( 'silencio_setup' ) ):

function silencio_setup() {

	require_once( dirname( __FILE__ ) . '/res/functions/admin.php' );

	require( get_template_directory() . '/res/functions/template-tags.php' );
	require( get_template_directory() . '/res/functions/shortcodes.php' );
	require( get_template_directory() . '/res/functions/widgets.php' );
	require( get_template_directory() . '/res/functions/excerpts.php' );
    // require( get_template_directory() . '/res/functions/post-types.php' );
    // require( get_template_directory() . '/res/functions/taxonomies.php' );
	//require( get_template_directory() . '/res/customizer.php' );
	//require( get_template_directory() . '/res/jetpack.php' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	// add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'video', 'gallery' ) );

	register_nav_menu( 'primary', __( 'Primary Menu', 'silencio' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'silencio' ) );
}

endif; // silencio_setup

add_action( 'after_setup_theme', 'silencio_setup' );

// Custom Thumbnail Sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-thumb', 200, 160, true ); //(cropped)
	add_image_size( 'header-thumb', 1170, 400, true ); //(cropped)
}

// Add oEmbed to Widgets
add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
add_filter( 'widget_text', array( $wp_embed, 'autoembed'), 8 );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function silencio_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'silencio' ),
		'id' => 'home-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'silencio' ),
		'id' => 'page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'silencio' ),
		'id' => 'post-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'silencio' ),
		'id' => 'footer-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}

add_action( 'widgets_init', 'silencio_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function silencio_scripts() {

	if(!is_admin() && VIA_ENVIRONMENT == 'dev'){
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://code.jquery.com/jquery-1.10.2.js"), false, '1.8.2', true);
		wp_enqueue_script('jquery');

		// Enqueue 3rd party libs
		wp_enqueue_script('fitvids', get_template_directory_uri() . '/res/js/fitvids.js', array('jquery'), false, true);
		wp_enqueue_script('google.fastbutton', get_template_directory_uri() . '/res/js/google.fastbutton.js', array('jquery'), false, true);
		wp_enqueue_script('jquery.google.fastbutton', get_template_directory_uri() . '/res/js/jquery.google.fastbutton.js', array('jquery'), false, true);
	}
	else if(!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"), false, '1.8.2', true);
		wp_enqueue_script('jquery');
	}

	// Disable this environment check & load min.css if you want to test in IE8 with respond.js
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

add_action( 'wp_enqueue_scripts', 'silencio_scripts' );

/*
 * Custom Role for Client User
 * The role has all of the capabilities of an editor, plus the ability to manage theme options.
 * Theme options inculde widgets, menus, theme options (if theme supports), custom backbground (if theme supports), custom header (if theme supports).
 * Optionally, the role can have the capability of creating new users by uncommenting  create_users and list_users
 *
 * For more capability options, see http://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table
 *
 */
add_action( 'admin_init', 'silencio_custom_role' );
function silencio_custom_role() {

	if ( !get_role('client_user') ) {
		// let's use the editor as the base  capabilities
		$caps = get_role('editor')->capabilities;

		// add our new capabilities
		$caps = array_merge( $caps, array(
			'edit_theme_options' => true,
			'create_users' => true,
			'edit_users' => true,
			'delete_users' => true,
			'list_users' => true,
			'remove_users' => true,
			'promote_users' => true
		));
		add_role('client_user', 'Client User', $caps );
	}

// Gravity Forms Permissions
    if ( !get_role('forms_user') ) {
        // let's use the subscriber as the base capabilities
        $caps = get_role('subscriber')->capabilities;

        // add our new capabilities
        $caps = array_merge( $caps, array(
            'gravityforms_view_entries' => true,
            'gravityforms_export_entries' => true,
            'gravityforms_delete_entries' => true
        ));
        add_role('forms_user', 'Forms User', $caps );
    }
}

function add_grav_forms(){
	$role = get_role('client_user');
	$role->add_cap('gform_full_access');
}

add_action('admin_init','add_grav_forms');

/**
 * Fix Uncaught Reference Error from Gravity Forms - Puts js call in the footer, where it should be.
 */
add_filter("gform_init_scripts_footer", "init_scripts");
	function init_scripts() {
	return true;
}

/*
 * Custom Meta Box Functions
 */
include_once 'res/functions/wpalchemy/MetaBox.php';
include_once 'res/functions/wpalchemy/MediaAccess.php';
$wpalchemy_media_access = new WPAlchemy_MediaAccess();

// Custom Meta Box Specs
$custom_metabox =  new WPAlchemy_MetaBox(array
(
	'id' => '_example_meta',
	'title' => 'Custom Options',
	'types' => array('silencio_example'),
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'prefix' => 'silencio_',
	'template' => get_stylesheet_directory() . '/res/functions/wpalchemy/example-meta.php',
	'mode' => WPALCHEMY_MODE_EXTRACT
));

/*
 * Registering Theme Options:
 */
if ( is_admin( ) ) { require_once('res/functions/silencio-theme-settings-basic.php'); }

/*
 * Collects our theme options
 * @return array
 */
function silencio_get_global_options() {
	$silencio_option = array();
	$silencio_option = get_option('silencio_options');
return $silencio_option;
}

 /*
 * Call the function and collect in variable
 *
 * Should be used in template files like this:
 * <?php echo $silencio_option['silencio_txt_input']; ?>
 *
 * Note: Should you notice that the variable ($silencio_option) is empty when used in certain templates such as header.php, sidebar.php and footer.php
 * you will need to call the function (copy the line below and paste it) at the top of those documents (within php tags)!
 */
$silencio_option = silencio_get_global_options();

/*
 * Takes our theme option's location info and produces a maps link appropriate to the user's device.
 * @return string URL to appropriate maps service.
 */
function silencio_build_directions_url($street, $city, $state, $zip) {
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
