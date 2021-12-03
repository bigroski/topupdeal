<?php if (!defined('FW')) die('Forbidden');

$options = array(
	
	'team_heading'                      => array(
		'label' => __( 'Heading', 'unyson' ),
		'type'  => 'text',
	),
	'our_team'               => array(
		'label'        => __( 'Our team', 'unyson' ),
		'type'         => 'addable-box',
		'value'        => array(),
		'box-options'  => array(
			'team_member'     => array(
				'label' => __( 'Team Member', 'unyson' ),
				'type'  => 'text',
			),
			
			'team_member_post'     => array(
				'label' => __( 'Team Member Post', 'unyson' ),
				'type'  => 'text',
			),
			'team_member_image'                    => array(
				'label'       => __( 'Member Photo', 'unyson' ),
				'desc'        => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'unyson' ),
				'type'        => 'upload',
				'images_only' => true,
			),
			
		),
		'template'     => '{{- team_member }}',
	),
	
	
);