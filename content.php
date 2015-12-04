<article id="post-<?php the_ID(); ?>" <?php post_class('archive-article'); ?>>
    <header class="entry-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="entry-meta">
<?php
    silencio_posted_on();
?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="row">

<?php
if (has_post_thumbnail()) {
?>
        <div class="col-md-9">
            <div class="entry-summary">
<?php
    the_excerpt();
?>
            </div><!-- .entry-summary -->

            <footer class="footer-meta">
<?php
    silencio_footer_meta();
?>
            </footer><!-- .footer-meta -->
        </div><!-- .col-md-9-->
        <div class="col-md-3">
<?php
    the_post_thumbnail('blog-thumb');
?>
        </div><!-- .col-md-3-->
<?php
} else {
?>
        <div class="col-md-12">
            <div class="entry-summary">
<?php
    the_excerpt();
?>
            </div><!-- .entry-summary -->

            <footer class="footer-meta">
<?php
    silencio_footer_meta();
?>
            </footer><!-- .footer-meta -->
        </div><!-- .col-md-12-->
<?php
}
?>

    </div><!--.row -->
</article><!-- #post-## -->
