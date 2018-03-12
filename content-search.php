<article id="post-<?php the_ID(); ?>" <?php post_class('archive-article columns'); ?>>
<?php
if (has_post_thumbnail()) {
?>
        <div class="column is-one-quarter">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
<?php
    the_post_thumbnail('blog-thumb');
?>
            </a>
        </div><!-- .column -->
<?php
}
?>
        <div class="column">
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <div class="entry-meta">
<?php
    silencio_posted_on();
?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->
            <div class="entry-summary content">
<?php
    the_excerpt();
?>
            </div><!-- .entry-summary -->


            <footer class="footer-meta">
<?php
    silencio_footer_meta();
?>
            </footer><!-- .footer-meta -->
        </div>
</article>
