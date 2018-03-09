<?php
get_header();
?>
    <div class="columns">
        <section id="primary" class="content-area column is-three-quarters">
            <main id="main" class="site-main" role="main">

<?php
if (have_posts()) {
?>
                <section class="hero is-primary page-header">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="page-title">
<?php
    if (is_home()) {
        _e('Blog', 'silencio');
    } elseif (is_category()) {
        single_cat_title();
    } elseif (is_tag()) {
        single_tag_title();
    } elseif (is_author()) {
        printf(__('Author: %s', 'silencio'), '<span class="vcard">' . get_the_author() . '</span>');
    } elseif (is_day()) {
        printf(__('Day: %s', 'silencio'), '<span>' . get_the_date() . '</span>');
    } elseif (is_month()) {
        printf(__('Month: %s', 'silencio'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'silencio')) . '</span>');
    } elseif (is_year()) {
        printf(__('Year: %s', 'silencio'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'silencio')) . '</span>');
    } elseif (is_tax('post_format', 'post-format-aside')) {
        _e('Asides', 'silencio');
    } elseif (is_tax('post_format', 'post-format-gallery')) {
        _e('Galleries', 'silencio');
    } elseif (is_tax('post_format', 'post-format-image')) {
        _e('Images', 'silencio');
    } elseif (is_tax('post_format', 'post-format-video')) {
        _e('Videos', 'silencio');
    } elseif (is_tax('post_format', 'post-format-quote')) {
        _e('Quotes', 'silencio');
    } elseif (is_tax('post_format', 'post-format-link')) {
        _e('Links', 'silencio');
    } elseif (is_tax('post_format', 'post-format-status')) {
        _e('Statuses', 'silencio');
    } elseif (is_tax('post_format', 'post-format-audio')) {
        _e('Audios', 'silencio');
    } elseif (is_tax('post_format', 'post-format-chat')) {
        _e('Chats', 'silencio');
    } else {
        _e('Archives', 'silencio');
    }
?>
                            </h1>
<?php
    $term_description = term_description();
    if (!empty($term_description)) {
        printf('<div class="taxonomy-description">%s</div>', $term_description);
    }
?>
                        </div>
                    </div>
                </section><!-- .hero.page-header -->

                <div class="tile is-ancestor">
<?php
    $count = 0;
    $cards_per_row = 2;
    while (have_posts()) {
        the_post();
        if ($count % $cards_per_row === 0) {
?>
                </div>
                <div class="tile is-ancestor">
<?php
        }
        $count++;
        get_template_part('content', get_post_format());
    }
?>
                </div><!-- .tile -->
<?php
    silencio_paging_nav();
} else {
    get_template_part('content', 'none');
}
?>
            </main><!-- #main -->
        </section><!-- #primary -->

<?php
get_sidebar('post');
?>
</div><!-- .columns -->
<?php
get_footer();
