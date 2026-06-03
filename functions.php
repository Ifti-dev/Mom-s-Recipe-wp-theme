<?php 
/*
*My theme function


//hooks -> wp_enqueue_scripts, customize_register
//css add-> wp_enqueue_style , js add-> wp_enqueue_script

//customize method addition ($wp_customize)
//$wp_customize->add_section, $wp_customize->add_setting, $wp_customize->add_control
//add_control('handle_name', arra(label, section, settings, type= text/textarea/number/select/radio))
//for select/radio -> choices=> array('value'=> 'label')

//always use sanitize_callback at the add_setting. values are sanitize_text_field, esc_url_raw, absint
*/

//Theme Title 
add_theme_support('title-tag');

//Theme css and js file calling
function  ifti_css_js_file_calling(){
    //style.css
    wp_enqueue_style( 'ifti-style', get_stylesheet_uri());
  
    //css
    wp_enqueue_style('index-style', get_theme_file_uri('css/index.css'),array(),'1.0.0','all');

    //js
    wp_enqueue_script('test-js', get_theme_file_uri('js/test.js'),array(), '1.0.0', true);


    //adding css based on menu position
    $menu_postion = get_theme_mod('head_menu_pos_setting');
    $menu_postion_css = null;
    
    if($menu_postion == "right_menu"){
       $menu_postion_css = "
        .header-wrapper{
            flex-direction: row-reverse;
        }";
    }
    else if($menu_postion == "center_menu"){
        $menu_postion_css = "
        .header-wrapper{
            width: 100%;
            flex-direction: column;
            max-width: 100%;
            padding: 0;
        }";
    }
    else{

    }

    wp_add_inline_style('index-style', $menu_postion_css);
    //'in which css file you wanna include the css' , 'style value'


    //for menu height (Active if menu_pos is set to -> center_menu)
    $menu_height = get_theme_mod('head_menu_height_setting') . 'px';
    $menu_css = "
        #header_menu{
            height: $menu_height ;
        }";
    wp_add_inline_style('index-style', $menu_css);

}
add_action('wp_enqueue_scripts','ifti_css_js_file_calling');// hook , strings


//WP customizer dashboard
function ifti_customizer_setting_calling($wp_customize){
    //Creating a new section in custimizer dashboard
    $wp_customize->add_section('head_section', array(
        'title' => __('Header Area','iftidev')
    ));



    //Adding a new settings in that section(text)
    $wp_customize->add_setting('head_web_name_setting', array(
        'default' => __('MOMS RECIPE', 'iftidev'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    //Giving control to the user to change value in that section(text)
    $wp_customize->add_control('head_section_control', array(
        'label' => 'Web Name',
        'section' => 'head_section',
        'settings' => 'head_web_name_setting',
        'type' => 'textarea'
    ));

    //Adding a new settings in that section(img)
    $wp_customize->add_setting('head_section_img_setting', array(
        'default' => get_theme_file_uri('img/biyani-home-hero-img.webp'),
        'sanitize_callback' => 'esc_url_raw'
    ));
    //Giving control to the user to change value in that section(img)
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'head_section_img_control', array(
        'label' => __('Hero Image', 'iftidev'),
        'section' => 'head_section',
        'settings' => 'head_section_img_setting',
        
    )));

    //Adding a new settings for menu pos
    $wp_customize->add_setting('head_menu_pos_setting', array(
        'default' => 'right_menu',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    //Giving control to the user to change menu pos
    $wp_customize->add_control('head_menu_pos_control', array(
        'label' => 'Menu Position',
        'section' => 'head_section',
        'settings' => 'head_menu_pos_setting',
        'type' => 'select',
        'choices' => array(
            "right_menu" => "Right Menu",
            "left_menu" => "Left Menu",
            "center_menu" => "Center Menu"
        )
    ));

    //Adding a new settings for menu pos -> menu height
    $wp_customize->add_setting('head_menu_height_setting', array(
        'default' => 40,
        'sanitize_callback' => function ($input){
            $input = absint($input);

            if($input < 40)
               return 40;
            else
                return $input;
        }
    ));

    //Giving control to the user to change menu pos -> menu height
    $wp_customize->add_control('head_menu_height_control', array(
        'label' => 'Menu Position',
        'section' => 'head_section',
        'settings' => 'head_menu_height_setting',
        'type' => 'number',
        'active_callback' => function ($control){ // based on this trigger it will be active
            return 'center_menu' === $control-> manager-> get_setting('head_menu_pos_setting') -> value();
        },
        'input_attrs' => array(
            'min' => 40, //its works only for arrow clicking so add the condition in add_setting
            'step' => 2 //how much to inc or dec when click up/down arrow
        ),
    ));
}
add_action('customize_register','ifti_customizer_setting_calling');


register_nav_menus(array(
    'main_menu'=> __('Main Menu', 'iftidev'),
    'footer_menu' => __('Footer Menu', 'iftidev')
));
