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
    register_sidebar(array(
        'name' => __('Footer widget 1', 'iftidev'),
        'id' => 'footer-column-1',
        'description' => 'This is the footer widgets option',
        'before_widget' => '<div class="footer-widget-block">', //it be the container for each part of the footer element
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Footer widget 2', 'iftidev'),
        'id' => 'footer-column-2',
        'description' => 'This is the footer widgets option',
        'before_widget' => '<div class="footer-widget-block">', //it be the container for each part of the footer element
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Footer widget 3', 'iftidev'),
        'id' => 'footer-column-3',
        'description' => 'This is the footer widgets option',
        'before_widget' => '<div class="footer-widget-block">', //it be the container for each part of the footer element
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Footer widget 4', 'iftidev'),
        'id' => 'footer-column-4',
        'description' => 'This is the footer widgets option',
        'before_widget' => '<div class="footer-widget-block">', //it be the container for each part of the footer element
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Footer widget 5', 'iftidev'),
        'id' => 'footer-column-5',
        'description' => 'This is the footer widgets option',
        'before_widget' => '<div class="footer-widget-block">', //it be the container for each part of the footer element
        'after_widget' => '</div>'
    ));
}
add_action('widgets_init', 'ifti_widget');