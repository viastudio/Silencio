<?php
if (has_post_thumbnail()) {
?>
    <div id="featured-image">
<?php
    the_post_thumbnail('header-thumb');
?>
    </div>
<?php
}
?>
