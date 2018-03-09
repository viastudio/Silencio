<article id="post-<?php the_ID(); ?>" <?php post_class('archive-article tile is-parent is-6'); ?>>
    <div class="card">
<?php
if (has_post_thumbnail()) {
?>
        <div class="card-image">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <figure class="image is-2by1">
<?php
    the_post_thumbnail('blog-thumb');
?>
                </figure>
            </a>
        </div><!-- .card-image -->
<?php
}
?>
        <div class="card-content content">
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
        </div><!-- .card -->
    </div><!--.card-content -->
</article><!-- #post-## -->