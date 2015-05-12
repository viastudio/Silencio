<?php
/*
Template Name: Full Width
*/
get_header();
?>
    <div id="primary-full" class="content-area">
        <main id="main" class="site-main" role="main">
<?php
while (have_posts()) {
    the_post();
    get_template_part('content', 'page');
}
?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
