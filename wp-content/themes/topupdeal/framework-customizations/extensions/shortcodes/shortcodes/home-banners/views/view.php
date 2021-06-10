<section class="intro-section container">
                    <div class="row grid">
                        <div class="grid-item col-lg-8 height-x2 appear-animate"
                            data-animation-options="{'name': 'fadeInRightShorter'}">
                            <div class="intro-slide1 banner banner-fixed" style="background-color: #f5f6f8">
                                <figure>
                                    <?php 
                                    // var_dump($atts);
                                    ?>
                                    <!-- /images/demos/demo3/slides/2.jpg -->
                                    <img src="<?php echo get_image_url($atts['primary_featured_image']) ?>" alt="banner" width="785" height="433" />
                                </figure>
                                <div class="banner-content w-100 x-50 text-center">
                                    <h3 class="banner-title ls-m "><?php echo $atts['primary_main_title'] ?></h3>
                                    <h4 class="banner-subtitle mb-5 font-weight-normal text-body text-white"><?php echo $atts['primary_sub_title'] ?></h4>
                                    <a href="<?php echo $atts['primary_url'] ?>" class="btn btn-primary">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-lg-4 col-sm-6 height-x2 appear-animate"
                            data-animation-options="{'name': 'fadeInDownShorter'}">
                            <div class="intro-banner1 banner banner-fixed" style="background-color: #ebecee">
                                <a href="#">
                                    <figure>
                                        <!-- <?php echo get_template_directory_uri() ?>/images/demos/demo27/banner/2.jpg -->
                                        <img src="<?php echo get_image_url($atts['primary_right_featured_image']) ?>" alt="banner" width="385"
                                            height="433" />
                                    </figure>
                                </a>
                                <div class="banner-content w-100 x-50 text-center">
                                    <h4 class="banner-subtitle mb-3 font-weight-normal text-body"><?php echo $atts['primary_right_sub_title'] ?></h4>
                                    <h3 class="banner-title mb-0 font-weight-bold ls-m text-primary"><?php echo $atts['primary_right_main_title'] ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php 
                        // var_dump($atts);
                        // foreach($atts['featured_items_box'] as $keay=> $featured)
                        ?>
                        <?php 
                            foreach($atts['featured_items_box'] as $key => $featured):
                        ?>
                        <div class="grid-item col-sm-6 height-x1 appear-animate"
                            data-animation-options="{'name': 'fadeInUpShorter'}">
                            <div class="intro-banner2 banner banner-fixed overlay-light"
                                style="background-color: #fff296">
                                <figure>
                                    <img src="<?php echo get_image_url($featured['box_featured_image']); ?>" alt="banner" width="585" height="213" />
                                </figure>
                                <div class="banner-content w-100 y-50">
                                    <h4 class="banner-subtitle mb-1 <?php echo $featured['text-color'] ?>"><?php echo $featured['box_top_title'] ?></h4>
                                    <h3 class="banner-title ls-m text-uppercase <?php echo $featured['text-color'] ?>"><?php echo $featured['box_main_title'] ?></h3>
                                    <p class="font-weight-semi-bold <?php echo $featured['text-color'] ?> ls-m"><?php echo $featured['box_sub_title']; ?></p>
                                    <a href="<?php echo $featured['box_url'] ?>" class="btn btn-primary btn-md">Shop now<i
                                            class="d-icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endforeach;
                        ?>
                        
                        <div class="grid-space col-1"></div>
                    </div>
                </section>