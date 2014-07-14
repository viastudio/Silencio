<?php get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

<?php while (have_posts()) {
    the_post();
?>

<?php get_template_part('content', 'single'); ?>

<?php
}
?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar('post'); ?>
<?php get_footer(); ?>