<?php get_header(); ?>

	<div id="primary" class="content-area span8">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) :
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		?>

			<header class="page-header">
				<div class="author-bio">
					<h1 class="page-title"><?php echo $curauth->display_name; ?></h1>
					<h4>Bio</h4>
					<?php echo get_avatar( $curauth->user_email, 96 ); ?>
					<?php echo $curauth->user_description; ?></dd>
				</div><!-- .author-bio -->
			</header><!-- .page-header -->
			
			<h4>Posts by <?php echo $curauth->display_name; ?></h4>
			<hr>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php via_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area .span8 -->

<?php get_sidebar('post'); ?>
<?php get_footer(); ?>