<?php

    function social_shortcode($att){
        $values = shortcode_atts(array(
            'link' => '#',
            'text' => 'facebook',
            'icon' => 'facebook' ,
            'icon-type' => '',
            'color' => '#b55d51'
        ),$att);
        $icon_type = !empty($values['icon-type'])? $values['icon-type'] . '-': '';
        $icon = strtolower($values['icon']);
        $color = strtolower($values['color']);
        return '<div class="social_box">
                <i class="fa-brands fa-' . esc_attr($icon_type) . esc_attr($icon) . '" style="color:' . esc_attr($color) .';"></i>
                <a href="' . esc_url($values['link']) . '">'. esc_html($values['text']) . '</a>
            </div>';
    }
    add_shortcode('social', 'social_shortcode');