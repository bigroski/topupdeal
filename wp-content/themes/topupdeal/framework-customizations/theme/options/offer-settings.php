<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'offer_box' => array(
		'title'   => __( 'Creative Offer', 'unyson' ),
		'type'    => 'tab',
		'options' => array(
			'offer-main-box' => array(
				'title'   => __( 'Offer CTA', 'unyson' ),
				'type'    => 'box',
				'options' => array(
					'offer_background_image'    => array(
						'label' => __( 'Background Image', 'unyson' ),
						'desc'  => __( 'Optimal size: 1180 X 250', 'unyson' ),
						'type'  => 'upload',
						
					),
					'offer_top_title' => array(
						'label' => __( 'Top Title', 'unyson' ),
						'value' => 'UP TO 25% OFF',
						'desc'  => __( 'Write a short one liner about the site', 'unyson' ),
						'type'  => 'text',
					 ),
					'offer_main_title' => array(
						'label' => __( 'Top Title', 'unyson' ),
						'value' => 'CHROMEBOOK SIMPLICITY',
						'desc'  => __( 'Write a short one liner about the site', 'unyson' ),
						'type'  => 'text',
					 ),
					'offer_sub_title' => array(
						'label' => __( 'Top Title', 'unyson' ),
						'value' => 'CHROMEBOOK SIMPLICITY',
						'desc'  => __( 'Write a short one liner about the site', 'unyson' ),
						'type'  => 'text',
					 ),
					'offer_url' => array(
						'label' => __( 'Offer URL', 'unyson' ),
						'desc'  => __( 'Where to send user', 'unyson' ),
						'type'  => 'text',
						
					),
				)
			),
			
		)
	)
);
?>