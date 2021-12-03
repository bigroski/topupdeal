<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
	    </div>
    </main>
        <!-- End Main -->

	<footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget widget-about">
                                <a href="index.html" class="logo-footer">
                                    <img src="<?php echo get_image_url(fw_get_db_settings_option('logo')) ?>" alt="logo-footer" width="163" height="39" />
                                </a>
                                <div class="widget-body">
                                    <?php 
                                        echo fw_get_db_settings_option('footer_text');
                                    ?>
                                    
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <?php wp_nav_menu([
                                    'theme_location' => 'footer_one',
                                    'menu_class' => 'widget-body',
                                    'container' => ''
                                ]); ?>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <?php wp_nav_menu([
                                    'theme_location' => 'footer_two',
                                    'menu_class' => 'widget-body',
                                    'container' => ''
                                ]); ?>
                                
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Social Links</h4>
                                <ul class="widget-body">
                                    <li><a href="<?php echo fw_get_db_settings_option('facebook') ?>" class=" social-facebook"><i class="fab fa-facebook-f"> </i> Facebook</a> </li>
                                    <li><a href="<?php echo fw_get_db_settings_option('twitter') ?>" class=" social-twitter "><i class="fab fab fa-twitter"> </i> Twitter</a> </li>
                                    <li><a href="<?php echo fw_get_db_settings_option('instagram') ?>" class=" social-instagram "><i class="fab fab fa-instagram"> </i> Instagram</a> </li>
                                    <li><a href="<?php echo fw_get_db_settings_option('youtube') ?>" class=" social-youtube "><i class="fab fab fa-youtube"> </i> Youtube</a> </li>
                                </ul>
                                

                            </div>
                            <!-- End Widget -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Middle -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-left">
                        <!-- <figure class="payment">
                            <img src="<?php echo get_template_directory_uri() ?>/images/payment.png" alt="payment" width="159" height="29" />
                        </figure> -->
                    </div>
                    <div class="footer-center">
                        <p class="copyright"><?php echo fw_get_db_settings_option('copyright_text') ?></p>
                    </div>
                    <div class="footer-right">
                        <div class="social-links">
                            
                            <!-- <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom -->
        </footer>
        <!-- End Footer -->
    </div>
    <!-- Sticky Footer -->
    <!-- <div class="sticky-footer sticky-content fix-bottom">
        <a href="index.html" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        <a href="shop.html" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
        </a>
        <a href="wishlist.html" class="sticky-link">
            <i class="d-icon-heart"></i>

            <span>Wishlist</span>
        </a>
        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="d-icon-search"></i>
                <span>Search</span>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
        </div>
        <a href="account.html" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
    </div> -->

    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-angle-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End CloseButton -->
        <div class="mobile-menu-container scrollable">
            <?php 
                                if(function_exists('wi_wp_autosearch_form')){
                                    wi_wp_autosearch_form();
                                }
                            ?>
            <!-- End Search Form -->
            <?php wp_nav_menu([
                                'theme_location' => 'primary',
                                'menu_class' => 'mobile-menu mmenu-anim',
                                'container' => ''
                            ]); ?>
            
            <!-- End MobileMenu -->
        </div>
    </div>
    <?php
        get_template_part('ajax/login');
    ?>
    <!-- Plugins JS File -->
	<?php wp_footer(); ?>
</body>
</html>
