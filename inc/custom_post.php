<?php

function custom_services(){
    register_post_type('recipes', array(
        'labels'=>array( //btn label, notice text...
            'name' => 'Recipes',
            'add_new' => 'Add Recipe',
            'singular_name' => 'Recipe',
            'add_new_item' => 'Add new recipe',
            'not_found' => 'No recipe found',
            'view_item' => 'Edit recipe'
            
        ),
        'menu_icon' => 'dashicons-editor-insertmore',//on dashboard icon
        'public' => true,
        'public_queryable' => true, //publicly searchable
        'menu_position' => 6, //postion on dashboard (check the dashboard application postion list)
        'has_archive' => true, //archivable
        // 'hierarchical' => true,
        // 'show_ui' => true,
        // 'capability_type' => 'post',
        // 'rewrite' => array('slag' => 'servicess'),
        'supports' => array('title','thumbnail','editor') //supported editing features
    ));
}
add_action('init', 'custom_services');