<footer>
        <div class="footer-wrapper wrapper-main">
            
            <!-- footer top main columns -->
            <div class="footer-top">
                <div class="footer-column-1 footer-top-column">
                    <?php if(is_active_sidebar('footer-column-1')){
                            dynamic_sidebar('footer-column-1');
                    } else{?>
                    <div class="footer-logo-container">
                        Moms Recipe
                    </div>
                    <div class="footer-web-info">
                        <p>Moms recipe is a platform where moms can upload their recipe, so that other people can follow it and cook their own.</p>
                    </div>
                    <?php } ?>
                </div>
                
                <div class="footer-column-2 footer-top-column">
                    <?php if(is_active_sidebar('footer-column-2')){
                            dynamic_sidebar('footer-column-2');
                    } else{?>
                    <h3>Useful Links</h3>
                    <nav class="footer-nav">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'container' => false
                        )); ?>
                    </nav>
                    <?php } ?>
                </div>

                <div class="footer-column-3 footer-top-column">
                    <?php if(is_active_sidebar('footer-column-3')){
                        dynamic_sidebar('footer-column-3');
                    } else{?>
                    <h3>Contact Us</h3>
                    <nav class="footer-nav">
                        <ul>
                            <li><label for="phone number">Phone Number</label><p>01841399022</p></li>
                            <li><label for="Email">Email</label><p>mohammediftekhar18@gmail.com</p></li>
                            <li><label for="website">Website</label><p><strong>www.momsrecipe.com</strong></p></li>
                        </ul>
                    </nav>
                    <?php } ?>
                </div>
                
                <?php if(is_active_sidebar('footer-column-4')){ ?>
                <div class="footer-column-4 footer-top-column">
                    <?php 
                        dynamic_sidebar('footer-column-4');
                     ?>    
                </div>
                <?php } ?>

                <?php if(is_active_sidebar('footer-column-5')){ ?>
                <div class="footer-column-4 footer-top-column">
                    <?php 
                        dynamic_sidebar('footer-column-5');
                     ?>    
                </div>
                <?php } ?>

            </div>

            <!-- its for expanding the grid column accroding the number of footer widget column activated -->
            <script> 
                const count_footer_column = document.querySelectorAll('.footer-top-column')
                const footer_top = document.querySelector(".footer-top")
                footer_top.style.gridTemplateColumns = `repeat(${count_footer_column.length},1fr)`

            </script>
            <!-- footer bottom copyright section -->
            <div class="footer-bottom">
                <?php 
                    $copyright_text = get_theme_mod('footer_bottom_setting');
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