<?php
/**
 * login css hijacking
 */
add_action('login_head', 'custom_login_css');

function custom_login_css() {
    echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/res/css/admin.css" type="text/css" media="all" />';
}

if (is_admin()) { // why execute all the code below at all if we're not in admin?

    // call in custom admin stylesheet - this will be global for admin and also login

    add_action('admin_print_styles', 'load_custom_admin_css');

    function load_custom_admin_css() {
        wp_enqueue_style('custom_admin_css', get_template_directory_uri() . '/res/css/admin.css');
    }

    // overriding footer "credit" text

    add_filter('admin_footer_text', 'custom_footer_text');

    function custom_footer_text($default_text) {
        return '<span id="footer-thankyou">Site managed by <a href="http://www.viastudio.com">VIA Studio</a> | Powered by <a href="http://www.wordpress.org">WordPress</a></span>';
    }

    /**
     * cleaning up and customizing the dashboard
     */

    add_action('wp_dashboard_setup', 'custom_dashboard_widgets');

    function custom_dashboard_widgets() {
        $wp_meta_boxes = $GLOBALS['wp_meta_boxes'];

        // remove unnecessary widgets
        // var_dump($wp_meta_boxes['dashboard']); // use to get all the widget IDs
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);

        //custom dashboard widgets
        wp_add_dashboard_widget('custom_help_widget', 'Theme by VIA Studio', 'custom_dashboard_help'); // add a new custom widget for help and support
    }

    function custom_dashboard_help() {
        $guide_url = get_theme_mod('theme_option_guide_url_txt_input');
?>
        <p>
            <a href="http://viastudio.com"><img src="http://viastudio.com/via-silencio-ad.png"></a>
        </p>
<?php
        if (!empty($guide_url)) {
?>
        <p>
            <a class="button button-primary button-hero" href="<?php echo $guide_url; ?>" target="_blank">View User Guide</a>
        </p>
<?php
        }
    }

    /**
     * custom contextual help - tack on our support information to the end of the contextual help
     */

    add_filter('contextual_help', 'custom_help_support', 100); //giving a very low priority to make sure it's always at the end

    function custom_help_support($help) {
        $help .= '
                    <p><strong>Additional support</strong> - Contact the web team at <a href="http://www.viastudio.com">VIA Studio</a>
                    by phone at 502-498-8477 or by email at <a href="mailto:support@viastudio.com">support@viastudio.com</a>.</p>
                ';
        return $help;
    }

    /**
    * Editor Customizations
    */

    add_filter('mce_buttons_2', 'silencio_add_style_select');

    function silencio_add_style_select($buttons) {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }

    add_filter('tiny_mce_before_init', 'silencio_add_styles');

    function silencio_add_styles($settings) {

        $style_formats = array(
            array(
                'title' => 'Intro',
                'selector' => 'p',
                'classes' => 'intro'
            ),
            array(
                'title' => 'Button',
                'selector' => 'a',
                'classes' => 'btn'
            )
        );

        $settings['style_formats'] = json_encode($style_formats);

        return $settings;

    }

    function silencio_add_editor_styles() {
        add_editor_style('res/css/mce-editor-style.css');
    }

    add_action('init', 'silencio_add_editor_styles');
} //wrapper for admin functions
