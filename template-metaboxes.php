<?php
/*
Template name: Meta Boxes
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

    // NOT WORKING
    $prefix = 'silencio_';
    $text_taxonomy_radio = (get_post_meta($post->ID, $prefix . 'text_taxonomy_radio', true));
    $taxonomy_select = (get_post_meta($post->ID, $prefix . 'taxonomy_select', true));
    $taxonomy_radio = (get_post_meta($post->ID, $prefix . 'taxonomy_radio', true));
    $taxonomy_multicheck = (get_post_meta($post->ID, $prefix, 'multitaxonomy', true));
    // WOrking
    $text = get_post_meta($post->ID, $prefix . 'text', true);
    $textsmall = get_post_meta($post->ID, $prefix . 'textsmall', true);
    $textmedium = get_post_meta($post->ID, $prefix . 'textmedium', true);
    $url = get_post_meta($post->ID, $prefix . 'url', true);
    $email = get_post_meta($post->ID, $prefix . 'email', true);
    $time = get_post_meta($post->ID, $prefix . 'time', true);
    $timezone = (get_post_meta($post->ID, $prefix . 'timezone', true));
    $textdate = (get_post_meta($post->ID, $prefix . 'textdate', true));
    $textdate_timestamp = (get_post_meta($post->ID, $prefix . 'textdate_timestamp', true));
    $datetime_timestamp = (get_post_meta($post->ID, $prefix . 'datetime_timestamp', true));
    $textmoney = (get_post_meta($post->ID, $prefix . 'textmoney', true));
    $colorpicker = (get_post_meta($post->ID, $prefix . 'colorpicker', true));
    $textarea = (get_post_meta($post->ID, $prefix . 'textarea', true));
    $textareasmall = (get_post_meta($post->ID, $prefix . 'textareasmall', true));
    $textarea_code = (get_post_meta($post->ID, $prefix . 'textarea_code', true));
    $select = (get_post_meta($post->ID, $prefix . 'select', true));
    $radio_inline = (get_post_meta($post->ID, $prefix . 'radio_inline', true));
    $radio = (get_post_meta($post->ID, $prefix . 'radio', true));

    $checkbox = (get_post_meta($post->ID, $prefix . 'checkbox', true));
    $multicheckbox = (get_post_meta($post->ID, $prefix . 'multicheckbox', true));
    $wysiwyg = (get_post_meta($post->ID, $prefix . 'wysiwyg', true));
    $embed = (get_post_meta($post->ID, $prefix . 'embed', true));
    $image = (get_post_meta($post->ID, $prefix . 'image', true));
    $file_list = (get_post_meta($post->ID, $prefix . 'file_list', true));
    $parameters = (get_post_meta($post->ID, $prefix . 'parameters', true));

}
?>
            <p>This page displays timermation from meta boxes attached to the Meta Box page template.</p>
            <ul>
<?php
if (!empty($metabox)) {
?>
                <li><strong>Metabox: </strong> <?php echo $metabox; ?></li>
<?php
}
if (!empty($text)) {
?>
                <li><strong>Text: </strong> <?php echo $text; ?></li>
<?php
}
if (!empty($textsmall)) {
?>
                <li><strong>Textsmall: </strong> <?php echo $textsmall; ?></li>
<?php
}
if (!empty($textmedium)) {
?>
                <li><strong>Textmedium: </strong> <?php echo $textmedium; ?></li>
<?php
}
if (!empty($url)) {
?>
                <li><strong>Url: </strong> <?php echo $url; ?></li>
<?php
}
if (!empty($email)) {
?>
                <li><strong>Email: </strong> <?php echo $email; ?></li>
<?php
}
if (!empty($time)) {
?>
                        <li><strong>Time: </strong> <?php echo $time; ?></li>
<?php
}
if (!empty($timezone)) {
?>
                        <li><strong>Timezone: </strong> <?php echo $timezone; ?></li>
<?php
}
if (!empty($textdate)) {
?>
                        <li><strong>Textdate:</strong> <?php echo $textdate; ?></li>
<?php
}
if (!empty($textdate_timestamp)) {
?>
                        <li><strong>Textdate Timezone:</strong> <?php echo $textdate_timestamp; ?></li>
<?php
}
if (!empty($datetime_timestamp)) {
?>
                        <li><strong>Textdate Timezone:</strong> <?php echo $datetime_timestamp; ?></li>
<?php
}
if (!empty($textmoney)) {
?>
                        <li><strong>Money:</strong> <?php echo $textmoney; ?></li>
<?php
}
if (!empty($colorpicker)) {
?>
                        <li><strong>Colorpicker:</strong> <?php echo $colorpicker; ?></li>
<?php
}
if (!empty($textarea)) {
?>
                        <li><strong>Textarea:</strong> <?php echo $textarea; ?></li>
<?php
}
if (!empty($textareasmall)) {
?>
                        <li><strong>Textarea Small:</strong> <?php echo $textareasmall; ?></li>
<?php
}
if (!empty($textarea_code)) {
?>
                        <li><strong>Textarea Code:</strong> <?php echo $textarea_code; ?></li>
<?php
}
if (!empty($title)) {
?>
                        <li><strong>Title:</strong> <?php echo $title; ?></li>
<?php
}
if (!empty($select)) {
?>
                        <li><strong>Select:</strong> <?php echo $select; ?></li>
<?php
}
if (!empty($radio_inline)) {
?>
                        <li><strong>Radio Inline:</strong> <?php echo $radio_inline; ?></li>
<?php
}
if (!empty($radio)) {
?>
                        <li><strong>Radio:</strong> <?php echo $radio; ?></li>
<?php
}
// if (!empty($text_taxonomy_radio)) {
?>
                        <li><strong>Text taxonomy radio:</strong> <?php echo $text_taxonomy_radio; ?></li>
<?php
// }
// if (!empty($taxonomy_select)) {
?>
                        <li><strong>Taxonomy Select:</strong> <?php echo $taxonomy_select; ?></li>
<?php
// }
// if (!empty($taxonomy_multicheck)) {
?>
                        <li><strong>Taxonomy Multiple:</strong> <?php echo $taxonomy_multicheck; ?></li>
<?php
// }
if (!empty($checkbox)) {
?>
                        <li><strong>Checkbox:</strong> <?php echo $checkbox; ?></li>
<?php
}
if (!empty($multicheckbox)) {
?>
                        <li><strong>Multi-checkbox:</strong>
                            <ul>
<?php
    foreach ($multicheckbox as $single_checkbox) {
?>
                            <li><?php echo $single_checkbox; ?></li>
<?php
    }
?>
                            </ul>
                        </li>
<?php
}
if (!empty($wysiwyg)) {
?>
                        <li><strong>WYSIWYG:</strong> <?php echo $wysiwyg; ?></li>
<?php
}
if (!empty($image)) {
?>
                        <li><strong>Image:</strong> <img src="<?php echo $image; ?>" alt=""></li>
<?php
}
if (!empty($embed)) {
?>
                        <li><strong>Embed:</strong></li>
<?php
    echo $embed;
}
if (!empty($embed)) {
?>
                        <li><strong>File list:</strong>
                            <ul>
<?php
    foreach ($file_list as $file) {
?>
                                <li><?php echo $file; ?></li>
<?php
    }
?>
                            </ul>
                        </li>
<?php
}
if (!empty($parameters)) {
?>
                        <li><strong>Parameters:</strong> <?php echo $parameters; ?></li>
<?php
}
?>

            </ul>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();

