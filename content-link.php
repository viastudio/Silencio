	<article id="post-<?php the_ID(); ?>" <?php post_class('link'); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'via' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<span class="format-link">
				<a href="<?php echo esc_url( get_post_format_link( get_post_format() ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'cleanretina' ), get_post_format_string( get_post_format() ) ) ); ?>">
					<?php echo get_post_format_string( get_post_format() ); ?>
				</a>
			</span>

			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'via' ) );
					if ( $categories_list && via_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'via' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'via' ) );
					if ( $tags_list ) :
				?>
				<span class="tag-links">
					<?php printf( __( 'Tagged %1$s', 'via' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'via' ), __( '1 Comment', 'via' ), __( '% Comments', 'via' ) ); ?></span>
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->