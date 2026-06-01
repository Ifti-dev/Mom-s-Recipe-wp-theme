<?php 
/*
*My theme function
*/

//Theme Title 
add_theme_support('title-tag');

//The,e css and js file calling
function  ifti_css_js_file_calling(){
    wp_enqueue_style( 'ifti-style', get_stylesheet_uri());
    //This function tells WordPress to safely add the stylesheet to the page queue.
    //'handle-> unique nickname help in identify', 'the url path(src) initially the style.css'
    
    //for other extra files you 1st wp_register(no need if you directly call it just add all at=>) then => wp_enqueue
    wp_enqueue_style('index-style', get_theme_file_uri('css/index.css'),array(),'1.0.0','all');

    //scripts
    wp_enqueue_script('test-js', get_theme_file_uri('js/test.js'),array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts','ifti_css_js_file_calling');// hook , strings
//'I am about to load css and js files' , function call

function ifti_customizer_setting_calling($wp_customize){
    $wp_customize->add_section('head_section', array(
        'title' => __('header','iftidev')
    ));
    $wp_customize->add_setting('head_section_setting', array(
        'default' => __('MOMS RECIPE', 'iftidev'),
        'sanitize_callback' => 'sanitize_text_field'

    ));
    $wp_customize->add_control('head_section_control', array(
        'label' => 'Web Name',
        'section' => 'head_section',
        'settings' => 'head_section_setting',
        'type' => 'text'
    ));

    $wp_customize->add_setting('head_section_img_setting', array(
        'default' => get_theme_file_uri('img/biyani-home-hero-img.webp'),
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'head_section_img_control', array(
        'label' => 'Hero Image',
        'section' => 'head_section',
        'settings' => 'head_section_img_setting',
        
    )));
}
add_action('customize_register','ifti_customizer_setting_calling');