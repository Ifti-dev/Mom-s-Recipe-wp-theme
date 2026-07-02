<!-- 

    This template is for all pages (not for blog posts) 

-->


<div class="home-content">
    <div class="recipe-card-parent-container">
        <div class="recipe-card-container">
            <!-- all recipe card goes here using js by collecting data from localstorage -->
            <?php
                if(have_posts()):
                    while(have_posts()): the_post();
            ?>
                    <div class="recipe-card">
                        <div class="recipe-card-img-container">
                            <a href="<?php the_permalink() ?>"> <?php the_post_thumbnail("post-card-thumbnail") ?></a>
                        </div>
                        <div class="recipe-card-body">
                            <h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
                            <div class="recipe-card-user">
                                <div class="recipe-card-user-img-cont">
                                    <!-- user img -->
                                    <?php echo get_avatar(get_the_author_meta("ID"),100);?>
                                </div>
                                <p class="recipe-card-user-fullname">
                                    <?php the_author_posts_link(); ?>
                                    </a>
                                </p>
                            </div>
                            <p><?php //the_content() ?>
                            <?php the_content() ?></p>
                            
                        </div>
                    </div>         
            <?php endwhile; 
            endif;?>
        </div>
    </div>
    <div class="home-sidebar">
        <?php
            if(is_active_sidebar(get_sidebar()))
                get_sidebar() ?>
    </div>
</div>