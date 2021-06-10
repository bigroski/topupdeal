<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'block_title'                      => array(
		'label' => __( 'Block Title', 'unyson' ),
		'type'  => 'text',
		
	),
	'bestsellers_categories'      => array(
		'type'       => 'multi-select',
		'label'      => __( 'Categories', 'unyson' ),
		'population' => 'taxonomy',
		'source'     => 'product_cat',
		'limit' => 1
	),
	
);