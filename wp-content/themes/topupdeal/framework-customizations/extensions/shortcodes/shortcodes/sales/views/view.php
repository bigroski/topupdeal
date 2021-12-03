<section class="product-wrapper container mt-10 pt-1 appear-animate"
data-animation-options="{'delay': '.3s'}">
<h2 class="title title-simple with-link">
    <span class="d-flex align-items-center">
        <span class="mr-4 mt-1 mb-1">Items on Sales</span>
        <!-- <span
        class="countdown-container bg-dark d-flex align-items-center font-weight-normal text-white">
        <label>Ends In:</label><span class="countdown countdown-compact" data-format="HMS"
        data-until="2021, 8, 22" data-compact="true">00:00:00</span>
    </span> -->
</span><a href="#">View more<i class="fas fa-chevron-right"></i></a>
</h2>
<div class="product-grid">
    <div class="grid grid-float row gutter-no">
        <?php 
            foreach($main_sale as $ms):
        ?>
        <div class="grid-item col-lg-2 col-sm-6 height-x2">
                <div class="product text-center">
                    <figure class="product-media">
                        <!-- <a href="product.html">
                            <img src="<?php echo get_template_directory_uri() ?>/images/demos/demo27/products/1.jpg" alt="product" width="280"
                            height="221">
                        </a> -->
                        <a href="<?php echo $ms->get_permalink(); ?>">
                            <?php 
                                echo $ms->get_image('medium-300');
                            ?>
                            <!-- <img src="<?php echo get_template_directory_uri() ?>/images/demos/demo27/products/2.jpg" alt="product" width="148"
                            height="168"> -->
                        </a>
                        <?php 
                            fw_sales_label($ms);
                            fw_product_actions($ms);
                        ?>
                        
                    </figure>
                    <?php 
                        fw_get_product_detail($ms);
                    ?>
                </div>
        </div>
        <?php 
            endforeach;
            // var_dump(count($product_on_sales));
            // if($product_on_sales->have_posts()):
                
            if(count($product_on_sales) > 0):
                foreach($product_on_sales as $onSales):
        ?>
            <div class="grid-item col-lg-2 col-sm-6 height-x2">
                <div class="product text-center">
                    <figure class="product-media">

                        <a href="<?php echo $onSales->get_permalink(); ?>">
                            <?php 
                                echo $onSales->get_image();
                            ?>
                            <!-- <img src="<?php echo get_template_directory_uri() ?>/images/demos/demo27/products/2.jpg" alt="product" width="148"
                            height="168"> -->
                        </a>
                    </figure>
                    
                    <?php 
                            fw_sales_label($ms);
                    
                        fw_get_product_detail($onSales);
                    ?>
                </div>
            </div>
        <?php 
                endforeach;
            endif;
        ?>
        </div>
    </div>
</section>