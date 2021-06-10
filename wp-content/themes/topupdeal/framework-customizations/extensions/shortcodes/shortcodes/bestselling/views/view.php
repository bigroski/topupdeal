<section class="product-wrapper grey-section pb-2 pt-10 appear-animate"
data-animation-options="{'delay': '.3s'}">
<div class="container pb-10 pt-3">
    <div class="title-wrapper with-filters d-flex align-items-center justify-content-between">
        <h2 class="title title-simple">
            <?php echo $atts['block_title']; ?>
        </h2>
        <ul class="nav-filters product-filters filter-underline" data-target="#products-grid">
            <?php 
            if(count($atts['bestsellers_categories']) > 0):
                foreach($atts['bestsellers_categories'] as $product_cat_id):
                    $category = get_term($product_cat_id, 'product_cat');

            ?>
            <li><a href="#" class="nav-filter" data-filter=".<?php echo $category->slug ?>"><?php echo $category->name ?></a></li>
            <?php 
                endforeach;
            endif;
            ?>
            <li><a href="#" class="nav-filter active" data-filter="*">View all</a></li>
        </ul>
    </div>
    <div class="product-grid">
        <div class="row grid  gutter-no bg-white" id="products-grid" data-grid-options="{
        'layoutMode': 'fitRows',
        'percentPosition': 'true'
    }">
    <?php 
    // var_dump($bestsellers);
        if(!empty($atts['bestsellers'])):
            foreach($atts['bestsellers'] as $bestseller):
    ?>
    <div class="grid-item col-xl-2 col-lg-3 col-sm-4 col-6 <?php print_product_cat_slugs($bestseller) ?>">
        
        <div class="product text-center">
            <figure class="product-media">
                <figure class="product-media">

                    <a href="<?php echo $bestseller->get_permalink(); ?>">
                        <?php 
                            echo $bestseller->get_image('medium-300');
                        ?>
                    </a>
                    <?php 
                        fw_sales_label($bestseller);
                    ?>
                    
                </figure>
                <?php fw_product_actions($bestseller); ?>
            </figure>
            <?php fw_get_product_detail($bestseller); ?>
            
        </div>
    </div>
    <?php 
            endforeach;
        endif;
    ?>
    
</div>
</div>
</div>
</section>