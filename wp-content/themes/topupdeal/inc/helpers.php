<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Register Lato Google font.
 *
 * @return string
 */
function fw_theme_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'unyson' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ),
			"//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Getter function for Featured Content Plugin.
 *
 * @return array An array of WP_Post objects.
 */
function fw_theme_get_featured_posts() {
	/**
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'fw_theme_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function fw_theme_has_featured_posts() {
	return ! is_paged() && (bool) fw_theme_get_featured_posts();
}

if ( ! function_exists( 'fw_theme_the_attached_image' ) ) : /**
 * Print the attached image with a link to the next attached image.
 */ {
	function fw_theme_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'fw_theme_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}
endif;

if ( ! function_exists( 'fw_theme_list_authors' ) ) : /**
 * Print a list of all site contributors who published at least one post.
 */ {
	function fw_theme_list_authors() {
		$contributor_ids = get_users( array(
			'fields'  => 'ID',
			'orderby' => 'post_count',
			'order'   => 'DESC',
			'who'     => 'authors',
		) );

		foreach ( $contributor_ids as $contributor_id ) :
			$post_count = count_user_posts( $contributor_id );

			// Move on if user has not published a post (yet).
			if ( ! $post_count ) {
				continue;
			}
			?>

			<div class="contributor">
				<div class="contributor-info">
					<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
					<div class="contributor-summary">
						<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name',
								$contributor_id ); ?></h2>

						<p class="contributor-bio">
							<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
						</p>
						<a class="button contributor-posts-link"
						   href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
							<?php printf( _n( '%d Article', '%d Articles', $post_count, 'unyson' ), $post_count ); ?>
						</a>
					</div>
					<!-- .contributor-summary -->
				</div>
				<!-- .contributor-info -->
			</div><!-- .contributor -->

		<?php
		endforeach;
	}
}
endif;

/**
 * Custom template tags
 */
{
	if ( ! function_exists( 'fw_theme_paging_nav' ) ) : /**
	 * Display navigation to next/previous set of posts when applicable.
	 */ {
		function fw_theme_paging_nav( $wp_query = null ) {

			if ( ! $wp_query ) {
				$wp_query = $GLOBALS['wp_query'];
			}

			// Don't print empty markup if there's only one page.

			if ( $wp_query->max_num_pages < 2 ) {
				return;
			}

			$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			$pagenum_link = html_entity_decode( get_pagenum_link() );
			$query_args   = array();
			$url_parts    = explode( '?', $pagenum_link );

			if ( isset( $url_parts[1] ) ) {
				wp_parse_str( $url_parts[1], $query_args );
			}

			$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
			$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

			$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
				'index.php' ) ? 'index.php/' : '';
			$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
				'paged' ) : '?paged=%#%';

			// Set up paginated links.
			$links = paginate_links( array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $wp_query->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 1,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => __( '&larr; Previous', 'unyson' ),
				'next_text' => __( 'Next &rarr;', 'unyson' ),
			) );

			if ( $links ) :

				?>
				<nav class="navigation paging-navigation" role="navigation">
					<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'unyson' ); ?></h1>

					<div class="pagination loop-pagination">
						<?php echo $links; ?>
					</div>
					<!-- .pagination -->
				</nav><!-- .navigation -->
			<?php
			endif;
		}
	}
	endif;

	if ( ! function_exists( 'fw_theme_post_nav' ) ) : /**
	 * Display navigation to next/previous post when applicable.
	 */ {
		function fw_theme_post_nav() {
			// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
				true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}

			?>
			<nav class="navigation post-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'unyson' ); ?></h1>

				<div class="nav-links">
					<?php
					if ( is_attachment() ) :
						previous_post_link( '%link',
							__( '<span class="meta-nav">Published In</span>%title', 'unyson' ) );
					else :
						previous_post_link( '%link',
							__( '<span class="meta-nav">Previous Post</span>%title', 'unyson' ) );
						next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>%title', 'unyson' ) );
					endif;
					?>
				</div>
				<!-- .nav-links -->
			</nav><!-- .navigation -->
		<?php
		}
	}
	endif;

	if ( ! function_exists( 'fw_theme_posted_on' ) ) : /**
	 * Print HTML with meta information for the current post-date/time and author.
	 */ {
		function fw_theme_posted_on() {
			if ( is_sticky() && is_home() && ! is_paged() ) {
				echo '<span class="featured-post">' . __( 'Sticky', 'unyson' ) . '</span>';
			}

			// Set up and print post meta information.
			printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}
	}
	endif;

	/**
	 * Find out if blog has more than one category.
	 *
	 * @return boolean true if blog has more than 1 category
	 */
	function fw_theme_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'fw_theme_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_the_cool_cats = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'fw_theme_category_count', $all_the_cool_cats );
		}

		if ( 1 !== (int) $all_the_cool_cats ) {
			// This blog has more than 1 category so fw_theme_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so fw_theme_categorized_blog should return false
			return false;
		}
	}

	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index
	 * views, or a div element when on single views.
	 */
	function fw_theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$current_position = false;
		if (function_exists('fw_ext_sidebars_get_current_position')) {
			$current_position = fw_ext_sidebars_get_current_position();
		}



		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php
				if ( ( in_array( $current_position,
						array( 'full', 'left' ) ) || is_page_template( 'page-templates/full-width.php' )
					|| empty($current_position)
				)
				) {
					the_post_thumbnail( 'fw-theme-full-width' );
				} else {
					the_post_thumbnail();
				}
				?>
			</div>

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php
				if ( ( in_array( $current_position,
						array( 'full', 'left' ) ) || is_page_template( 'page-templates/full-width.php' ) )
						|| empty($current_position)
				) {
					the_post_thumbnail( 'fw-theme-full-width' );
				} else {
					the_post_thumbnail();
				}
				?>
			</a>

		<?php endif; // End is_singular()
	}
}


// return the image from custom field
function get_image_url($image_array){
	return $image_array['url'];
}


/**
* Return all the products with sales
*/
function getSalesItems($limit = 8){
		$args = array(
		    'posts_per_page' => $limit,

		    'meta_query'     => array(
		        'relation' => 'OR',
		        array( // Simple products type
		            'key'           => '_sale_price',
		            'value'         => 0,
		            'compare'       => '>',
		            'type'          => 'numeric'
		        ),
		        array( // Variable products type
		            'key'           => '_min_variation_sale_price',
		            'value'         => 0,
		            'compare'       => '>',
		            'type'          => 'numeric'
		        )
		    )
		);

		$loop = new WC_Product_Query( $args );
		return $loop->get_products();
	}
function fw_print_category_links($product){
	$categories = $product->get_category_ids();
	if(!empty($categories)):
    	foreach($categories as $category_id):
    		if($category_id != 15){

	        	$category = get_term($category_id, 'product_cat');
	            echo '<a href="'.get_term_link($category).'">'.$category->name.'</a>';
    		}
        endforeach;
	endif;

}
function print_product_cat_slugs($product){
	$categories = $product->get_category_ids();
	if(!empty($categories)):
    	foreach($categories as $category_id):
    		// if($category_id != 15){

	        	$category = get_term($category_id, 'product_cat');
	            echo $category->slug.' ';
    		// }
        endforeach;
	endif;

}
function fw_get_product_star_rating($product){
	$average_rating = $product->get_average_rating();
	$total_rating = $product->get_rating_count();
	$percent = 0;
	if($total_rating > 0){
		$percent  = ($average_rating * 100 )/5;
	}
	// var_dump($average_rating);
	// var_dump($total_rating);
	// var_dump($percent);
	echo '<div class="ratings-container">
			<div class="ratings-full">
				<span class="ratings" style="width:'.$percent.'%"></span>
	            <span class="tooltiptext tooltip-top"></span>
	        </div>
	      </div>';
	// var_dump($rating_html);
}
function fw_get_product_detail($product){
	?>
	<div class="product-details">
		<div class="product-cat">
        	<?php 
            	fw_print_category_links($product);
            ?>
        </div>
        <h3 class="product-name">
        	<a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->name; ?></a>
		</h3>
        <div class="product-price">
        	<?php 
        		if($product->sale_price != ''):
        	?>
        	<ins class="new-price">Rs.<?php echo $product->price; ?></ins><del class="old-price">Rs.<?php echo $product->regular_price ?></del>
        	<?php 
        		else:
        	?>
			<span class="price">Rs.<?php echo $product->price; ?></span>
        	<?php 
        		endif;
        	?>
        </div>
		<?php 
        	fw_get_product_star_rating($product);
        ?>
        </div>
<?php
}
function fw_get_best_sellers($categories, $picker){
	$args = array(
		    'posts_per_page' => 16,

		    'tax_query' => array(
		    	'relation' => 'AND',
		        array(
		            'taxonomy' => 'product_cat',
		            'terms'    => $categories,
		        ),
		        array(
		            'taxonomy' => 'product_cat',
		            'field'    => 'term_id',
		            'terms'    => $picker,
		        ),
		    ),
		);

		$loop = new WC_Product_Query( $args );
		$products =  $loop->get_products();
		return $products;
		// var_dump($products);
}
function fw_get_product_by_categories($categories, $limit= 7){
	$args = array(
		    'posts_per_page' => 7,

		    'tax_query' => array(
		    	// 'relation' => 'AND',
		        array(
		            'taxonomy' => 'product_cat',
		            'terms'    => $categories,
		        ),
		    ),
		);

		$loop = new WC_Product_Query( $args );
		$products =  $loop->get_products();
		return $products;
		// var_dump($products);
}
function fw_sales_label($product){
	// var_dump($product);
	if($product->sale_price){
		$reduction_percent = (($product->regular_price - $product->sale_price) / $product->regular_price )* 100;
		echo '<div class="product-label-group">
			<label class="product-label label-sale">'.round($reduction_percent).'% off</label>
           </div>';
	}
}
function fw_product_actions($product){
	return ;
	echo '<div class="product-action-vertical">
			<a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i
                            class="d-icon-bag"></i></a>
			<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
          </div>
          <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                View</a>
                        </div>';
}
// get the content of the offer
function fw_get_offer_banner(){
	?>
	<div class="shop-banner banner" style="background-image: url(<?php echo get_image_url(fw_get_db_settings_option('offer_background_image')) ?>); background-color: #eee;">
		<div class="banner-content">
			<h3 class="banner-subtitle mb-2 text-uppercase ls-l text-primary font-weight-bold"><?php echo fw_get_db_settings_option('offer_top_title') ?>
			</h3>
			<h1 class="banner-title mb-1 text-uppercase ls-m font-weight-bold"><?php echo fw_get_db_settings_option('offer_main_title') ?></h1>
			<p class="font-primary ls-m text-dark"><?php echo fw_get_db_settings_option('offer_sub_title') ?></p>
			<a href="<?php echo fw_get_db_settings_option('offer_url') ?>" class="btn btn-outline btn-dark">Shop now</a>
		</div>
	</div>
	
	<?php
}