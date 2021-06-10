<section class="banner3 banner mt-10"
                    style="background-image: url(<?php echo get_image_url($atts['background_image']); ?>); background-color: #252628">
                    <div class="container">
                        <div class="banner-content d-block d-lg-flex justify-content-between align-items-center">
                            <h3 class="banner-title mb-lg-0 mr-8 ls-normal text-white text-uppercase font-weight-normal appear-animate"
                                data-animation-options="{'name':'fadeInLeft', 'delay': '.3s'}">
                                <?php echo $atts['block_title']; ?>
                                <!-- <strong>Black</strong>
                                Friday Sale -->
                            </h3>
                            <h4 class="banner-subtitle mb-lg-0 mr-8 ls-normal font-italic text-white text-uppercase font-weight-normal appear-animate"
                                data-animation-options="{'name':'blurIn'}"><strong><?php echo $atts['sub_title'] ?></strong></h4>
                            <a href="<?php echo $atts['block_url']; ?>" class="btn btn-primary appear-animate"
                                data-animation-options="{'name':'fadeInRight', 'delay': '.3s'}">Shop now</a>
                        </div>
                    </div>
                </section>
                