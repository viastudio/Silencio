<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<title><?php wp_title(''); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link type="text/plain" rel="author" href="<?php echo get_template_directory_uri(); ?>/humans.txt" />
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

<!-- Typekit >
<script type="text/javascript" src="//use.typekit.net/########.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script> -->
<?php
wp_head();
?>
</head>

<body <?php body_class(); ?>>
<?php
if (function_exists('gtm4wp_the_gtm_tag')) {
    gtm4wp_the_gtm_tag();
}
?>
    <div class="body-wrap">
        <div id="page" class="hfeed site">
            <header id="masthead" class="site-header" role="banner">
                <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                        <h1 class="site-title navbar-item"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <button class="button navbar-burger" data-target="navMenu"><span></span><span></span><span></span></button>
                    </div>
                    <div class="navbar-menu" id="navMenu">
<?php
wp_nav_menu([
    'theme_location' => 'primary',
    'container' => false,
    'items_wrap' => '<div class="navbar-start %2$s">%3$s</div>',
    'walker' => new Bulma_Navbar_Menu()
]);
?>
                        <div class="navbar-end">
                            <div class="navbar-item">
<?php
get_search_form();
?>
                            </div>
                        </div>
                    </div>
                </nav>
            </header><!-- #masthead .site-header -->
<?php
silencio_partial('partials/hero', array(), true);
?>
            <section id="content" class="site-content">
                <div class="container">

