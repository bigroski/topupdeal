<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'block_title'                      => array(
		'label' => __( 'Block Title', 'unyson' ),
		'type'  => 'text',
		'value' => 'Best Selling Products',
	),
	'bestsellers_categories'      => array(
		'type'       => 'multi-select',
		'label'      => __( 'Categories', 'unyson' ),
		'population' => 'taxonomy',
		'source'     => 'product_cat',
		
	),
	'main_picker'      => array(
		'type'       => 'multi-select',
		'label'      => __( 'Main Category', 'unyson' ),
		'population' => 'taxonomy',
		'source'     => 'product_cat',
		
	),
);