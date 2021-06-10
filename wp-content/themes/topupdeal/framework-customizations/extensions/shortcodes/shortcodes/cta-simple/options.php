<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'block_title'                      => array(
		'label' => __( 'Block Title', 'unyson' ),
		'type'  => 'text',
		
	),
	'sub_title'                      => array(
		'label' => __( 'Sub Title', 'unyson' ),
		'type'  => 'text',
		
	),
	'block_url'                      => array(
		'label' => __( 'Url', 'unyson' ),
		'type'  => 'text',
		
	),
	'background_image'                    => array(
				'label'       => __( 'Background Image', 'unyson' ),
				'desc'        => __( 'Image Dimension: 1903 X 176 px',
					'unyson' ),
				'type'        => 'upload',
				'images_only' => true,
				
			),
	
	
);