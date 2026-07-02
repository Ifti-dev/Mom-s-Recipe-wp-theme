
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
        <section class="wrapper-main home_with_sidebar">
            <div class="home-title-container"><h2 class="page-title">Latest Recipes</h2></div>
            <?php get_template_part('template-parts/blog_post_cards'); ?>
        </section>
       
    </main>
<?php get_footer() ?>