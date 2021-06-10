<?php if (!defined('FW')) die('Forbidden');

class FW_Shortcode_Single_Category_Simple extends FW_Shortcode
{
	protected function _render($atts, $content = null, $tag = '')
	{
		// $all_sales_items = getSalesItems(7);
		$categories = $atts['bestsellers_categories'];
		$picker = $atts['main_picker'];
		$atts['atts'] = $atts;
        // find all products by category id
        $products = fw_get_product_by_categories($categories);
        // split products to 1, 6 chunks
        $atts['atts']['main_category_link'] = get_term_link(get_term($atts['bestsellers_categories'][0], 'product_cat'));
        $atts['atts']['products'] = $products;    
		// var_dump($atts['main_sale']);
		$view_path = $this->locate_path('/views/view.php');
		return fw_render_view($view_path, $atts);
	}

	private function get_error_msg()
	{
		return '<b>Something went wrong :(</b>';
	}
	
}

