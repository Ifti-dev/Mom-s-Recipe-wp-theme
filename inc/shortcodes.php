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

    function recipe_archive_shortcode($att){
        $values = shortcode_atts(array(
            'orientation' => 'vertical',
            'num-columns' => '1',
            'num-post' => '1'
        ),$att);
        $orientation = $values['orientation'];
        if(!empty($values['orientation'])){
            if($values['orientation'] == 'horizontal')
                $orientation = 'flex-direction: row;';
            else if($values['orientation'] == 'vertical')
                $orientation = 'flex-direction: column;';
        }
        
        ob_start();
        ?>

        <div class="home-content">
            <div class="recipe-card-parent-container" style="width: 100%;">
                <div class="recipe-card-container" style="grid-template-columns:  repeat(<?php echo esc_attr($values['num-columns']); ?>, 1fr);">
                    <!-- all recipe card goes here using js by collecting data from localstorage -->
                    <?php
                        $paged = get_query_var('paged')?get_query_var('paged'):1;
                        
                        $args = array(
                            'post_type' => 'recipes',
                            'post_status' => 'publish',
                            'posts_per_page' => $values['num-post'],
                            'order' => 'ASC',
                            'orderby' => 'date', //title, date, rand, ID
                            'paged' => $paged //need this to understand which page window to load(to count the offset for posts per page) 
                        );

                        //for custom post types we need custom query and pass the args above
                        $recipe_query = new WP_Query($args);
                        
                        if($recipe_query->have_posts()):
                            while($recipe_query->have_posts()): $recipe_query->the_post();
                    ?>
                            <div class="recipe-card" style="<?php echo esc_attr($orientation)?>">
                                <div class="recipe-card-img-container">
                                    <a href="<?php the_permalink() ?>"> <?php the_post_thumbnail("post-card-thumbnail") ?></a>
                                </div>
                                <div class="recipe-card-body">
                                    <h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
                                    <p><?php //the_content() ?>
                                    <?php //the_excerpt() ?></p>
                                    <div class="recipe-card-user">
                                        <div class="recipe-card-user-img-cont">
                                            <!-- user img -->
                                            <?php echo get_avatar(get_the_author_meta("ID"),100);?>
                                        </div>
                                        <p class="recipe-card-user-fullname">
                                            <?php the_author_posts_link(); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>         
                    <?php endwhile; endif;
                    wp_reset_postdata();?>
                </div>
                <?php ifti_page_nav($recipe_query); ?>
            </div>
            
        </div>
        <?php
        $buffering = ob_get_clean();
        return $buffering;
    }
    add_shortcode('recipe-archive', 'recipe_archive_shortcode');