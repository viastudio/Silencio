<?php
get_header();
?>
<div class="columns">
    <div id="primary" class="content-area column is-three-quarters">
        <main id="main" class="site-main" role="main">

<?php
while (have_posts()) {
    the_post();
    get_template_part('content', 'single');
}
?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar('post');
?>
</div><!-- .columns -->
<?php
get_footer();
