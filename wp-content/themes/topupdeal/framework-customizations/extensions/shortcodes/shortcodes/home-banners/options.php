<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'primary-left' => array(
	    'type' => 'box',
	    'options' => array(
	        'primary_main_title'  => array('main_title' => 'Heading', 'type' => 'text' ),
	        'primary_sub_title'  => array( 'sub_title' => 'Subheading','type' => 'text' ),
	        'primary_featured_image'                    => array(
				'label'       => __( 'Background Image', 'unyson' ),
				'desc'        => __( 'Image Dimension: 880 X 474 px',
					'unyson' ),
				'type'        => 'upload',
				'images_only' => true,
				
			),
			'primary_url' => array('label' => 'Redirect Link', 'type' => 'text')
	    ),
	    'title' => __('Primary Left', 'topupdeal'),
	    
	    
	),
	'primary-right' => array(
	    'type' => 'box',
	    'options' => array(
	        'primary_right_main_title'  => array('label' => 'Heading', 'type' => 'text' ),
	        'primary_right_sub_title'  => array( 'label' => 'Subheading','type' => 'text' ),
	        'primary_right_featured_image'                    => array(
				'label'       => __( 'Background Image', 'unyson' ),
				'desc'        => __( 'Image Dimension: 385 X 433 px',
					'unyson' ),
				'type'        => 'upload',
				'images_only' => true,
				
			),
			'primary_right_url' => array('label' => 'Redirect Link', 'type' => 'text')

	    ),
	    'title' => __('Primary Right', 'topupdeal'),
	    
	    
	),
	'featured_items' => array(
	    'type' => 'box',
	    'options' => array(
	        'featured_items_box'               => array(
				'label'        => __( 'Featured Box', 'unyson' ),
				'type'         => 'addable-box',
				'value'        => array(),
				
				'box-controls' => array(//'custom' => '<small class="dashicons dashicons-smiley" title="Custom"></small>',
				),
				'box-options'  => array(
					'box_top_title'  => array('label' => 'Top Title', 'type' => 'text' ),
					'box_main_title'  => array('label' => 'Heading', 'type' => 'text' ),
			        'box_sub_title'  => array( 'label' => 'Subheading','type' => 'text' ),
			        'box_featured_image'                    => array(
						'label'       => __( 'Background Image', 'unyson' ),
						'desc'        => __( 'Image Dimension: 585 X 213 px',
							'unyson' ),
						'type'        => 'upload',
						'images_only' => true,
						
					),
					'box_url' => array('label' => 'Redirect Link', 'type' => 'text'),
					fw()->theme->get_options( 'string-color-settings' ),

					
				),
				'template' => '{{- box_main_title }}',
				'limit' => 3,
			),
	    ),
	    'title' => __('Home Featured', 'topupdeal'),
	    
	    
	),
	

);