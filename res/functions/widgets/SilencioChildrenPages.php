<?php
class SilencioChildrenPages extends WP_Widget {
    /**
    * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
        'SilencioChildrenPages', // Base ID
        'Silencio Children Pages', // Name
        array('description' => 'Displays child pages for the current page, with the parent page as the widget title.') // Args
    );
}
/**
* Front-end display of widget.
*
* @see WP_Widget::widget()
*
* @param array $args     Widget arguments.
* @param array $instance Saved values from database.
*/
    public function widget($args, $instance) {
        $post = $GLOBALS['post'];
        $top_ancestor = get_page(array_reverse(get_post_ancestors($post->ID))[0]);
        $title = get_the_title($top_ancestor->ID);
        extract($args);
        if ($post->post_parent) {
            $children = wp_list_pages("title_li=&child_of=" . $top_ancestor->ID . "&echo=0");
        } else {
            $children = wp_list_pages("title_li=&child_of=" . $post->ID . "&echo=0");
        }
        $title = apply_filters('widget_title', $title);
        if ($children) {
            echo $before_widget;
            if (!empty($title)) {
                echo $before_title . '<a href="' . get_permalink($top_ancestor->ID) . '">' . $title . '</a>' . $after_title;
            }
?>
        <ul class="nav-parent">
<?php
        echo $children;
?>
        </ul>

<?php
        }
            echo $after_widget;
    }

/**
* Back-end widget form.
*
* @see WP_Widget::form()
*
* @param array $instance Previously saved values from database.
*/
public function form($instance) {
    /* Set up some default widget settings. */
?>

    <p>This widget lists all child pages of the current parent. It displays nothing if there aren't any children.</p>

    <?php
    $defaults = array();
    $instance = wp_parse_args((array) $instance, $defaults);
}
/**
* Sanitize widget form values as they are saved.
*
* @see WP_Widget::update()
*
* @param array $new_instance Values just sent to be saved.
* @param array $old_instance Previously saved values from database.
*
* @return array Updated safe values to be saved.
*/
public function update($new_instance, $old_instance) {
    $instance = $old_instance;
    return $instance;
}
}
