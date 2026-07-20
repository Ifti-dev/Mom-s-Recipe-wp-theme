
<!-- 

    This template is for post cards/archive

-->

<div class="home-content">
                <div class="blog-card-parent-container">
                    <div class="blog-card-container">
                        <!-- all blog card goes here using js by collecting data from localstorage -->
                        <?php
                            if(have_posts()):
                                while(have_posts()): the_post();
                        ?>
                                <div class="blog-card">
                                    <div class="blog-card-img-container">
                                        <a href="<?php the_permalink() ?>"> <?php the_post_thumbnail("post-card-thumbnail") ?></a>
                                    </div>
                                    <div class="blog-card-body">
                                        <h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
                                        <p><?php //the_content() ?>
                                        <?php the_excerpt() ?></p>
                                        <div class="blog-card-user">
                                            <div class="blog-card-user-img-cont">
                                                <!-- user img -->
                                                <?php echo get_avatar(get_the_author_meta("ID"),100);?>
                                            </div>
                                            <p class="blog-card-user-fullname">
                                                <?php the_author_posts_link(); ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>         
                        <?php endwhile; 
                        endif;?>
                    </div>
                    <?php ifti_page_nav(); ?>
                </div>
                <div class="home-sidebar">
                    <?php
                        if(is_active_sidebar('sidebar-1'))
                            get_sidebar() ?>
                </div>
            </div>