<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '<?php echo get_template_directory_uri() ?>/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

	<?php
	$favicon = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('favicon') : '';
	if( !empty( $favicon ) ) :
	?>
	<link rel="icon" type="image/png" href="<?php echo $favicon['url'] ?>">
	<?php endif ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?> style="overflow-x: hidden;">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <div class="bounce4"></div>
        </div>
    </div>
    <div class="page-wrapper">
        <h1 class="d-none"><?php get_bloginfo('name') ?> - <?php echo get_bloginfo('description') ?></h1>
        <header class="header">
            <!-- <div class="d-flex justify-content-center bg-dark">
                <div class="alert alert-black alert-dark font-primary ">
                    Get 10% extra Off on Mero Marketing Birthday Sale - Use Mero Marketingbirthday coupon - <a href="#"
                        class="btn btn-shop btn-link btn-underline btn-underline-width-sm btn-underline-visible btn-primary text-normal btn-sm font-primary ">Shop
                        now!</a>
                    <button type="button" class="btn btn-link btn-close">
                        <i class="d-icon-times"></i>
                    </button>
                </div>
            </div> -->
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg"><?php echo fw_get_db_settings_option('welcome_text') ?></p>
                        <a href="tel:#" class="call">Call: <?php echo fw_get_db_settings_option('phone_number') ?></a>
                    </div>
                    <div class="header-right">
                        <div class="dropdown dropdown-expanded">
                            <a href="#dropdown">Quick Links</a>
                            <?php wp_nav_menu([
                                'theme_location' => 'tophead',
                                'menu_class' => 'dropdown-box',
                                'container' => ''
                            ]); ?>
                            <!-- <ul class="dropdown-box">
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul> -->
                        </div>
                        <!-- End DropDownExpanded Menu -->
                    </div>
                </div>
            </div>
            <!-- End HeaderTop -->
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="<?php echo get_bloginfo('wpurl'); ?>" class="logo">

                            <img src="<?php echo get_image_url(fw_get_db_settings_option('logo')) ?>" alt="logo" width="163" height="39" />
                        </a>
                    </div>
                    <div class="header-center">
                        <a href="<?php echo get_bloginfo('wpurl') ?>" class="logo">
                            <img src="<?php echo get_image_url(fw_get_db_settings_option('logo')) ?>" alt="logo" width="163" height="39" />
                        </a>
                        <!-- End Logo -->
                        <div class="header-search hs-simple">
                            <?php 
                                if(function_exists('wi_wp_autosearch_form')){
                                    wi_wp_autosearch_form();
                                }
                            ?>
                            <!-- <form action="#" method="get" class="input-wrapper">
                                <input type="text" class="form-control border-no" name="search" id="search"
                                    placeholder="Search your keyword..." required="">
                                <button class="btn btn-sm btn-search" type="submit"><i
                                        class="d-icon-search"></i></button>
                            </form> -->
                        </div>
                        <!-- End Header Search -->
                    </div>
                    <div class="header-right">
                        <?php 
                            if(!is_user_logged_in()):
                        ?>
                        <a id="login-popper" class="login" href="javascript:void(0);">
                            <i class="d-icon-user"></i>
                            <span>Login</span>
                        </a>
                        <?php
                            else:
                        ?>
                        <a id="" class="login" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                            <i class="d-icon-user"></i>
                            <span><?php echo wp_get_current_user()->user_login; ?></span>
                        </a>
                        <?php 
                            endif;
                        ?>
                        <!-- End Login -->
                        <span class="divider"></span>
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="cart-toggle">
                                <span class="cart-label">
                                    <span class="cart-name">My Cart</span>
                                    <span class="cart-price"><?php echo WC()->cart->get_cart_total(); ?></span>
                                </span>
                                <i class="minicart-icon">
                                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                </i>
                            </a>
                            <!-- End Cart Toggle -->
                            <div class="dropdown-box">
                                <div class="product product-cart-header">
                                    <span class="product-cart-counts"><?php echo WC()->cart->get_cart_contents_count(); ?> items</span>
                                    <span><a href="<?php echo wc_get_cart_url(); ?>">View cart</a></span>
                                </div>
                                    <?php 
                                        woocommerce_mini_cart();
                                     ?>
                                    
                                <!-- End of Cart Action -->
                            </div>
                            <!-- End Dropdown Box -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- standard-navigation -->
            <div class="header-bottom sticky-header fix-top sticky-content has-center">
                <div class="container">
                    <!-- header-left -->
                    <!-- <div class="header-left">
                    </div> -->
                    <div class="header-center">
                        
                        <nav class="main-nav">
                            <?php wp_nav_menu([
                                'theme_location' => 'primary',
                                'menu_class' => 'menu',
                                'container' => ''
                            ]); ?>
                            
                        </nav>    
                        <!-- Header Search -->
                    </div>
                    
                    <div class="header-right">
                        <nav>
                            <ul class="menu right-flash-menu">
                                <li>
                                    <a href="<?php echo get_bloginfo('wpurl') ?>/shop" class="btn btn-sm btn-icon-left btn-alert btn-outline"> <i class="fa fa-info-circle"></i>Flash Sales</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- end standard navigation -->
            <div class="header-bottom sticky-header fix-top sticky-content" style="">
                <div class="container  justify-content-center">
                    <div class="row align-items-center gutter-no scrollable w100">
                        <?php 
                            $fancy_nav  = fw_get_db_settings_option('category_navigationsa'); 
                            if(!empty($fancy_nav)):
                                foreach($fancy_nav as $nav):
                                    $category = get_term($nav, 'product_cat');
                                    $category_icon = fw_get_db_term_option($nav, 'product_cat', 'category_icon');
                                    // var_dump($category_icon);
                        ?>
                        <a href="<?php echo get_term_link($category); ?>" class="category category-icon-inline">
                            <?php 
                                if(!empty($category_icon)):
                            ?>
                            <div class="category-media" style="font-size: 3.2rem">

                                <i class="<?php echo $category_icon['icon-class'] ?>"></i>
                            </div>
                            <?php 
                                endif;
                            ?>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <?php 
                                        $explode = explode(' ', $category->name);
                                        if(count($explode) > 1){    
                                            $chunks = array_chunk($explode, 2);
                                            array_walk($chunks, function($chunk){
                                                echo implode($chunk, ' ').'</br />';
                                            });
                                        }else{
                                            echo $category->name;
                                        }

                                        // var_dump($explode);
                                    ?>
                                    <!-- Mobile Phone <br />&amp; Accessories -->
                                </h4>
                            </div>
                        </a>
                        <?php
                                endforeach;
                            endif;
                        ?>
                        
                        <!-- <a href="shop.html" class="category category-icon-inline">
                            <div class="category-media">
                                <i class="d-icon-category"></i>
                            </div>
                            <div class="category-content">
                                <h4 class="category-name">Browse <br />More</h4>
                            </div>
                        </a> -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->
        <!-- End Header -->
        <main class="main">
            <div class="page-content">