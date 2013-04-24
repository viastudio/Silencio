<article id="post-<?php the_ID(); ?>" <?php post_class('archivepost'); ?>>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'via' ); ?>
		</div>
	<?php endif; ?>

	<div class="row-fluid">
	<?php if( has_post_thumbnail() ) : ?>
		<div class="span2">
			<?php the_post_thumbnail('blog-thumb'); ?>
		</div><!--/.span2-->
		<div class="span10">
	<?php else : ?>
		<div class="span12">
	<?php endif; ?>
			<header class="entry-header">
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h2><!--/.entry-title-->
			</header><!--/.entry-header-->

			<div class="entry-meta">
				<?php via_posted_on(); ?>, in <?php the_category(', ') ?>
			</div><!--/.entry-meta-->
			
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</article><!--/#post-<?php the_ID(); ?>-->