<?php
class SilencioCategoryPosts extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'SilencioCategoryPosts', // Base ID
            'Silencio Category Posts', // Name
            array('description' => 'The most recent posts in a category') // Args
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
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        $my_query = new WP_Query(array('category__in' => $instance['selected_cats'], 'posts_per_page' => 3));

        if ($my_query->have_posts()) {
?>
        <dl class="post list">
<?php
            while ($my_query->have_posts()) {
                $my_query->the_post();
?>
            <dt class="date"><?php the_time('M j'); ?></dt>
            <dd class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></dd>
<?php
            }
?>
        </dl>
        <p class="more"><a href="<?php echo get_permalink(get_option('page_for_posts'));?>" title="More News">More News</a></p>
<?php
        }
        wp_reset_query();
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
        $defaults = array('title' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'silencio'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <h4>Show Categories</h4>
    <div style="height:150px; overflow:auto; border:1px solid #dfdfdf;">
<?php

            $cats = get_terms('category', array('hide_empty' => false));

        foreach ($cats as $cat) {
            $instance['silencio-cat-' . $cat->term_id] = isset($instance['silencio-cat-' . $cat->term_id]) ? $instance['silencio-cat-' . $cat->term_id] : false;
?>
        <p><input class="checkbox" type="checkbox" <?php checked($instance['silencio-cat-' . $cat->term_id], true) ?> id="<?php echo $this->get_field_id('silencio-cat-' . $cat->term_id); ?>" name="<?php echo $this->get_field_name('silencio-cat-' . $cat->term_id); ?>" />
        <label for="<?php echo $this->get_field_id('silencio-cat-' . $cat->term_id); ?>"><?php echo $cat->name ?></label></p>
<?php
                unset($cat);
        }
?>
    </div>
<?php
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
        $instance['title'] = strip_tags($new_instance['title']);

        $cats = get_terms('category', array('hide_empty' => false));
        $selected_cats = array();

        foreach ($cats as $cat) {
            if (isset($new_instance['silencio-cat-' . $cat->term_id])) {
                $instance['silencio-cat-' . $cat->term_id] = 1;
                $selected_cats[] = $cat->term_id;
            } else {
                $instance['silencio-cat-' . $cat->term_id] = 0;
            }

            unset($cat);
        }

        // selected_cats is used in front end display of widget
        $instance['selected_cats'] = $selected_cats;

        return $instance;
    }
}


