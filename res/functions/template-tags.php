<?php
/**
 * Custom template tags for this theme.
 *
 * @package Silencio
 */

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function silencio_setup_author() {
    $wp_query = $GLOBALS['wp_query'];

    if ($wp_query->is_author() && isset($wp_query->post)) {
        $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
    }
}
add_action('wp', 'silencio_setup_author');


if (! function_exists('silencio_paging_nav')) {
    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @return void
     */
    function silencio_paging_nav() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
?>
        <nav class="navigation paging-navigation" role="navigation">
            <div class="nav-links">

<?php
        if (get_next_posts_link()) {
?>
                <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'silencio')); ?></div>
<?php
        }
        if (get_previous_posts_link()) {
?>
                <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'silencio')); ?></div>
<?php
        }
?>

            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
<?php
    }
}

if (!function_exists('silencio_paging_numeric')) {
    function silencio_paging_numeric() {
        $wp_query = $GLOBALS['wp_query'];
        $big = 999999999; // need an unlikely integer
        $pages = paginate_links([
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next' => true,
            'prev_text' => __('prev'),
            'next_text' => __('next'),
        ]);
        if (is_array($pages)) {
            $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
            echo '<div class="pagination-container"><ul class="pagination">';
            foreach ($pages as $page) {
                echo "<li>$page</li>";
            }
            echo '</ul></div>';
        }
    }
}

if (! function_exists('silencio_post_nav')) {
    /**
     * Display navigation to next/previous post when applicable.
     *
     * @return void
     */
    function silencio_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next     = get_adjacent_post(false, '', false);

        if (! $next && ! $previous) {
            return;
        }
?>
    <nav class="navigation post-navigation" role="navigation">
        <div class="nav-links">
<?php
        previous_post_link('<div class="nav-previous">%link</div>', _x('<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'silencio'));
        next_post_link('<div class="nav-next">%link</div>', _x('%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'silencio'));
?>
        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
<?php
    }
}

if (! function_exists('silencio_comment')) {
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function silencio_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) {
?>

    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <div class="comment-body">
<?php
            _e('Pingback:', 'silencio');
            comment_author_link();
            edit_comment_link(__('Edit', 'silencio'), '<span class="edit-link">', '</span>');
?>
        </div>

<?php
        } else {
?>

    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
<?php
            if (0 != $args['avatar_size']) {
                echo get_avatar($comment, $args['avatar_size']);
            }

            printf(__('%s <span class="says">says:</span>', 'silencio'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
?>
                </div><!-- .comment-author -->

                <div class="comment-metadata">
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
<?php
            printf(_x('%1$s at %2$s', '1: date, 2: time', 'silencio'), get_comment_date(), get_comment_time());
?>
                        </time>
                    </a>
<?php
            edit_comment_link(__('Edit', 'silencio'), '<span class="edit-link">', '</span>');
?>
                </div><!-- .comment-metadata -->

<?php
            if ('0' == $comment->comment_approved) {
?>
                <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'silencio'); ?></p>
<?php
            }
        }
?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
<?php
        comment_text();
?>
            </div><!-- .comment-content -->

<?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply">',
                    'after'     => '</div>'
                )
            )
        );
?>
        </article><!-- .comment-body -->

<?php
    }
}

if (!function_exists('silencio_posted_on')) {
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function silencio_posted_on() {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        printf(
            __('<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'silencio'),
            sprintf(
                '<a href="%1$s" rel="bookmark">%2$s</a>',
                esc_url(get_permalink()),
                $time_string
            ),
            sprintf(
                '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                esc_html(get_the_author())
            )
        );
    }
}

if (!function_exists('silencio_footer_meta')) {
    /**
     * Footer meta
     */
    function silencio_footer_meta() {
        $category_list = get_the_category_list(__(', ', 'silencio'));
        $tag_list = get_the_tag_list('', __(', ', 'silencio'));
        if (has_category()) {
            printf("<span>Categories: %s </span>", $category_list, get_permalink());
        }
        if (has_tag()) {
            printf("<span> | Tags: %s </span>", $tag_list, get_permalink());
        }

    }
}

/**
 * Returns true if a blog has more than 1 category.
 */
function silencio_categorized_blog() {
    if (
        false === (
            $all_the_cool_cats = get_transient('all_the_cool_cats'))) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'hide_empty' => 1
        ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('all_the_cool_cats', $all_the_cool_cats);
    }

    if ('1' != $all_the_cool_cats) {
        // This blog has more than 1 category so silencio_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so silencio_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in silencio_categorized_blog.
 */
function silencio_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient('all_the_cool_cats');
}
add_action('edit_category', 'silencio_category_transient_flusher');
add_action('save_post', 'silencio_category_transient_flusher');
