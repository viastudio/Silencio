<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

		<!-- WP_Query Sample -->
		<div id="home-news">
			<?php
				$args = array(
					'posts_per_page' => 8
				);

				$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : $the_query->the_post();
			?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>
		</div><!--/#home-news-->
	</div><!-- #primary -->

<?php get_sidebar('home'); ?>
<?php get_footer(); ?>