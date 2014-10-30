<article id="post-<?php the_ID(); ?>" <?php post_class('archive-article'); ?>>
    <div class="row">
<?php
if (has_post_thumbnail()) {
?>
        <div class="col-md-3">
<?php
    the_post_thumbnail('blog-thumb');
?>
        </div>
        <div class="col-md-9">
<?php
} else {
?>
        <div class="col-md-12">
<?php
}
?>
            <header class="entry-header">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <div class="entry-meta">
<?php
    silencio_posted_on();
?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->

            <div class="entry-summary">
<?php
    the_excerpt();
?>
            </div><!-- .entry-summary -->

            <footer class="footer-meta">
<?php
if ('post' == get_post_type()) {
    $categories_list = get_the_category_list(__(', ', 'silencio'));
    if ($categories_list && silencio_categorized_blog()) {
?>
                    <span class="cat-links">
<?php
        printf(__('Posted in %1$s', 'silencio'), $categories_list);
?>
                    </span>
<?php
    }

    $tags_list = get_the_tag_list('', __(', ', 'silencio'));

    if ($tags_list) {
?>
                    <span class="tags-links">
<?php
        printf(__('Tagged %1$s', 'silencio'), $tags_list);
?>
                    </span>
<?php
    }
}
?>
            </footer><!-- .footer-meta -->
        </div><!-- .col-md-->
    </div><!--.row -->
</article><!-- #post-## -->
