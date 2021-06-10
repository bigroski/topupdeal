<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'category_navigation' => array(
		'title'   => __( 'Category navigation', 'unyson' ),
		'type'    => 'tab',
		'options' => array(
			'category-box' => array(
				'title'   => __( 'General Settings', 'unyson' ),
				'type'    => 'box',
				'options' => array(
					'category_navigationsa' => array(
						'type'       => 'multi-select',
						'label'      => __( 'Category Navigation', 'unyson' ),
						'population' => 'taxonomy',
						'source'     => 'product_cat',
					),
				)
			),
			
		)
	)
);