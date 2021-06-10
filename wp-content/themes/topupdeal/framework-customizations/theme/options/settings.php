<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

$options = array(
	fw()->theme->get_options( 'general-settings' ),
	fw()->theme->get_options( 'fancy-navigation-settings' ),
	fw()->theme->get_options( 'offer-settings' ),
	fw()->theme->get_options( 'demo-box' ),
);
