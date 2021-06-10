<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */

// Add Lato font, used in the main stylesheet.
wp_enqueue_style(
	'fw-theme-lato',
	fw_theme_font_url(),
	array(),
	'1.0'
);

// Add Genericons font, used in the main stylesheet.
wp_enqueue_style(
	'genericons',
	get_template_directory_uri() . '/genericons/genericons.css',
	array(),
	'1.0'
);

// Load our main stylesheet.
wp_enqueue_style(
	'fw-theme-style',
	get_stylesheet_uri(),
	array( 'genericons' )
	
);


// Font Awesome stylesheet
wp_enqueue_style(
	'font-awesome-five',
	get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css',
	array(),
	'1.0'
);



wp_enqueue_style(
	'animate',
	get_template_directory_uri() . '/vendor/animate/animate.min.css',
	array(),
	'1.0'
);

wp_enqueue_style(
	'magnific-popup',
	get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.min.css',
	array(),
	'1.0'
);
wp_enqueue_style(
	'owl-carousel',
	get_template_directory_uri() . '/vendor/owl-carousel/owl.carousel.min.css',
	array(),
	'1.0'
);
wp_enqueue_style(
	'demo27',
	get_template_directory_uri() . '/css/demo27.min.css',
	array(),
	'1.0'
);
wp_enqueue_style(
	'custom',
	get_template_directory_uri() . '/css/custom.css',
	array()

);



$javascripts = [
	'elevatezoom' => 'vendor/elevatezoom/jquery.elevatezoom.min.js',
	'magnific-popup-js' => 'vendor/magnific-popup/jquery.magnific-popup.min.js',
	'owl-carouse-js' => 'vendor/owl-carousel/owl.carousel.min.js',
	'imagesloaded-js' => 'vendor/imagesloaded/imagesloaded.pkgd.min.js',
	'isotope-js' => 'vendor/isotope/isotope.pkgd.min.js',
	'jquery-plugin-js' => 'vendor/jquery.plugin/jquery.plugin.min.js',
	'jquery-countdown-js' => 'vendor/jquery.countdown/jquery.countdown.min.js',
	'main-js' => 'js/main.js'

];

foreach($javascripts as $key =>  $js){
	wp_enqueue_script(
		$key,
		get_template_directory_uri() . '/'. $js,
		'',
		null,
		true
	);
}

