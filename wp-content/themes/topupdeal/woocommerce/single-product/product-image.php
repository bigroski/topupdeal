<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<div class="custom-photo-gal" id="">
	<!-- <img id="zoom_03" src="<?php echo get_template_directory_uri() ?>/images/product/product-1-580x580.jpg" /> -->


		<?php
		if ( $post_thumbnail_id ) {
			$thumbnail_src     = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
			$full_src          = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			// var_dump($full_src);
			$html =  '<img id="zoom_03" src="'.$full_src[0].'" />';
			// $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			// $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html = sprintf( '<img id="zoom_03" src="%s" alt="%s"  data-zoom-image="%s"/>', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) , esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ));
			// $html .= '</div>';
		}
		echo $html;
		// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
		?>
		
</div>