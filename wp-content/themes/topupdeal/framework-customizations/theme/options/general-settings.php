<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => __( 'General', 'unyson' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => __( 'General Settings', 'unyson' ),
				'type'    => 'box',
				'options' => array(
					'logo'    => array(
						'label' => __( 'Logo', 'unyson' ),
						'desc'  => __( 'Upload your logo', 'unyson' ),
						'type'  => 'upload',
						
					),
					'favicon' => array(
						'label' => __( 'Favicon', 'unyson' ),
						'desc'  => __( 'Upload a favicon image', 'unyson' ),
						'type'  => 'upload'
					),
					'welcome_text' => array(
						'label' => __( 'Welcome text', 'unyson' ),
						'desc'  => __( 'Write a short one liner about the site', 'unyson' ),
						'type'  => 'text',
					 ),
					'phone_number' => array(
						'label' => __( 'Phone Number', 'unyson' ),
						'desc'  => __( 'Write your phonenumber', 'unyson' ),
						'type'  => 'text',
						
					),
				)
			),
			'footer-box' => array(
				'title'   => __( 'Footer String', 'unyson' ),
				'type'    => 'box',
				'options' => array(
					'footer_logo'    => array(
						'label' => __( 'Footer Logo', 'unyson' ),
						'desc'  => __( 'Upload your logo', 'unyson' ),
						'type'  => 'upload',
						
					),
					'footer_text' => array(
						'label' => __( 'Welcome text', 'unyson' ),
						'desc'  => __( 'Write a short one liner about the site', 'unyson' ),
						'type'  => 'wp-editor',
					 ),
					'copyright_text' => array(
						'label' => __( 'copyright_text', 'unyson' ),
						'desc'  => __( 'Write your phonenumber', 'unyson' ),
						'type'  => 'text',
						
					),
				)
			),
			'social-box' => array(
				'title'   => __( 'Social String', 'unyson' ),
				'type'    => 'box',
				'options' => array(
					'facebook' => array(
						'label' => __( 'Facebook Link', 'unyson' ),
						// 'desc'  => __( 'Write a short one liner about the site', 'unyson' ),
						'type'  => 'text',
					 ),
					'twitter' => array(
						'label' => __( 'Twitter link', 'unyson' ),
						// 'desc'  => __( 'Write your phonenumber', 'unyson' ),
						'type'  => 'text',
						
					),
					'instagram' => array(
						'label' => __( 'Instagram', 'unyson' ),
						// 'desc'  => __( 'Write your phonenumber', 'unyson' ),
						'type'  => 'text',
						
					),
					'youtube' => array(
						'label' => __( 'Youtube', 'unyson' ),
						// 'desc'  => __( 'Write your phonenumber', 'unyson' ),
						'type'  => 'text',
						
					),
				)
			)
		)
	)
);