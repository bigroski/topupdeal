<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!-- <hr class="product-divider mb-3">

										<div class="product-footer">
											<div class="social-links mr-2">
												<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
												<a href="#" class="social-link social-twitter fab fa-twitter"></a>
												<a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>
											</div>
											<div class="product-action">
												<a href="#" class="btn-product btn-wishlist"><i
														class="d-icon-heart"></i>Add To Wishlist</a>
												<span class="divider"></span>
												<a href="#" class="btn-product btn-compare"><i
														class="d-icon-random"></i>Add
													To Compare</a>
											</div>
										</div> -->
<?php
do_action( 'woocommerce_share' ); // Sharing plugins can hook into here.

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
