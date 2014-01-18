<?php
	$silencio_option = silencio_get_global_options();
	$directions = silencio_build_directions_url(
		$silencio_option["silencio_street_txt_input"],
		$silencio_option["silencio_city_txt_input"],
		$silencio_option["silencio_state_txt_input"],
		$silencio_option["silencio_zip_txt_input"]
   );
?>

		</div><!-- #content .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<nav id="footer-nav" role="navigation">
				<?php wp_nav_menu(array('theme_location' => 'footer-menu' )); ?>
			</nav><!-- #footer-nav -->

			<aside id="footer-widget" role="complementary">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-sidebar')) {} ?>
			</aside><!-- #footer-widget -->

			<aside class="site-info">
				<ul class="address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
					<li><span itemprop="name"><?php bloginfo( 'name' ); ?></span></li>
					<?php if($silencio_option["silencio_street_txt_input"] != '') { ?>
				    <li><span itemprop="street-address"><?php echo $silencio_option['silencio_street_txt_input']; ?></span></li>
				    <?php } if($silencio_option["silencio_city_txt_input"] != '') { ?>
				    <li><span itemprop="locality"><?php echo $silencio_option['silencio_city_txt_input']; ?></span>,
				    	<?php } if($silencio_option["silencio_state_txt_input"] != '') { ?>
				    	<span itemprop="region"><?php echo $silencio_option['silencio_state_txt_input']; ?></span>
				    	<?php } if($silencio_option["silencio_zip_txt_input"] != '') { ?>
				    	<span itemprop="postal-code"><?php echo $silencio_option['silencio_zip_txt_input']; ?></span></li>
				    <?php } if($silencio_option["silencio_phone_txt_input"] != '') { ?>
				    <li><span itemprop="tel"><?php echo $silencio_option['silencio_phone_txt_input']; ?></span></li>
				    <?php } if($silencio_option["silencio_email_txt_input"] != '') { ?>
				    <li><span itemprop="email"><a href="<?php echo $silencio_option['silencio_email_txt_input']; ?>">Email</a></span></li>
				    <?php } ?>
			  	</ul><!-- .address -->

			  	<div class="directions">
			  		<a href="<?php echo $directions ?>"><i class="icon-map-marker"></i> View on a map</a>
			  	</div><!-- .directions -->

			  	<ul class="social-media">
					<?php if($silencio_option["silencio_facebook_txt_input"] != '') { ?>
					<li><a href="<?php echo $silencio_option['silencio_facebook_txt_input']; ?>"><i class="fa fa-facebook"></i></a></li>
					<?php } if($silencio_option["silencio_twitter_txt_input"] != '') { ?>
					<li><a href="<?php echo $silencio_option['silencio_twitter_txt_input']; ?>"><i class="fa fa-twitter"></i></a></li>
					<?php } if($silencio_option["silencio_youtube_txt_input"] != '') { ?>
					<li><a href="<?php echo $silencio_option['silencio_youtube_txt_input']; ?>"><i class="fa fa-youtube-play"></i></a></li>
					<?php } if($silencio_option["silencio_googleplus_txt_input"] != '') { ?>
					<li><a href="<?php echo $silencio_option['silencio_googleplus_txt_input']; ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php } ?>
				</ul><!-- .social-media -->
			</aside><!-- .site-info -->

			<aside class="via_tag">
				<p><a href="http://viastudio.com" rel="external" title="Built by VIA Studio">Built by VIA Studio</a></p>
			</aside><!-- .via_tag -->

		</footer><!-- #colophon .site-footer -->

	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>