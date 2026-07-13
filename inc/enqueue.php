<?php
//Theme css and js file calling
function  ifti_css_js_file_calling(){
    //style.css
    wp_enqueue_style( 'ifti-style', get_stylesheet_uri(),array(), filemtime(get_theme_file_path('style.css')));
  
    //css
    //filemtime()  gives us the latest updated file thats location is specified
    wp_enqueue_style('index-style', get_theme_file_uri('css/index.css'),array(),filemtime( get_theme_file_path('css/index.css') ),'all'); 
    wp_enqueue_style('archive-style', get_theme_file_uri('css/recipe-archive.css'),array(),filemtime(get_theme_file_path('css/recipe-archive.css')),'all');
    wp_enqueue_style('single-post-style', get_theme_file_uri('css/single-recipe.css'),array(),filemtime(get_theme_file_path('css/single-recipe.css')),'all');

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
    if(!empty($menu_postion_css))
        wp_add_inline_style('index-style', $menu_postion_css);
    //'in which css file you wanna include the css' , 'style value'


    //for menu height (Active if menu_pos is set to -> center_menu)
    $menu_height = get_theme_mod('head_menu_height_setting') . 'px';
    $logo_height = get_theme_mod('head_logo_height_setting') . 'px';
    $logo_bg_color = get_theme_mod('head_logo_color_setting');
    $menu_bg_color = get_theme_mod('head_menu_color_setting');
    $menu_css = "
        
       
        .logo-container {
            height: $logo_height ;
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            background-color: $logo_bg_color;
        }
        .logo-wrapper{
            display:flex;
            justify-content:center;
            align-items:center;
            max-width:1160px;
            width:100%;
            height:100%;
        }

        .header-nav{
            background-color: $menu_bg_color;
        } 
        #header_menu{
            height: $menu_height ;
            max-width:1160px ;
            width:100%;
        } 
        ";
    //so that the menu height stays default if !center_menu(bug-fix)
    if($menu_postion == "center_menu") 
        wp_add_inline_style('index-style', $menu_css);

    //adding css based on post card alignment
    $post_card_css = '
    .recipe-card{
            flex-direction: row;
    }
   
    ';
    if(get_theme_mod('post_card_layout_setting') == 'horizontal')
        wp_add_inline_style('archive-style',$post_card_css);

    //adding css based on post card number per row
    $post_card_num_per_row = get_theme_mod('post_cards_per_row_setting');
    $post_card_row_gap = get_theme_mod('post_cards_row_gap_setting');
    $post_card_radius = get_theme_mod('post_cards_radius_setting');
    $post_card_css = "
    
    .recipe-card-container{
        grid-template-columns:  repeat($post_card_num_per_row, 1fr);
        gap: $post_card_row_gap" . "px;
    }
    .recipe-card{
        border-radius:$post_card_radius" . "px;
    }
    ";
    
    wp_add_inline_style('archive-style',$post_card_css);

}
add_action('wp_enqueue_scripts','ifti_css_js_file_calling');// hook , strings
