
<?php

//customize method addition ($wp_customize)
//$wp_customize->add_section, $wp_customize->add_setting, $wp_customize->add_control
//add_control('handle_name', arra(label, section, settings, type= text/textarea/number/select/radio))
//for select/radio -> choices=> array('value'=> 'label')

//always use sanitize_callback at the add_setting. values are sanitize_text_field, esc_url_raw, absint

//WP customizer dashboard
function ifti_customizer_setting_calling($wp_customize){
    //
    // Header section //
    //
    
    //Creating a new section in custimizer dashboard
    $wp_customize->add_section('head_section', array(
        'title' => __('Header Section','iftidev')
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

    
    //Adding a new settings for menu pos -> logo height
    $wp_customize->add_setting('head_logo_height_setting', array(
        'default' => 40,
        'sanitize_callback' => function ($input){
            $input = absint($input);

            if($input < 40)
               return 40;
            else
                return $input;
        }
    ));

    //Giving control to the user to change menu pos -> logo height
    $wp_customize->add_control('head_logo_height_control', array(
        'label' => 'Logo Height',
        'section' => 'head_section',
        'settings' => 'head_logo_height_setting',
        'type' => 'number',
        'active_callback' => function ($control){ // based on this trigger it will be active
            return 'center_menu' === $control-> manager-> get_setting('head_menu_pos_setting') -> value();
        },
        'input_attrs' => array(
            'min' => 40, 
            'step' => 2 
        ),
    ));

    //Adding a new settings for menu pos -> logo container color
    $wp_customize->add_setting('head_logo_color_setting', array(
        'default' => '#b55d51',
    ));

    //Giving control to the user to change menu pos -> logo container color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'head_logo_color_control', array(
        'label' => 'Logo Background color',
        'section' => 'head_section',
        'settings' => 'head_logo_color_setting',
        'active_callback' => function ($control){ // based on this trigger it will be active
            return 'center_menu' === $control-> manager-> get_setting('head_menu_pos_setting') -> value();
        }
    )));



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
        'label' => 'Menu Height',
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

    //Adding a new settings for menu pos -> menu container color
    $wp_customize->add_setting('head_menu_color_setting', array(
        'default' => '#b55d51',
    ));

    //Giving control to the user to change menu pos -> menu container color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'head_menu_color_control', array(
        'label' => 'Menu Background color',
        'section' => 'head_section',
        'settings' => 'head_menu_color_setting',
        'active_callback' => function ($control){ // based on this trigger it will be active
            return 'center_menu' === $control-> manager-> get_setting('head_menu_pos_setting') -> value();
        }
    )));

    //
    // Footer section //
    //

    $wp_customize->add_section('footer_section', array(
        'title' => 'Footer Section'
    ));
    $year = date('y');
    $wp_customize->add_setting('footer_setting', array(
        'default' => "Copyright [year] Moms Recipe| Developed by <a href='https://linktr.ee/iftidev'>Mohammed Iftekhar</a>"
    ));
    $wp_customize->add_control('footer_control', array(
        'label' => 'Copyright Text',
        'settings' => 'footer_setting',
        'section' => 'footer_section',
        'type' => 'text',
        'description' => 'Short codes [copyright], [year]'
    ));
}
add_action('customize_register','ifti_customizer_setting_calling');