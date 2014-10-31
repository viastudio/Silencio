<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
<?php
silencio_posted_on();
?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
<?php
the_content();
?>
    </div><!-- .entry-content -->

    <footer class="footer-meta">
<?php
$category_list = get_the_category_list(__(', ', 'silencio'));
$tag_list = get_the_tag_list('', __(', ', 'silencio'));
if (! silencio_categorized_blog()) {
    if ('' != $tag_list) {
        $meta_text = __('This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'silencio');
    } else {
        $meta_text = __('Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'silencio');
    }
} else {
    if ('' != $tag_list) {
         $meta_text = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'silencio');
    } else {
        $meta_text = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'silencio');
    }
}
printf($meta_text, $category_list, $tag_list, get_permalink());
?>
    </footer><!-- .footer-meta -->
</article><!-- #post-## -->
