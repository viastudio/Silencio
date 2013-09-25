<!DOCTYPE html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<title><?php wp_title(''); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Modernizr -->
<script src="<?php echo get_template_directory_uri(); ?>/res/js/modernizr-2.6.2.min.js"></script>

<!-- Typekit -->
<?php
$viatheme_option = viatheme_get_global_options();
if($viatheme_option["viatheme_typekit_txt_input"] != '') {
?>
<script type="text/javascript" src="//use.typekit.net/<?php echo $viatheme_option['viatheme_typekit_txt_input']; ?>.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php
}
?>

<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/res/js/respond.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
	<div class="wrap">
		<div id="page" class="hfeed site">
			<nav class="menu-nav">
				<a class="menu-button" href="#"><i class="icon-reorder icon-large"></i></a>
			</nav>

			<header id="masthead" class="site-header container" role="banner">
				<h1 class="site-title">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
						<!-- For Sites With a LOGO <img src="<?php echo get_template_directory_uri(); ?>/res/img/logo.png" /> -->
					</a>
				</h1>
			</header><!-- #masthead .site-header -->

			<nav id="access" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- .site-navigation .main-navigation -->

			<div id="main" class="site-main" role="main">