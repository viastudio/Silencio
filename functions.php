<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 1200; /* pixels */
}

if (! function_exists('silencio_setup')) {
    function silencio_setup() {
        require_once(dirname(__FILE__) . '/res/functions/admin.php');
        require(get_template_directory() . '/res/functions/template-tags.php');
        require(get_template_directory() . '/res/functions/shortcodes.php');
        require(get_template_directory() . '/res/functions/widgets.php');
        require(get_template_directory() . '/res/functions/excerpts.php');
        require(get_template_directory() . '/res/functions/tinymce.php');
        require(get_template_directory() . '/res/functions/users.php');
        require(get_template_directory() . '/res/functions/metaboxes.php');
        require(get_template_directory() . '/res/functions/jetpack.php');
        // require(get_template_directory() . '/res/functions/mime-types.php');
        // require(get_template_directory() . '/res/functions/post-types.php');
        // require(get_template_directory() . '/res/functions/taxonomies.php');

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        // add_theme_support('post-formats', array( 'aside', 'image', 'link', 'quote', 'video', 'gallery'));

        register_nav_menu('primary', __('Primary Menu', 'silencio'));
        register_nav_menu('ancillary', __('Ancillary Menu', 'silencio'));
        // register_nav_menu('footer-menu', __('Footer Menu', 'silencio'));
    }
}

add_action('after_setup_theme', 'silencio_setup');

// Custom Thumbnail Sizes
if (function_exists('add_image_size')) {
    add_image_size('blog-thumb', 200, 160, true); //(cropped)
    add_image_size('header-thumb', 1170, 400, true); //(cropped)
}

//Custom Content Image Sizes Attribute
add_filter('wp_calculate_image_sizes', function ($sizes, $size) use ($content_width) {
    $width = $size[0];

    if (is_null($content_width) || $width < $content_width) {
        return $sizes;
    }

    return '(min-width: ' . $content_width . 'px) ' . $content_width . 'px, 100vw';
}, 10, 2);

//Custom Thumbnail Sizes Attribute
function silencio_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    //Calculate Image Sizes by type and breakpoint
    //Header Images
    if ($size === 'header-thumb') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 730px';

        //Blog Thumbnails
    } elseif ($size === 'blog-thumb') {
        $attr['sizes'] = '(max-width: 992px) 200px, (max-width: 1200px) 127px, 160px';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'silencio_post_thumbnail_sizes_attr', 10, 3);

/**
 * Enqueue scripts and styles
 */
function silencio_scripts() {
    $bundle = 'dist/js/global.js';
    $bundlePath = get_template_directory_uri() . "/$bundle";
    wp_enqueue_script(
        'bundle',
        $bundlePath,
        array('jquery'),
        defined('VIA_DEPLOYMENT') ? VIA_DEPLOYMENT : filemtime(__DIR__ . "/$bundle"),
        true
    );

    $style = 'dist/scss/style.css';
    $stylePath = get_template_directory_uri() . "/$style";
    wp_register_style(
        'global',
        $stylePath,
        array(),
        defined('VIA_DEPLOYMENT') ? VIA_DEPLOYMENT : filemtime(__DIR__ . "/$style"),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'silencio_scripts');


function jr3_enqueue_gutenberg() {
    wp_register_style('jr3-gutenberg', get_stylesheet_directory_uri() . '/res/build/editor.min.css');
    wp_enqueue_style('jr3-gutenberg');
}

/**
 * Add oEmbed support for widgets
 */
add_filter('widget_text', array($wp_embed, 'run_shortcode'), 8);
add_filter('widget_text', array($wp_embed, 'autoembed'), 8);

/**
 * Register widgetized area and update sidebar with default widgets
 */
function silencio_widgets_init() {

    register_sidebar(array(
        'name' => __('Home Sidebar', 'silencio'),
        'id' => 'home-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Page Sidebar', 'silencio'),
        'id' => 'page-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Post Sidebar', 'silencio'),
        'id' => 'post-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Sidebar', 'silencio'),
        'id' => 'footer-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'silencio_widgets_init');

/*
 * Gravityforms Markup Customization:
 */
add_filter('gform_submit_button', function ($button, $form) {
    $dom = new DOMDocument();
    $dom->loadHTML($button);
    $input = $dom->getElementsByTagName('input')->item(0);
    $tabindex = $input->getAttribute('tabindex');

    return "<button type=\"submit\" tabindex=\"{$tabindex}\" class=\"btn btn-primary\" id=\"gform_submit_button_{$form['id']}\">{$form['button']['text']}</button>";
}, 10, 2);
add_filter('gform_validation_message', function ($message, $form) {
    return "<div class=\"alert alert-danger\"><h4>Error</h4><p>" . esc_html__('There was a problem with your submission.', 'gravityforms') . ' ' . esc_html__('Errors have been highlighted below.', 'gravityforms') . '</p></div>';
}, 10, 2);
add_filter('gform_confirmation', function ($confirmation, $form, $entry, $ajax) {
    foreach ($form['confirmations'] as $confirm) {
        if ($confirm['type'] === 'message') {
            $confirmation = "<div class=\"alert alert-success\"><h4>Success</h4>$confirmation</div>";
        }
    }
    return $confirmation;
}, 10, 4);

/**
 * Fix Uncaught Reference Error from Gravity Forms - Puts js call in the footer, where it should be.
 */
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
    return true;
}

/*
 * Registering Theme Options:
 */
require_once('res/functions/silencio-theme-settings-basic.php');

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
        preg_match('/iPhone OS (\d+)_(\d+)\s+/', $_SERVER['HTTP_USER_AGENT'], $results);
        $iOS_version = $results[1] . '.' . $results[2];
    }

    // Serve up an Apple Maps link if on an iOS 6 device, otherwise serve up a Google Maps link.
    if (isset($iOS_version) && $iOS_version >= 6) {
        return "https://maps.apple.com/maps?q=" . $address;
    } else {
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

        echo '<p><strong>' . basename($caller['file']) . ' - Line: ' . $caller['line'] . '</strong></p>';
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
/*
 * Helper function for getting post thumbnail url
 *
 */
function get_post_thumbnail_url($size) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, $size, true);
    $thumb_url = $thumb_url_array[0];
    return $thumb_url;
}
/**
 * Load a template part & pass in variables declared in caller scope. Optionally return as a string.
 * @param string $path path to template file, minus .php (eg. `content-page`, `partial/folder/template-name`)
 * @param array $args map of variables to load into scope
 * @param bool $echo echo or return rendered template
 * @return null or rendered template string
 */
function silencio_partial($path, $args = [], $echo = true) {
    if (!empty($args)) {
        extract($args);
    }

    if ($echo) {
        include(locate_template($path . '.php'));
        return;
    }

    ob_start();
    include(locate_template($path . '.php'));
    return ob_get_clean();
}
