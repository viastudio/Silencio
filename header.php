<!DOCTYPE html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<title><?php wp_title(''); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link type="text/plain" rel="author" href="<?php echo get_template_directory_uri(); ?>/humans.txt" />

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Typekit >
<script type="text/javascript" src="//use.typekit.net/########.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script> -->

<?php
wp_head();
?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/res/build/respond.min.js"></script>
<![endif]-->

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
                <div class="container">
                    <nav class="menu-nav">
                        <button type="button" class="menu-button" href="#"><span class="sr-only">Open Menu</span><i class="fa fa-bars"></i></button>
                    </nav>
                    <div class="site-branding">
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <!-- <h2 class="site-description"><?php bloginfo('description'); ?></h2> -->
                    </div><!-- .site-branding -->
                </div><!-- .container -->
            </header><!-- #masthead .site-header -->

            <div class="nav-container">
                <div class="container">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <div class="nav-controls">
                            <button type="button" class="menu-button menu-close" href="#"><span class="sr-only">Close Menu</span><i class="fa fa-times"></i></button>
<?php
get_search_form();
?>
                        </div>
<?php
wp_nav_menu(array('theme_location' => 'primary'));
?>
                    </nav><!-- #site-navigation -->
                </div><!-- .container -->
            </div><!-- .nav-container -->

            <div id="content" class="site-content">
                <div class="container">
