<?php
get_header();
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

<?php if (have_posts()) {
?>

            <header class="page-header">
                <h1 class="page-title"><?php printf(__('Search Results for: %s', 'silencio'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header><!-- .page-header -->

<?php
    while (have_posts()) {
        the_post();
?>
<?php get_template_part('content', 'search'); ?>
<?php
    }
?>

<?php silencio_paging_nav(); ?>

<?php
} else {
?>

<?php get_template_part('content', 'none'); ?>

<?php
}
?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php get_sidebar('post'); ?>
<?php get_footer(); ?>