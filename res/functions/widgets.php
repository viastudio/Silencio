<?php
$widgetsDir = get_template_directory() . '/res/functions/widgets';

//Add anything that shouldn't be registered as a widget here
$exclude = ['SilencioAbstractWidget'];

//Auto-load all widgets in res/functions/widgets
foreach (glob("$widgetsDir/*.php") as $file) {
    $widget = pathinfo($file, PATHINFO_FILENAME);

    require($file);

    if (in_array($widget, $exclude)) {
        continue;
    }

    add_action('widgets_init', function () use ($widget) {
        register_widget($widget);
    });
}
