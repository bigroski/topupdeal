<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'block_content'                      => array(
		'label' => __( 'content', 'unyson' ),
		'type'  => 'wp-editor',
		
	),
	'block_image'                    => array(
		'label'       => __( 'Block image', 'unyson' ),
		// 'desc'        => __( 'Image Dimension: 1903 X 176 px',
					// 'unyson' ),
		'type'        => 'upload',
		'images_only' => true,
				
	)
	
	
	
);