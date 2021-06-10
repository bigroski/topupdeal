<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="product-wrap" >
	<div class="product text-center">
            <figure class="product-media">
                <a href="<?php echo $product->get_permalink(); ?>">
                    <?php 
                        echo $product->get_image();
                    ?>
                </a>
                <?php 
                    fw_sales_label($product);
                ?>
        <?php fw_product_actions($product); ?>
            </figure>
            
            <?php 
                fw_get_product_detail($product);
            ?>
        </div>
	</div>

