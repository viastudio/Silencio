<?php
    $directions = silencio_build_directions_url(
        get_theme_mod('theme_option_street_txt_input'),
        get_theme_mod('theme_option_city_txt_input'),
        get_theme_mod('theme_option_state_txt_input'),
        get_theme_mod('theme_option_zip_txt_input')
   );
?>
                </div><!-- .container -->
            </div><!-- #content .site-content -->

            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="container">
                    <nav id="footer-nav" role="navigation">
                        <?php wp_nav_menu(array('theme_location' => 'footer-menu' )); ?>
                    </nav><!-- #footer-nav -->

                    <aside id="footer-widget" role="complementary">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-sidebar')) {} ?>
                    </aside><!-- #footer-widget -->

                    <aside class="site-info">
                        <ul class="address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                            <li><span itemprop="name"><?php bloginfo( 'name' ); ?></span></li>
                            <?php if(($street = get_theme_mod('theme_option_street_txt_input')) != '') { ?>
                            <li><span itemprop="street-address"><?php echo $street; ?></span></li>
                            <?php } if(($city = get_theme_mod('theme_option_city_txt_input')) != '') { ?>
                            <li><span itemprop="locality"><?php echo $city; ?></span>,
                                <?php } if(($state = get_theme_mod('theme_option_state_txt_input')) != '') { ?>
                                <span itemprop="region"><?php echo $state; ?></span>
                                <?php } if(($zip = get_theme_mod('theme_option_zip_txt_input')) != '') { ?>
                                <span itemprop="postal-code"><?php echo $zip; ?></span></li>
                            <?php } if(($phone = get_theme_mod('theme_option_phone_txt_input')) != '') { ?>
                            <li><span itemprop="tel"><?php echo $phone; ?></span></li>
                            <?php } if(($email = get_theme_mod('theme_option_email_txt_input')) != '') { ?>
                            <li><span itemprop="email"><a href="<?php echo $email; ?>">Email</a></span></li>
                            <?php } ?>
                        </ul><!-- .address -->

                        <div class="directions">
                            <a href="<?php echo $directions ?>"><i class="icon-map-marker"></i> View on a map</a>
                        </div><!-- .directions -->

                        <ul class="social-media">
                            <?php if(($facebook = get_theme_mod('theme_option_facebook_txt_input')) != '') { ?>
                            <li><a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php } if(($twitter = get_theme_mod('theme_option_twitter_txt_input')) != '') { ?>
                            <li><a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php } if(($youtube = get_theme_mod('theme_option_youtube_txt_input')) != '') { ?>
                            <li><a href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play"></i></a></li>
                            <?php } if(($googleplus = get_theme_mod('theme_option_googleplus_txt_input')) != '') { ?>
                            <li><a href="<?php echo $googleplus; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>
                        </ul><!-- .social-media -->
                    </aside><!-- .site-info -->

                    <aside class="via_tag">
                        <p><a href="http://viastudio.com" rel="external" title="Built by VIA Studio">Built by VIA Studio</a></p>
                    </aside><!-- .via_tag -->
                </div><!-- .container -->
            </footer><!-- #colophon .site-footer -->
        </div><!-- #page -->
    </div> <!-- .body-wrap -->

<?php wp_footer(); ?>

</body>
</html>
