<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'offers'               => array(
		'label'        => __( 'Offers', 'unyson' ),
		'type'         => 'addable-box',
		'value'        => array(),

		'box-controls' => array(
		),
		'box-options'  => array(
			'offer_title'  => array('label' => 'Top Title', 'type' => 'text' ),
			'offer_description'  => array('label' => 'description', 'type' => 'text' ),
			'offer_featured_image'                    => array(
				'label'       => __( 'Background Image', 'unyson' ),
				'desc'        => __( 'Image Dimension: 951 X 353 px',
					'unyson' ),
				'type'        => 'upload',
				'images_only' => true,

			),
			'offer_url' => array('label' => 'Redirect Link', 'type' => 'text'),
			'content_position'	=> array(
				'label'   => __( 'Content Position', 'unyson' ),
				'type'    => 'short-select',
				'value'   => 'left',
				'choices' => array(
					'banner1' => 'Right',
					'banner2' => 'Left',
					
				),
				
			),
			fw()->theme->get_options( 'string-color-settings' ),

		),
		'template' => '{{- offer_title }}',
		'limit' => 3,
	),
	

);