<section class="product-wrapper pt-10 pb-10 grey-section appear-animate"
                    data-animation-options="{'delay': '.3s'}">
                    <div class="container pt-3 pb-4">
                        <h2 class="title title-simple with-link">
                            <?php echo $atts['block_title'] ?>
                            <a href="<?php echo $atts['main_category_link']; ?>">View more<i class="fas fa-chevron-right"></i></a>
                        </h2>
                        <div class="product-grid owl-carousel owl-theme owl-nav-inner owl-split row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2 bg-white"
                            data-owl-options="{
                            'items': 6,
                            'margin': 1,
                            'loop': false,
                            'nav': true,
                            'dots': false,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '576': {
                                    'items': 3
                                },
                                '768': {
                                    'items': 4
                                },
                                '992': {
                                    'items': 5
                                },
                                '1200': {
                                    'items': 6
                                }
                            }
                        }">
                        <?php 
                            if(!empty($atts['products'])):
                                foreach($atts['products'] as $product):
                        ?>
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
                        <?php 
                                endforeach;
                            endif;
                        ?>
                            
                        </div>
                    </div>
                </section>