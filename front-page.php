<?php get_header(); ?>

	<div class="flexslider">
		<ul class="slides">
		<?php
			// Displays the Sliders.
			$args = array(
				'post_type' => 'via_slider',
				'posts_per_page' => 5
			); 

			$the_query = new WP_Query( $args );
				while ( $the_query->have_posts() ) :
						$the_query->the_post();
						$meta = get_post_meta($post->ID, 'via_slidelink', true);
		?>
			<li>
				<?php if (!empty($meta)) : ?>
					<a href="<?php echo $meta; ?>">
						<?php the_post_thumbnail('slide-thumb'); ?>
					</a>
				<?php else : ?>
					<?php the_post_thumbnail('slide-thumb'); ?>
				<?php endif; ?>
			</li>
		<?php endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
		?>
		</ul><!-- .slides -->
	</div><!-- .flexslider -->	

	<section id="primary" class="content-area span8">
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
	</section><!-- #primary .content-area .span8 -->

<?php get_sidebar('home'); ?>	
<?php get_footer(); ?>