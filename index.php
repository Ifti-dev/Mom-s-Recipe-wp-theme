
<?php get_header() ?>
    <main class="main-without-sidebar">
        <!-- home hero section -->
        <section class="container home-hero-container">
            <div class="wrapper-main home-hero-wrapper">
                <div class="hero-left">
                    <h2>Your Daily Dish<br>A <span style="color: var(--primary-theme-color);">Food</span> Journey</h2>
                    <p>Moms recipe is a platform where moms can upload their recipe, so that other people can follow it and cook their own. So what are you waiting for? Sign up today! </p>
                    <a href="login.html" class="home-sign-up">Sign up</a>
                </div>
                <div class="hero-right">
                    <img src="<?php echo esc_url(get_theme_mod('head_section_img_setting')) ?>" alt="https://www.freepik.com/free-psd/delicious-chicken-biryani-bowl_407747101.htm#fromView=keyword&page=1&position=0&uuid=6bd64a88-dbbf-44a1-9a68-c7b581f9a7e8&query=Biryani+png">
                </div>
            </div>
        </section>
        <!-- Latest recipe section -->
        <section class="wrapper-main">
            <h2 class="page-title">Latest Recipes</h2>
            <?php if(have_posts()); ?>
            <div class="recipe-card-container">
                <!-- all recipe card goes here using js by collecting data from localstorage -->
                <?php
                    
                        while(have_posts()): the_post();
                ?>
                
                        <div class="recipe-card">
                            <div class="recipe-card-img-container">
                                <a href="<?php the_permalink() ?>"> <?php the_post_thumbnail("post-card-thumbnail") ?></a>
                            </div>
                            <div class="recipe-card-body">
                                <h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
                                <p><?php //the_content() ?>
                                <?php the_excerpt() ?></p>
                                <div class="recipe-card-user">
                                    <div class="recipe-card-user-img-cont">
                                        <!-- user img -->
                                         <?php echo get_avatar(get_the_author_meta("ID"),100)?>
                                    </div>
                                    <p class="recipe-card-user-fullname">
                                        <?php the_author_link() ?>
                                        <!-- <a href="<php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> -->
                                        <!-- php the_author(); ?>
                                        </a> -->
                                    </p>
                                </div>
                            </div>
                        </div>         
               
                
            </div>
             <?php endwhile; 
             ifti_page_nav(); 
            endif;  ?>
        </section>
    </main>
<?php get_footer() ?>