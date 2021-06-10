<section class="clients-section grey-section pt-10 pb-10">
                            <div class="container">
                                <h2 class="title mt-3">Our Clients</h2>
                                <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2 gutter-no pt-1"
                                    data-owl-options="{
                                    'items': 7,
                                    'nav': false,
                                    'dots': false,
                                    'autoplay': true,
                                    'margin': 30,
                                    'loop': true,
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
                                    foreach($atts['clients'] as $client):
                                ?>
                                    <figure><img src="<?php echo get_image_url($client) ?>" alt="brand" width="180" height="100" /></figure>
                                <?php 
                                    endforeach;
                                ?>
                                </div>
                            </div>
                        </section>