<section class="banner-group row gutter-no mt-10 pt-4">
    <?php
        if(!empty($atts['offers'])):
            foreach($atts['offers'] as $offer):
    ?>
                    <div class="col-lg-6">
                        <div class="<?php echo $offer['content_position'] ?> banner banner-fixed" style="background-color: #1b72d3">
                            <figure>

                                <img src="<?php echo get_image_url($offer['offer_featured_image']); ?>" alt="banner" width="951" height="353" />
                                <!-- <img src="<?php echo get_template_directory_uri() ?>/images/demos/demo27/banner/5.jpg" alt="banner" width="951" height="353" /> -->
                            </figure>
                            <div class="banner-content y-50">
                                <h3 class="banner-title <?php echo $offer['text-color'] ?> ls-m appear-animate"
                                    data-animation-options="{'name':'blurIn', 'duration': '1.2s'}"><?php echo $offer['offer_title'] ?></h3>
                                <p class="ls-m appear-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.3s'
                                }"><?php echo $offer['offer_description'] ?></p>
                                <a href="<?php echo $offer['offer_url']; ?>" class="btn btn-outline btn-white appear-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.5s'
                                }">Shop now</a>
                            </div>
                        </div>
                    </div>
    <?php 
            endforeach;
        endif;
    ?>
                  
</section>