<?php

abstract class SilencioAbstractWidget extends WP_Widget {
    protected $fields = [];

    abstract protected function drawWidget($args, $instance);
    abstract protected function drawForm($instance);

    public function __construct($classname, $title, $description, $fields = []) {
        parent::__construct(
            $classname,
            $title,
            ['description' => $description]
        );

        $this->fields = $fields;
    }

    public function widget($args, $instance) {
        $this->drawWidget($args, $instance);
    }

    public function form($instance) {
        $this->drawForm($instance);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        foreach ($this->fields as $field) {
            $instance[$field] = strip_tags($new_instance[$field]);
        }

        return $instance;
    }
}
