<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>
<main class=" order">
<div class="page-content pt-10 pb-10">
	<div class="step-by pt-2 pb-2 pr-4 pl-4">
		<h3 class="title title-simple title-step visited"><a href="#">1. Shopping Cart</a></h3>
		<h3 class="title title-simple title-step visited"><a href="#">2. Checkout</a></h3>
		<h3 class="title title-simple title-step active"><a href="#">3. Order Complete</a></h3>
	</div>
	<div class="container mt-8">
		<div class="container mt-8">
					<div class="order-message">
						<i class="fas fa-check"></i>
						<?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					

					<div class="order-results pt-8 pb-8">
						<div class="overview-item">
							<span>Order number</span>
							<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</div>
						<div class="overview-item">
							<span>Status</span>
							<strong>Processing</strong>
						</div>
						<div class="overview-item">
							<span>Date</span>
							<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</div>
						<div class="overview-item">
							<span>Total</span>
							<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</div>
						<?php if ( $order->get_payment_method_title() ) : ?>
						<div class="overview-item">
							<span>Payment method</span>
							<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
							
						</div>
						<?php endif; ?>
					</div>

					<h2 class="title title-simple text-left pt-3">Order Details</h2>
					<div class="order-details mb-1">
						<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
						
					</div>

					<h2 class="title title-simple text-left pt-8 mb-2">Billing Address</h2>
					<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
					<!-- <div class="address-info pb-8 mb-6">
						<p class="address-detail pb-2">
							John Doe<br>
							Donald Company<br>
							Steven street<br>
							El Carjon, CA 92020<br>
							123456789
						</p>
						<p class="email">mail@donald.com</p>
					</div>

					<a href="shop.html" class="btn btn-icon-left btn-back btn-md mb-4"><i class="d-icon-arrow-left"></i> Back to List</a> -->
				</div>
		
	</div>
</div>

</main>