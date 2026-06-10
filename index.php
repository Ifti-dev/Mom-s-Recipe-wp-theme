
<?php 
 
 ?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no.js">
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="css/recipe-archive.css"> -->
    <!-- <link rel="stylesheet" href="index.css"> -->
    <script src="https://kit.fontawesome.com/bbf8f18e93.js" crossorigin="anonymous"></script>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="header-wrapper wrapper-main">
            <div class="logo-container"><div class="logo-wrapper wrapper-main"><a href="http://localhost/Mom-s-Recipe-PHP/"><?php echo esc_html(get_theme_mod('head_web_name_setting')) ?></a></div></div>
            <nav class="header-nav">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'menu_id' => 'header_menu',
                    'container' => false
                )) ?>
            </nav>
            <!-- <div class="login-regiser-btn">
                <a href="login.html" id="login-regiser-head-btn">
                    <span class="main-menu-log-icon">Login</span>
                    <i class="fa-solid fa-user main-menu-user-icon" title="Dashboard"></i>
                </a>
                <div class="main-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div> -->
        </div>
    </header>
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
            <div class="recipe-card-container">
                <!-- all recipe card goes here using js by collecting data from localstorage -->
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-wrapper wrapper-main">
            <div class="footer-top">
                <div class="footer-column-1 footer-top-column">
                    <div class="footer-logo-container">
                        Moms Recipe
                    </div>
                    <div class="footer-web-info">
                        <p>Moms recipe is a platform where moms can upload their recipe, so that other people can follow it and cook their own.</p>
                    </div>
                </div>
                <div class="footer-column-2 footer-top-column">
                    <h3>Useful Links</h3>
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="http://localhost/Mom-s-Recipe-PHP/">Home</a></li> 
                            <li><a href="recipe.php">Recipies</a></li> 
                            <li><a href="about-us.php">About us</a></li> 
                        </ul>
                    </nav>
                </div>
                <div class="footer-column-3 footer-top-column">
                    <h3>Contact Us</h3>
                    <nav class="footer-nav">
                        <ul>
                            <li><label for="phone number">Phone Number</label><p>01841399022</p></li>
                            <li><label for="Email">Email</label><p>mohammediftekhar18@gmail.com</p></li>
                            <li><label for="website">Website</label><p><strong>www.momsrecipe.com</strong></p></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="footer-bottom">
                <?php 
                    $copyright_text = get_theme_mod('footer_setting');
                    $shortkey_replacements = array(
                        '[year]' => date('Y'),
                        "[copyright]" => "<i class='fa-regular fa-copyright'></i>"
                    );

                    $copyright_text_updated = str_replace(array_keys($shortkey_replacements), array_values($shortkey_replacements), $copyright_text);
                ?>
                <p><?php echo $copyright_text_updated; ?></p>
            </div>
            
        </div>
        <?php 
            wp_footer(); 
        ?>
        <!-- <script src="js/header-footer.js"></script>
        <script src="js/recipe-archive.js"></script> -->
    </footer>
</body>
</html>