<?php 
	$viatheme_option = viatheme_get_global_options(); 
	$directions = via_build_directions_url($viatheme_option["viatheme_street_txt_input"],
  										   $viatheme_option["viatheme_city_txt_input"],
  										   $viatheme_option["viatheme_state_txt_input"],
  										   $viatheme_option["viatheme_zip_txt_input"]); 
?>

	</div><!-- #main .row-fluid .site-main -->

	<footer id="colophon" class="container site-footer" role="contentinfo">

		<nav id="footer-nav" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'footer-menu' )); ?>
		</nav><!-- #footer-nav -->

		<!-- Footer Sidebar Example -->
		<div id="secondary" class="widget-area" role="complementary">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-sidebar')) {} ?>
		</div><!-- #secondary .widget-area -->

		<div class="site-info">
			<ul class="address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
				<li><span itemprop="name"><?php bloginfo( 'name' ); ?></span></li>
				<?php if($viatheme_option["viatheme_street_txt_input"] != '') { ?>
			    <li><span itemprop="street-address"><?php echo $viatheme_option['viatheme_street_txt_input']; ?></span></li>
			    <?php } if($viatheme_option["viatheme_city_txt_input"] != '') { ?>
			    <li><span itemprop="locality"><?php echo $viatheme_option['viatheme_city_txt_input']; ?></span>, 
			    	<?php } if($viatheme_option["viatheme_state_txt_input"] != '') { ?>
			    	<span itemprop="region"><?php echo $viatheme_option['viatheme_state_txt_input']; ?></span> 
			    	<?php } if($viatheme_option["viatheme_zip_txt_input"] != '') { ?>
			    	<span itemprop="postal-code"><?php echo $viatheme_option['viatheme_zip_txt_input']; ?></span></li>
			    <?php } if($viatheme_option["viatheme_phone_txt_input"] != '') { ?>	
			    <li><span itemprop="tel"><?php echo $viatheme_option['viatheme_phone_txt_input']; ?></span></li>
			    <?php } if($viatheme_option["viatheme_email_txt_input"] != '') { ?>	
			    <li><span itemprop="email"><a href="<?php echo $viatheme_option['viatheme_email_txt_input']; ?>">Email</a></span></li>
			    <?php } ?>
		  	</ul>
		  	<div class="directions">
		  		<a href="<?php echo $directions ?>">
					<i class="icon-map-marker"></i> View on a map
				</a>
		  	</div>
		  	<ul class="social-media">
				<?php if($viatheme_option["viatheme_facebook_txt_input"] != '') { ?>	
				<li><a href="<?php echo $viatheme_option['viatheme_facebook_txt_input']; ?>" class="icon_facebook">Facebook</a></li>
				<?php } if($viatheme_option["viatheme_twitter_txt_input"] != '') { ?>
				<li><a href="<?php echo $viatheme_option['viatheme_twitter_txt_input']; ?>" class="icon_twitter">Twitter</a></li>
				<?php } if($viatheme_option["viatheme_youtube_txt_input"] != '') { ?>
				<li><a href="<?php echo $viatheme_option['viatheme_youtube_txt_input']; ?>" class="icon_youtube">YouTube</a></li>
				<?php } if($viatheme_option["viatheme_googleplus_txt_input"] != '') { ?>				
				<li><a href="<?php echo $viatheme_option['viatheme_googleplus_txt_input']; ?>" class="icon_google-plus">Google Plus</a></li>
				<?php } ?>
			</ul><!-- .social-media -->
		</div><!-- .site-info -->

		<div class="via_tag ">
			<p><a href="http://viastudio.com" rel="external" title="Designed by VIA Studio">Designed by VIA Studio</a></p>
		</div><!--/.via_tag-->
	
	</footer><!-- #colophon .site-footer -->

</div><!-- #page .container .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>