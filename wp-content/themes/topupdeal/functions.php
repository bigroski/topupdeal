<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Theme Includes
 */
require_once get_template_directory() .'/inc/init.php';

/**
 * TGM Plugin Activation
 */
{
	require_once dirname( __FILE__ ) . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

	/** @internal */
	function _action_theme_register_required_plugins() {
		tgmpa( array(
			array(
				'name'      => 'Unyson',
				'slug'      => 'unyson',
				'required'  => true,
			),
			array(
				'name'      => 'WP AutoComplete Search',
				'slug'      => 'wp-autocomplete',
				'required'  => true,
			),
		) );

	}
	add_action( 'tgmpa_register', '_action_theme_register_required_plugins' );
}

function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	// $args = json_decode( stripslashes( $_POST['query'] ), true );
	// $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	// $args['post_status'] = 'publish';
 
	// // it is always better to use WP_Query but not here
	// query_posts( $args );
	$paged                   = $_POST['page'];
	$paged = $paged + 1;
	// var_dump($paged);
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
	foreach($loop->products as $product_id){
            $product = wc_get_product($product_id);
            // var_dump($product);
            get_template_part('product', 'display', ['product' => $product]);
	}
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


function misha_my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );