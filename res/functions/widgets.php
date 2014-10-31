<?php
require(get_template_directory() . '/res/functions/widgets/SilencioCategoryPosts.php');
require(get_template_directory() . '/res/functions/widgets/SilencioChildrenPages.php');

// register SilencioCategoryPosts & SilencioChildrenPages widgets
add_action('widgets_init', create_function('', 'register_widget("SilencioCategoryPosts");'));
add_action('widgets_init', create_function('', 'register_widget("SilencioChildrenPages");'));
