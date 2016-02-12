<?php
$widgetsDir = get_template_directory() . '/res/functions/widgets';

//Auto-load all widgets in res/functions/widgets
foreach (glob("$widgetsDir/*.php") as $file) {
    $widget = pathinfo($file, PATHINFO_FILENAME);

    require($file);
    add_action('widgets_init', function () use ($widget) {
        register_widget($widget);
    });
}
