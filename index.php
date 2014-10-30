<?php
get_header();
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

<?php
if (have_posts()) {
?>

            <header class="page-header">
                <h1 class="page-title">
<?php
    if (is_category()) {
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
            </header><!-- .page-header -->

<?php
    while (have_posts()) {
        the_post();
        get_template_part('content', get_post_format());
    }
    silencio_paging_nav();
} else {
    get_template_part('content', 'none');
}
?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_sidebar('post');
get_footer();
