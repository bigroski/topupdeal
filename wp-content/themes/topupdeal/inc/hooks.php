<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 * @internal
 */
function _action_theme_admin_fonts() {
	wp_enqueue_style( 'fw-theme-lato', fw_theme_font_url(), array(), '1.0' );
}

add_action( 'admin_print_scripts-appearance_page_custom-header', '_action_theme_admin_fonts' );

if ( ! function_exists( '_action_theme_setup' ) ) : /**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 * @internal
 */ {
	function _action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'unyson', get_template_directory() . '/languages' );

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( array( 'css/editor-style.css', fw_theme_font_url() ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 811, 372, true );
		add_image_size( 'fw-theme-full-width', 1038, 576, true );
		add_image_size( 'main_thumbnail', 148, 168, true );
		add_image_size( 'big_thumbnail', 275, 217, true );
		add_image_size( 'bestseller_thumbnail', 196, 173, true );
		add_image_size( 'medium-300', 300, 300, true );


		// add_image_size( 'fw-theme-full-width', 1038, 576, true );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'audio',
			'quote',
			'link',
			'gallery',
		) );

		// Add support for featured content.
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'fw_theme_get_featured_posts',
			'max_posts'               => 6,
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
		fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();
		
	}
}
endif;
add_action( 'init', '_action_theme_setup' );

/**
 * Adjust content_width value for image attachment template.
 * @internal
 */
function _action_theme_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}

add_action( 'template_redirect', '_action_theme_content_width' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function _filter_theme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists('fw_ext_sidebars_get_current_position') ) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty($current_position)
		     || is_page_template( 'page-templates/full-width.php' )
		     || is_page_template( 'page-templates/contributors.php' )
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}


	if( is_front_page() || is_home()){
		$classes[] = 'home';
	}

	if(is_shop()){
		$classes[] = 'shop';
	}
	return $classes;
}

add_filter( 'body_class', '_filter_theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function _filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', '_filter_theme_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function _filter_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'unyson' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', '_filter_theme_wp_title', 10, 2 );


/**
 * Flush out the transients used in fw_theme_categorized_blog.
 * @internal
 */
function _action_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'fw_theme_category_count' );
}

add_action( 'edit_category', '_action_theme_category_transient_flusher' );
add_action( 'save_post', '_action_theme_category_transient_flusher' );

/**
 * Theme Customizer support
 */
{
	/**
	 * Implement Theme Customizer additions and adjustments.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @internal
	 */
	function _action_theme_customize_register( $wp_customize ) {
		// Add custom description to Colors and Background sections.
		$wp_customize->get_section( 'colors' )->description           = __( 'Background may only be visible on wide screens.',
			'unyson' );
		$wp_customize->get_section( 'background_image' )->description = __( 'Background may only be visible on wide screens.',
			'unyson' );

		// Add postMessage support for site title and description.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Rename the label to "Site Title Color" because this only affects the site title in this theme.
		$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'unyson' );

		// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
		$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'unyson' );

		// Add the featured content section in case it's not already there.
		$wp_customize->add_section( 'featured_content', array(
			'title'       => __( 'Featured Content', 'unyson' ),
			'description' => sprintf( __( 'Use a <a href="%1$s">tag</a> to feature your posts. If no posts match the tag, <a href="%2$s">sticky posts</a> will be displayed instead.',
					'unyson' ),
				esc_url( add_query_arg( 'tag', _x( 'featured', 'featured content default tag slug', 'unyson' ),
						admin_url( 'edit.php' ) ) ),
				admin_url( 'edit.php?show_sticky=1' )
			),
			'priority'    => 130,
		) );

		// Add the featured content layout setting and control.
		$wp_customize->add_setting( 'featured_content_layout', array(
			'default'           => 'grid',
			'sanitize_callback' => '_fw_theme_sanitize_layout',
		) );

		$wp_customize->add_control( 'featured_content_layout', array(
			'label'   => __( 'Layout', 'unyson' ),
			'section' => 'featured_content',
			'type'    => 'select',
			'choices' => array(
				'grid'   => __( 'Grid', 'unyson' ),
				'slider' => __( 'Slider', 'unyson' ),
			),
		) );
	}

	add_action( 'customize_register', '_action_theme_customize_register' );

	/**
	 * Sanitize the Featured Content layout value.
	 *
	 * @param string $layout Layout type.
	 *
	 * @return string Filtered layout type (grid|slider).
	 * @internal
	 */
	function _fw_theme_sanitize_layout( $layout ) {
		if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
			$layout = 'grid';
		}

		return $layout;
	}

	/**
	 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
	 * @internal
	 */
	function _action_theme_customize_preview_js() {
		wp_enqueue_script(
			'fw-theme-customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'1.0',
			true
		);
	}

	add_action( 'customize_preview_init', '_action_theme_customize_preview_js' );
}

function _action_woocommerce(){
		add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', '_action_woocommerce' );
/**
 * Register widget areas.
 * @internal
 */
function _action_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'unyson' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'unyson' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'unyson' ),
		'id'            => 'shop-sidebar',
		'description'   => __( 'Displayed on the right of sidebar', 'unyson' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Head', 'unyson' ),
		'id'            => 'shop-head-sidebar',
		'description'   => __( 'Displayed on the right of sidebar', 'unyson' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}

add_action( 'widgets_init', '_action_theme_widgets_init' );

if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( '_action_theme_display_form_errors' ) ):
		function _action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'fw-theme-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', '_action_theme_display_form_errors');
endif;

add_filter( 'woocommerce_product_data_store_cpt_get_products_query', static function($wp_query_args, $query_vars, $data_store_cpt){
    if ( ! empty( $query_vars['meta_query'] ) ) {$wp_query_args['meta_query'][] = $query_vars['meta_query'];}
    return $wp_query_args;
}, 10, 3 );


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );


// add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
// add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main"><h2>Do your stuff</h2>';
}

function my_theme_wrapper_end() {
    echo '</section>';
}
add_action('woocommerce_before_main_content', 'fw_woocommerce_shop_container');
function fw_woocommerce_shop_container(){
	
}

add_action('woocommerce_before_shop_loop', 'fw_woocommerce_filters');
function fw_woocommerce_page_container(){
	?>
	<main class="main pt-4">
			<!-- End PageHeader -->
			<div class="page-content pb-10">
				<div class="container">
	<?php 
}
function fw_woocommerce_filters(){
	fw_woocommerce_page_container();
	fw_get_offer_banner();
	?>
	<nav class="toolbox toolbox-horizontal">
						<aside class="sidebar sidebar-fixed shop-sidebar">
							<div class="sidebar-overlay">
								<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
							</div>
							<!-- <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a> -->
							<div class="sidebar-content toolbox-left">
								<?php 
									dynamic_sidebar('shop-head-sidebar');
								?>
								<!-- <div class="toolbox-item select-menu">
									<a class="select-menu-toggle" href="#">Select Size</a>
									<ul class="filter-items">
										<li><a href="#">Small</a></li>
										<li><a href="#">Medium</a></li>
										<li><a href="#">Large</a></li>
										<li><a href="#">Extra Large</a></li>
									</ul>
								</div>
								<div class="toolbox-item select-menu">
									<a class="select-menu-toggle" href="#">Select Color</a>
									<ul class="filter-items">
										<li><a href="#">Black</a></li>
										<li><a href="#">Blue</a></li>
										<li><a href="#">Green</a></li>
									</ul>
								</div>
								<div class="toolbox-item select-menu">
									<a class="select-menu-toggle" href="#">Select Price</a>
									<ul class="filter-items">
										<li><a href="#">Rs.0.00 - Rs.50.00</a></li>
										<li><a href="#">Rs.50.00 - Rs.100.00</a></li>
										<li><a href="#">Rs.100.00 - Rs.200.00</a></li>
										<li><a href="#">Rs.200.00+</a></li>
									</ul>
								</div> -->
							</div>
						</aside>
						<!-- <div class="toolbox-left">
							<div class="toolbox-item toolbox-sort select-menu">
								<select name="orderby" class="form-control">
									<option value="default" selected="selected">Default Sorting</option>
									<option value="popularity">Most Popular</option>
									<option value="rating">Average rating</option>
									<option value="date">Latest</option>
									<option value="price-low">Sort forward price low</option>
									<option value="price-high">Sort forward price high</option>
									<option value="">Clear custom sort</option>
								</select>
							</div>
						</div> -->
						<!-- <div class="toolbox-right mr-0">
							<div class="toolbox-item toolbox-show select-menu">
								<select name="count" class="form-control">
									<option value="12">Show 12</option>
									<option value="24">Show 24</option>
									<option value="36">Show 36</option>
								</select>
							</div>
						</div> -->
					</nav>
					<!-- <div class="select-items">
						<a href="#" class="filter-clean text-primary">Clean All</a>
					</div> -->

	<?php 
}

// add_action('woocommerce_after_shop_loop', 'fw_woocommerce_shop_loop_end');



function fw_woocommerce_shop_loop_end(){
	// echo '</div>';
}
function fw_woocommerce_page_container_end(){
	?>
			</div>
		</div>
	</main>
	<?php
}

add_action('woocommerce_after_main_content', 'fw_woocommerce_page_container_end');

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'topupdeal_result_count', 'woocommerce_result_count', 20 );
add_filter('woocommerce_product_loop_start', 'product_loop_start');
function product_loop_start($stuff){
	// var_dump($stuff);
	return $stuff;
}



// add_action('woocommerce_before_single_product_summary', '_action_product_breadcrumb_and_navigation');
function _action_product_breadcrumb_and_navigation(){
	global $product;
	$post_prev = get_adjacent_post( false, '', true );
	$post_next = get_adjacent_post( false, '', false );
	?>
	<div class="product-navigation">
		<ul class="breadcrumb breadcrumb-lg">
			<li><a href="#"><i class="d-icon-home"></i></a></li>
			<li><?php fw_print_category_links($product) ?></li>
			<li><?php echo $product->name; ?></li>
		
		</ul>
		<ul class="product-nav">
			<?php 
				if($post_prev):
			?>
			<li class="product-nav-prev">
				<a href="<?php echo get_permalink($post_prev) ?>">
					<i class="d-icon-arrow-left"></i> Prev
					<span class="product-nav-popup">
						<img src="<?php echo get_the_post_thumbnail_url($post_prev, 'thumbnail') ?>" alt="product thumbnail" width="110" height="123">
						<span class="product-name"><?php echo $post_prev->post_title ?></span>
					</span>
				</a>
			</li>
			<?php 
				endif;
				if($post_next):
			?>
			<li class="product-nav-next">
				<a href="<?php echo get_permalink($post_next); ?>"> Next <i class="d-icon-arrow-right"></i>
					<span class="product-nav-popup">
						<img src="<?php echo get_the_post_thumbnail_url($post_next, 'thumbnail') ?>" alt="product thumbnail" width="110" height="123">
						<span class="product-name"><?php echo $post_next->post_title ?></span>
					</span>
				</a>
			</li>
			<?php 
				endif;
			?>
		</ul>
	</div>
	<?php
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' , 10);

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// add_action( 'woocommerce_single_product_summary', 'custom_woocommerce_template_single_meta', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta');

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'custom_woocommerce_template_single_rating', 10 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

function custom_woocommerce_template_single_rating(){
	global $product;
	fw_get_product_star_rating($product);
}
add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields($fields) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            $field['class'][] = 'form-group'; 

            // add form-control to the actual input
            $field['input_class'][] = 'form-control';
        }
    }
    return $fields;
}
add_filter('fw:option_type:icon-v2:packs', '_add_my_pack');

function _add_my_pack($default_packs) {
    /**
     * No fear. Defaults packs will be merged in back. You can't remove them.
     * Changing some flags for them is allowed.
     */
 //    $default_packs['d_icon'] = array(
	//     // array(
	//       // 'd_icon' => array(
	//         'name' => 'dicon', // same as key
	//         'title' => 'Donald Icon',
	//         'css_class_prefix' => 'd',
	//         'css_file' => get_template_directory_uri().'/css/donald-icon.css',
	//         'css_file_uri' => get_template_directory_uri().'/css/donald-icon.css'
	      
	//     // )
	// );
 //    return $default_packs;
    $path = get_template_directory_uri().'/css/donald-icon.css';
    $file = get_template_directory().'/css/donald-icon.css';

	
    $path_fa_five = get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css';
    $file_fa_five = get_template_directory() . '/vendor/fontawesome-free/css/all.min.css';

    // var_dump($path);
    return array(
      'd_icon' => array(
        'name' => 'd_icon', // same as key
        'title' => 'Donald',
        'css_class_prefix' => 'd-icon',
        'css_file' => $file,
        'css_file_uri' => $path
      ),
      'fontawesome_five' => array(
        'name' => 'fontawesome_five', // same as key
        'title' => 'Font awesome five',
        'css_class_prefix' => 'fa',
        'css_file' => $file_fa_five,
        'css_file_uri' => $path_fa_five
      )

    );
   //  return array(
   //  		'd_icon' =>  array(
		 //        'name' => 'dicon', // same as key
		 //        'title' => 'Donald Icon',
		 //        'css_class_prefix' => 'd',
		 //        'css_file' => get_template_directory_uri().'/css/donald-icon.css',
		 //        'css_file_uri' => get_template_directory_uri().'/css/donald-icon.css'
			// )
   //  );
}

add_action( 'admin_menu', function() {
    remove_submenu_page( 'themes.php', 'themes.php');
});

add_action('woocommerce_before_main_content', 'add_container_div');
function add_container_div(){
	echo '<div class="container pt-1">';
}

add_action('woocommerce_after_main_content', 'add_container_div_end');
function add_container_div_end(){
	echo '</div>';
}