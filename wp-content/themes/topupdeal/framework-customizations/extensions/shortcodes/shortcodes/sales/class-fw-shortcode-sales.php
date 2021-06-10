<?php if (!defined('FW')) die('Forbidden');

class FW_Shortcode_Sales extends FW_Shortcode
{
	protected function _render($atts, $content = null, $tag = '')
	{
		$all_sales_items = getSalesItems(7);
		$atts['main_sale'] = array_slice($all_sales_items, 0,1);
		$atts['product_on_sales'] = array_slice($all_sales_items, 1);
		$view_path = $this->locate_path('/views/view.php');
		return fw_render_view($view_path, $atts);
	}

	private function get_error_msg()
	{
		return '<b>Something went wrong :(</b>';
	}
	
}

