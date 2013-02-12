<?php get_header(); ?>

		<section id="primary" class="content-area span8">
			<div id="content" class="site-content" role="main">
<!-- Flex Slider -->				
		<?php 
			query_posts('post_type=via_slider&orderby=menu_order&order=ASC&post_per_page=5');
			if (have_posts()):
		?>
				<div class="flexslider">
					<ul class="slides">
					<?php while (have_posts()): ?>
					<?php 
						the_post();
						$meta = get_post_meta($post->ID, 'via_slidelink', true);
					?>
						<li>
						<?php if (!empty($meta)) : ?>
							<a href="<?php echo $meta; ?>">
								<?php the_post_thumbnail('slide-thumb'); ?>
							</a>
						<?php else: ?>
							<?php the_post_thumbnail('slide-thumb'); ?>
						<?php endif; ?>
						</li>
					<?php endwhile; ?>
					</ul>
				</div><!--/.flexslider-->		
		<?php	
			endif;
			wp_reset_query();
		?>
<!-- /Flex Slider-->	
				<?php the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>				
<!-- News Post -->			
				<div id="home_article">
				<?php
					rewind_posts();
					query_posts('category_name=articles&posts_per_page=1'); 
				?>

				<?php 
					while (have_posts()):
					the_post();
				?>
					<h1>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>
	    			<?php the_excerpt(); ?>
				<?php endwhile; ?>
				</div><!--/#home_article-->
<!-- /News Post -->				
			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area .span8 -->

<?php get_sidebar('home'); ?>	
<?php get_footer(); ?>