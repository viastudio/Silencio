<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

<?php
if (have_comments()) {
?>
    <h2 class="comments-title">
<?php
    printf(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'silencio'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
?>
    </h2>

<?php
    if (get_comment_pages_count() > 1 && get_option('page_comments')) {
?>
        <nav id="comment-nav-above" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Comment navigation', 'silencio'); ?></h1>
            <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'silencio')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'silencio')); ?></div>
        </nav><!-- #comment-nav-above -->
<?php
    }
?>

    <ol class="comment-list">
<?php
    wp_list_comments(array('callback' => 'silencio_comment'));
?>
    </ol><!-- .comment-list -->

<?php
    if (get_comment_pages_count() > 1 && get_option('page_comments')) {
?>
        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Comment navigation', 'silencio'); ?></h1>
            <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'silencio')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'silencio')); ?></div>
        </nav><!-- #comment-nav-below -->
<?php
    }
}

if (! comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) {
?>
    <p class="no-comments"><?php _e('Comments are closed.', 'silencio'); ?></p>
<?php
}

comment_form();
?>

</div><!-- #comments -->
