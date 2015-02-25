<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
if (has_post_thumbnail()) {
    the_post_thumbnail('header-thumb');
}
?>
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
silencio_footer_meta();
?>
    </footer><!-- .footer-meta -->
</article><!-- #post-## -->
