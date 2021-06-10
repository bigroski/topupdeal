<?php if (!defined('FW')) die('Forbidden');

class FW_Shortcode_Product_Grid extends FW_Shortcode
{
	protected function _render($atts, $content = null, $tag = '')
	{
		// $all_sales_items = getSalesItems(7);
		// $atts['atts'] = $atts;
		// $args = array(
		//     'posts_per_page' => 2,

		    
		// );

		// $loop = new WC_Product_Query( $args );
		$paged                   = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
		$ordering                = WC()->query->get_catalog_ordering_args();
		$ordering['orderby']     = array_shift(explode(' ', $ordering['orderby']));
		$ordering['orderby']     = stristr($ordering['orderby'], 'price') ? 'meta_value_num' : $ordering['orderby'];
		$products_per_page       = apply_filters('loop_shop_per_page', wc_get_default_products_per_row() * wc_get_default_product_rows_per_page());
		// $products_per_page = 8;
		$loop       = wc_get_products(array(
		    // 'meta_key'             => '_price',
		    'status'               => 'publish',
		    'limit'                => $products_per_page,
		    'page'                 => $paged,
		    'featured'             => false,
		    'paginate'             => true,
		    'return'               => 'ids',
		    // 'orderby'              => $ordering['orderby'],
		    // 'order'                => $ordering['order'],
		));
		$atts['atts']['products'] = $loop;
		$atts['atts']['current'] = $paged;
		// $atts['atts']['posts'] = json_encode( $loop->get_query_vars() );
		// var_dump($loop);
		// $atts['']
        $view_path = $this->locate_path('/views/view.php');
		return fw_render_view($view_path, $atts);
	}

	private function get_error_msg()
	{
		return '<b>Something went wrong :(</b>';
	}
	
}

