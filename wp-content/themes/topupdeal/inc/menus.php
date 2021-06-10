<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Register menus
 */

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary'   => __( 'Top primary menu', 'unyson' ),
	'tophead' => __( 'Top header menu', 'unyson' ),
	'footer_one' => __( 'Footer one menu', 'unyson' ),
	'footer_two' => __( 'Footer two menu', 'unyson' ),
	'footer_three' => __( 'Footer Three menu', 'unyson' ),
	
) );