
<!-- 

    This template is for recipe cards/archive

-->

<div class="home-content">
                <div class="recipe-card-parent-container">
                    <div class="recipe-card-container">
                        <!-- all recipe card goes here using js by collecting data from localstorage -->
                        <?php
                            $paged = get_query_var('paged')?get_query_var('paged'):1;
                            
                            $args = array(
                                'post_type' => 'recipes',
                                'post_status' => 'publish',
                                'posts_per_page' => 2,
                                'order' => 'ASC',
                                'paged' => $paged //need this to understand which page window to load(to count the offset for posts per page) 
                            );

                            //for custom post types we need custom query and pass the args above
                            $recipe_query = new WP_Query($args);
                            
                            if($recipe_query->have_posts()):
                                while($recipe_query->have_posts()): $recipe_query->the_post();
                        ?>
                                <div class="recipe-card">
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
                        <?php endwhile; 
                        endif;?>
                    </div>
                    <?php ifti_page_nav($recipe_query); ?>
                </div>
                <!-- <div class="home-sidebar">
                    <?php
                        // if(is_active_sidebar(get_sidebar()))
                            // get_sidebar() ?>
                </div> -->
            </div>