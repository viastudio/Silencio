<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
if (has_post_thumbnail()) {
    the_post_thumbnail('header-thumb');
}
?>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content">
<?php
the_content();
?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
