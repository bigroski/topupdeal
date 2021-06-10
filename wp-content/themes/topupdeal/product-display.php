<?php 
$product = $args['product'];
?>
<div class="grid-item col-xl-2 col-lg-3 col-sm-4 col-6 speaker">
        <div class="product text-center">
            <figure class="product-media">
                <a href="<?php echo $product->get_permalink(); ?>">
                    <?php 
                        echo $product->get_image('medium-300');
                    ?>
                </a>
                <?php 
                    fw_sales_label($product);
                ?>
            </figure>
            <?php 
                fw_get_product_detail($product);
            ?>
        </div>
    </div>