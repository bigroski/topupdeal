<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<!-- <div class="product-price">Rs.139.00</div> -->

<!-- <div class="product-price">
        	<?php 
        		if($product->sale_price != ''):
        	?>
        	<ins class="new-price">Rs.<?php echo $product->price; ?></ins><del class="old-price">Rs.<?php echo $product->regular_price ?></del>
        	<?php 
        		else:
        	?>
			<span class="price">Rs.<?php echo $product->price; ?></span>
        	<?php 
        		endif;
        	?>
        </div> -->
<div class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'product-price' ) ); ?>"><?php echo $product->get_price_html(); ?></div>
