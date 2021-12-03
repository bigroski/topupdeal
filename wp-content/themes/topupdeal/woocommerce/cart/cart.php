<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<main class="main cart">
	<div class="page-content pt-10 pb-10">
		<div class="step-by pt-2 pb-2 pr-4 pl-4">
			<h3 class="title title-simple title-step active"><a href="#">1. Shopping Cart</a></h3>
			<h3 class="title title-simple title-step"><a href="#">2. Checkout</a></h3>
			<h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
		</div>
		<div class="container mt-8 mb-4">
			<div class="row gutter-lg">
				<div class="col-lg-8 col-md-12">
					<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
						<?php do_action( 'woocommerce_before_cart_table' ); ?>

						<table class="shop-table cart-table mt-2 " cellspacing="0">
							<thead>
								<tr>
										<th><span>Product</span></th>
										<th style="width: 150px;"><span>Product Name</span></th>
										<th><span>Price</span></th>
										<th><span>Quantity</span></th>
										<th><span>Subtotal</span></th>
									</tr>
								<!-- <tr>
									<th class="product-remove">&nbsp;</th>
									<th class="product-thumbnail">&nbsp;</th>
									<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
									<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
									<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
									<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
								</tr> -->
							</thead>
							<tbody>
								<?php do_action( 'woocommerce_before_cart_contents' ); ?>

								<?php
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>
										<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
											<td class="product-thumbnail">
												<figure>
													<?php
													$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

														if ( ! $product_permalink ) {
															echo $thumbnail; // PHPCS: XSS ok.
														} else {
															printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
														}
													?>
													<!-- <a href="product-simple.html">
														<img src="images/products/product15.jpg" width="100" height="100"
														alt="product">
													</a> -->
													<?php
													echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
														'woocommerce_cart_item_remove_link',
														sprintf(
															'<a href="%s" class="product-remove remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
															esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
															esc_html__( 'Remove this item', 'woocommerce' ),
															esc_attr( $product_id ),
															esc_attr( $_product->get_sku() )
														),
														$cart_item_key
													);
												?>
													<!-- <a href="#" class="product-remove" title="Remove this product">
														<i class="fas fa-times"></i>
													</a> -->
												</figure>
											</td>
											<td class="product-name">
												<div class="product-name-section">
													<?php
													if ( ! $product_permalink ) {
														echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
													} else {
														echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
													}

													do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

													// Meta data.
													echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

													// Backorder notification.
													if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
														echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
													}
													?>
													<!-- <a href="product-simple.html">Solid pattern in fashion summer dress</a> -->
												</div>
											</td>
											<td class="product-subtotal">
												<span class="amount"><?php echo WC()->cart->get_product_price( $_product ); ?></span>
											</td>
											<td class="product-quantity">
												<div class="input-group">
													<button type="button" class="quantity-minus d-icon-minus"></button>
													<?php
													if ( $_product->is_sold_individually() ) {
														$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
													} else {
														$product_quantity = woocommerce_quantity_input(
															array(
																'input_name'   => "cart[{$cart_item_key}][qty]",
																'input_value'  => $cart_item['quantity'],
																'max_value'    => $_product->get_max_purchase_quantity(),
																'min_value'    => '0',
																'product_name' => $_product->get_name(),
																'classes' => ['form-control quantity input-text qty text']
															),
															$_product,
															false
														);
													}

													echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
													?>
													<!-- <input class="quantity form-control" type="number" min="1"
														max="1000000"> -->
													<button type="button" class="quantity-plus d-icon-plus"></button>
												</div>
											</td>
											<td class="product-price">
												<span class="amount"><?php
													echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
												?></span>
											</td>
										</tr>
										<?php
									}
								}
								?>

								<?php do_action( 'woocommerce_cart_contents' ); ?>

								<tr>
									<td colspan="6" class="actions">
										<div class="cart-actions  mb-6 pt-6">
										<?php if ( wc_coupons_enabled() ) { ?>
											<div class="coupon">
												<input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="btn btn-md btn-primary" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
												<?php do_action( 'woocommerce_cart_coupon' ); ?>
											</div>
										<?php } ?>

										<button type="submit" class="button btn btn-primary" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

										<?php do_action( 'woocommerce_cart_actions' ); ?>

										<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
										</div>
									</td>
								</tr>

								<?php do_action( 'woocommerce_after_cart_contents' ); ?>
							</tbody>
						</table>
						<?php do_action( 'woocommerce_after_cart_table' ); ?>
					</form>
				</div>
				<aside class="col-lg-4 sticky-sidebar-wrapper">
					<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

					<div class="summary mb-4">
						<?php
							/**
							 * Cart collaterals hook.
							 *
							 * @hooked woocommerce_cross_sell_display
							 * @hooked woocommerce_cart_totals - 10
							 */
							do_action( 'woocommerce_cart_collaterals' );
						?>
					</div>
				</aside>
			</div>
		</div>
	</div>
</main>




<?php do_action( 'woocommerce_after_cart' ); ?>
