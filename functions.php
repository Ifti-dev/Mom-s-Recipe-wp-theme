<?php 
/*
*My theme function

//hooks -> wp_enqueue_scripts, customize_register
//css add-> wp_enqueue_style , js add-> wp_enqueue_script
*/

//Theme Title on the boswer tab ie title
add_theme_support('title-tag');

//Adding thumbnail addig option on diff. post types
add_theme_support('post-thumbnails', array('page','post'));
add_image_size("post-card-thumbnail", 270, 270, true);


//All the scripts css,js
include_once("inc/enqueue.php");

//Theme customizer functionality
include_once("inc/theme_customize.php");

register_nav_menus(array(
    'main_menu'=> __('Main Menu', 'iftidev'),
    'footer_menu' => __('Footer Menu', 'iftidev')
));



