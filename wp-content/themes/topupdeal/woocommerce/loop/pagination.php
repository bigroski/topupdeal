<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';


?>
<nav class="toolbox toolbox-pagination">
	<!-- <h2>Navigation</h2> -->
	<?php 
		/**
		 * Hook: topupdeal_result_count.
		 *
		 * @hooked woocommerce_result_count - 10
		 */
		do_action('topupdeal_result_count');
	?>
	<!-- <p class="toolbox-item show-info d-block">Showing <span>12 of 56</span> Products</p> -->
	<?php
	if ( $total >= 1 ) {
	// return;

		$items = paginate_links(
			apply_filters(
				'woocommerce_pagination_args',
				array( // WPCS: XSS ok.
					'base'      => $base,
					'format'    => $format,
					'add_args'  => false,
					'current'   => max( 1, $current ),
					'total'     => $total,
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
					'end_size'  => 3,
					'mid_size'  => 3,
					'type' => 'array'
				)
			)
		);
		if(!empty($items)){
			echo '<ul  class="pagination">';
				foreach($items as $item){
					$active = 'active';
					if(!strpos($item, 'current')){
						$active = '';
					}
					echo '<li class="page-item '.$active.'" aria-current="page">'.str_replace('page-numbers', 'page-link', $item).'</li>';
				}
			echo '</ul>';
		}
	}
	?>
	<!-- <ul class="pagination">
		<li class="page-item disabled">
			<a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
			aria-disabled="true">
			<i class="d-icon-arrow-left"></i>Prev
		</a>
		</li>
		<li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
		<li class="page-item">
			<a class="page-link page-link-next" href="#" aria-label="Next">
				Next<i class="d-icon-arrow-right"></i>
			</a>
		</li>
	</ul> -->
</nav>
<!-- <nav class="woocommerce-pagination">
	
</nav>
 -->