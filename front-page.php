<?php get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		</div><!-- #content .site-content -->

		<div id="home-news">
			<?php
				// Displays the latest posts.
				$args = array(
					'posts_per_page' => 8
				);

				$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>
			<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div><!--/#home-news-->
	</section><!-- #primary .content-area -->

<?php get_sidebar('home'); ?>
<?php get_footer(); ?>