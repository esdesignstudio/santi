<?php 
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name' => __('小工具一', 'easondesign_lang'),
        'description' => __('Description for this widget-area...', 'easondesign_lang'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('小工具二', 'easondesign_lang'),
        'description' => __('Description for this widget-area...', 'easondesign_lang'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
?>