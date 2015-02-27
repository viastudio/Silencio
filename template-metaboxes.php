<?php
/*
Template Name: Meta Boxes
*/
get_header();
?>
    <div id="primary-full" class="content-area">
        <main id="main" class="site-main" role="main">
<?php
while (have_posts()) {
    the_post();
    get_template_part('content', 'page');
    /*
    Use the_meta(); to view all meta data and keys as list
    */

    $name = get_post_meta($post->ID, 'silencio_name', true);
    $description = get_post_meta($post->ID, 'silencio_description', true);
    $select = get_post_meta($post->ID, 'silencio_select_example', true);
    $radio = get_post_meta($post->ID, 'silencio_radio_example', true);
    $authors = get_post_meta($post->ID, 'silencio_authors', true);
    $info = get_post_meta($post->ID, 'silencio_info', true);
    $links = (get_post_meta($post->ID, 'silencio_links', true));
    $and_one = (get_post_meta($post->ID, 'silencio_and_one', true));
    $and_one_group = (get_post_meta($post->ID, 'silencio_and_one_group', true));
    $docs = (get_post_meta($post->ID, 'silencio_docs', true));
    $image = (get_post_meta($post->ID, 'silencio_imgurl', true));
    $image2 = (get_post_meta($post->ID, 'silencio_imgurl2', true));

}
?>
            <p>This page displays information from meta boxes attached to the Meta Box page template.</p>
            <ul>
<?php
if (!empty($name)) {
?>
                <li><strong>Name: </strong><?php echo $name; ?></li>
<?php
}
if (!empty($description)) {
?>
                <li><strong>Description: </strong><?php echo $description; ?></li>
<?php
}
if (!empty($select)) {
?>
                <li><strong>Selected: </strong><?php echo $select; ?></li>
<?php
}
if (!empty($radio)) {
?>
                <li><strong>Radio: </strong><?php echo $radio; ?></li>
<?php
}
if (!empty($authors)) {
?>
                <li><strong>Authors: </strong></li>
                    <ul>
<?php
    foreach ($authors as $author) {
?>
                        <li><?php echo $author; ?></li>
<?php
    }
?>
                    </ul>
<?php
}
if (!empty($info)) {
?>
                        <li><strong>Info: </strong><?php echo $info; ?></li>
<?php
}
if (!empty($links)) {
?>
                        <li><strong>Links: </strong></li>
                            <ul>
<?php
    foreach ($links as $link) {
?>
                                <li><a rel="external" target="_blank" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
<?php
    }
?>
                            </ul>
<?php
}
if (!empty($and_one)) {
?>
                        <li><strong>And One:</strong></li>
                            <ul>
<?php
    foreach ($and_one as $one) {
?>
                                <li><?php echo $one; ?></li>
<?php
    }
?>
                            </ul>
<?php
}
if (!empty($and_one_group)) {
?>
                        <li><strong>And One Groups:</strong></li>
                            <ul>
<?php
    foreach ($and_one_group as $one_group) {
?>
                                <li><strong><?php echo $one_group['title']; ?>: </strong><?php echo $one_group['description']; ?></li>
<?php
    }
?>
                            </ul>
<?php
}
if (!empty($docs)) {
?>
                        <li><strong>Documents: </strong></li>
                            <ul>
<?php
    foreach ($docs as $doc) {
?>
                                <li><strong><a href="<?php echo $doc['link']; ?>"><?php echo $doc['title']; ?></a></strong></li>
                                    <ul>
                                        <li>Access: <?php echo $doc['access']; ?></li>
                                    </ul>
<?php
    }
?>
                            </ul>
<?php
}
if (!empty($image)) {
?>
                        <li><strong>Image 1: </strong></li>
                        <img src="<?php echo $image; ?>" alt="">
<?php
}
if (!empty($image2)) {
?>
                        <li><strong>Image 2: </strong></li>
                        <img src="<?php echo $image2; ?>" alt="">
<?php
}
?>

            </ul>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();

