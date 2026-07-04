
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
    $wp_customize-> add_panel('footer_panel',array(
        'title' => "Footer",
        'description' => 'All footer widgets and footer bottom can be edited from here'
    ));

    // Footer top section //

    // to get the widget from the widgets use - get_section(sidebar-widgets-enter the sidebar (widget) id).
    // then set its panel. I mean under which panel it would be added. I will create a new section under that panel with that widget.
    // so its basically saying get the sidebar widget whose name is ... if exists -> set it as a section under the panel ...
    // also they will be removed from widgets section as soon as they are added here
    if($wp_customize->get_section('sidebar-widgets-footer-column-1')){
        $wp_customize->get_section('sidebar-widgets-footer-column-1')->panel = 'footer_panel';
        //$wp_customize->get_section('sidebar-widgets-footer-column-1')->title = "dfgjdfnjdkafn";
    }
    if($wp_customize->get_section('sidebar-widgets-footer-column-2')){
        $wp_customize->get_section('sidebar-widgets-footer-column-2')->panel = 'footer_panel';
    }
    if($wp_customize->get_section('sidebar-widgets-footer-column-3')){
        $wp_customize->get_section('sidebar-widgets-footer-column-3')->panel = 'footer_panel';
    }
    if($wp_customize->get_section('sidebar-widgets-footer-column-4')){
        $wp_customize->get_section('sidebar-widgets-footer-column-4')->panel = 'footer_panel';
    }
    if($wp_customize->get_section('sidebar-widgets-footer-column-5')){
        $wp_customize->get_section('sidebar-widgets-footer-column-5')->panel = 'footer_panel';
    }

    // Footer bottom section //
    $wp_customize->add_section('footer_bottom_section', array(
        'title' => 'Footer Bottom',
        'panel' => 'footer_panel'
    ));
    $wp_customize->add_setting('footer_bottom_setting', array(
        'default' => "Copyright [year] Moms Recipe| Developed by <a href='https://linktr.ee/iftidev'>Mohammed Iftekhar</a>"
    ));
    $wp_customize->add_control('footer_top_control', array(
        'label' => 'Copyright Text',
        'settings' => 'footer_bottom_setting',
        'section' => 'footer_bottom_section',
        'type' => 'text',
        'description' => 'Short codes [copyright], [year]'
    ));
    
    //
    // Blog posts //
    //

    $wp_customize->add_section('post_section', array(
        'title' => "Blog Posts"
    ));


    $wp_customize->add_setting('post_excerpt_length_setting', array(
        'default' => 20
    ));
    $wp_customize->add_control('post_excerpt_length_control', array(
        'label' => 'Post Excerpt',
        'section' => 'post_section',
        'settings' => 'post_excerpt_length_setting',
        'type' => 'number',
    ));


    $wp_customize->add_setting('post_excerpt_more_setting', array(
        'default' => 'Read More'
    ));
    $wp_customize->add_control('post_excerpt_more_control', array(
        'label' => 'Post Excerpt More Text',
        'section' => 'post_section',
        'settings' => 'post_excerpt_more_setting',
        'type' => 'text',
    ));

    
    $wp_customize->add_setting('post_card_layout_setting', array(
        'default' => 'vertical',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    //
    // Side bar //
    //
    $wp_customize->add_panel('sidebar-panel',array(
        'title' => 'Sidebar',
        'description' => 'All sidebars can me customized from here'
    ));
    if($wp_customize->get_section('sidebar-widgets-sidebar-1')){
        $wp_customize->get_section('sidebar-widgets-sidebar-1')->panel = 'sidebar-panel';
    }

    //Giving control to the user to change menu pos
    $wp_customize->add_control('post_card_layout_control', array(
        'label' => 'Post Card Layout',
        'section' => 'post_section',
        'settings' => 'post_card_layout_setting',
        'type' => 'select',
        'choices' => array(
            "vertical" => "Vertical",
            "horizontal" => "Horizontal",
        )
    ));

    $wp_customize->add_setting('post_cards_per_row_setting', array(
        'default' => 3,
        'sanitize_callback' => function($input){
            $input = abs($input);
            if($input<1)
                $input = 1;
            else
                return $input;
        }
    ));

    //Giving control to the user to change menu pos
    $wp_customize->add_control('post_cards_per_row_control', array(
        'label' => 'Post Card Per Row',
        'section' => 'post_section',
        'settings' => 'post_cards_per_row_setting',
        'type' => 'number',
    ));

    $wp_customize->add_setting('post_cards_row_gap_setting', array(
        'default' => 20,
        'sanitize_callback' => function($input){
            $input = abs($input);
            if($input<1)
                $input = 1;
            else
                return $input;
        }
    ));

    //Giving control to the user to change card row gap
    $wp_customize->add_control('post_cards_row_gap_control', array(
        'label' => 'Post Card Row Gap',
        'section' => 'post_section',
        'settings' => 'post_cards_row_gap_setting',
        'type' => 'number',
    ));

    $wp_customize->add_setting('post_cards_radius_setting', array(
        'default' => 10,
        'sanitize_callback' => function($input){
            $input = abs($input);
            if($input<1)
                $input = 1;
            else
                return $input;
        }
    ));

    //Giving control to the user to change card radius
    $wp_customize->add_control('post_cards_radius_control', array(
        'label' => 'Post Card Radius',
        'section' => 'post_section',
        'settings' => 'post_cards_radius_setting',
        'type' => 'number',
    ));

    /*
        sidebar activation option
    */
   
}
add_action('customize_register','ifti_customizer_setting_calling');


// Blog posts modifying functionality according to customization
function post_excerpt_length(){
    $excerpt_length = get_theme_mod('post_excerpt_length_setting');
    return $excerpt_length;
}
add_filter("excerpt_length", "post_excerpt_length", 999);

function post_excerpt_more(){
    global $post;
    $excerpt_more_text = get_theme_mod('post_excerpt_more_setting');
    return '<a href="'. get_permalink($post->ID) . '">' . $excerpt_more_text . '</a>';
}
add_filter('excerpt_more', 'post_excerpt_more');