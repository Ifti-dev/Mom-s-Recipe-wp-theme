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