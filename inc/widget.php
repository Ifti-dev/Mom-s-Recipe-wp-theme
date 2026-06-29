<?php
//sidebar widget
function ifti_widget(){
    register_sidebar(array(
        'name' => __('Home sidebar', 'iftidev'),
        'id' => 'sidebar-1',
        'description' => 'This is the home sidebard which can be activated from theme customization and edited from widget customization.',
        'before_widget' => '<div class="child_sidebar">', //it be the container for each part of the sidebard
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title">',
        'after_title' => "</div>"
    ));
}
add_action('widgets_init', 'ifti_widget');