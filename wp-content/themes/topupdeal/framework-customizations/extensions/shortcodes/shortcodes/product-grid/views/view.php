<section class="product-wrapper grey-section pb-2 pt-10 appear-animate"
data-animation-options="{'delay': '.3s'}">
<div class="container pb-10 pt-3">
    <div class="title-wrapper with-filters d-flex align-items-center justify-content-between">
        <h2 class="title title-simple">
            Latest Items
        </h2>
        <ul class="nav-filters product-filters filter-underline" data-target="#products-grid">
            <!-- <li><a href="#" class="nav-filter" data-filter=".mobile">Mobile</a></li>
            <li><a href="#" class="nav-filter" data-filter=".headphone">Headphone</a></li>
            <li><a href="#" class="nav-filter" data-filter=".camera">Camera</a></li>
            <li><a href="#" class="nav-filter" data-filter=".drone">Drone</a></li>
            <li><a href="#" class="nav-filter" data-filter=".speaker">Speaker</a></li> -->
            <!-- <li><a href="#" class="nav-filter active" data-filter="*">View all</a></li> -->
        </ul>
    </div>
    <div class="product-grid">
        <!-- <div class=""> -->
        <div class="row grid products-grid gutter-no bg-white" id="products-grid-alternate" >
            <div class="grid-space col-1"></div>
            <?php 
                foreach($atts['products']->products as $product_id){
                    $product = wc_get_product($product_id);
                    // var_dump($product);
                    get_template_part('product', 'display', ['product' => $product]);
                }
            ?>

            
        </div>
        <!-- </div> -->
    <a class="misha_loadmore btn btn-outline" data-max_pages="<?php echo $atts['products']->max_num_pages; ?>" data-current_page="<?php echo $atts['current'] ?>">Load More</a>
</div>
</div>
</section>