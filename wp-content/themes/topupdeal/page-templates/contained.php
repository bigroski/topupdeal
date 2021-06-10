<?php
/**
 * Template Name: Contained Page
 */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header(); ?>


<?php
    
?>
    <!-- <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main"> -->

            <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();
                do_action( 'storefront_page_before' );


                    ?>
                    <div class="page-header" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/page-header.jpg)">
                        <h1 class="page-title"><?php the_title() ?></h1>
                    </div>
                    <div class="page-content mt-10 pt-7">

                    <?php
                    echo '<section><div class="container"><div class="row"><div class="col">';
                    the_content();
                    echo '</div></div></div></section>';
                    // Include the page content template.
                    do_action( 'storefront_page_after' );
                    
                    echo '</div>';
                endwhile;
            ?>

        <!-- </div>#content -->
    <!-- </div>#primary -->
    <?php // get_sidebar( 'content' ); ?>
<!-- </div>#main-content -->

<?php
// get_sidebar();
get_footer();

