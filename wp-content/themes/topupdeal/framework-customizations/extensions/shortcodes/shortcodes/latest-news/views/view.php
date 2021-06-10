<section class="blog mt-10 pt-3">
                    <div class="container">
                        <h2 class="title title-simple text-left">Latest news</h2>
                        <div class="owl-carousel owl-theme row owl-nav-full cols-lg-3 cols-sm-2 cols-1"
                            data-owl-options="{
                            'items': 3,
                            'margin': 20,
                            'dots': false,
                            'nav': true,
                            'loop': false,
                            'responsive': {
                                '0': {
                                    'items': 1
                                },
                                '576': {
                                    'items': 2
                                },
                                '992': {
                                    'items': 3
                                }
                            }
                        }">
                        <?php 
                            $recent_posts = wp_get_recent_posts(array(
                                'numberposts' => 6, // Number of recent posts thumbnails to display
                                'post_status' => 'publish' // Show only the published posts
                            ));
                            if(!empty($recent_posts)):
                                foreach($recent_posts as $recent_post):
                        ?>
                            <div class="post overlay-zoom appear-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'delay': '.1s'}">
                                <figure class="post-media">
                                    <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url($recent_post['ID']) ?>" width="280" height="189" alt="post" />
                                    </a>
                                </figure>
                                <div class="post-details">
                                    
                                    <h3 class="post-title"><a href="<?php echo get_permalink($recent_post['post_title']) ?>"><?php echo $recent_post['post_title'] ?></a></h3>
                                    <a href="<?php echo get_permalink($recent_post['ID']) ?>" class="btn btn-link btn-underline btn-sm">Read More<i
                                            class="d-icon-arrow-right"></i></a>
                                </div>
                            </div>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                            
                        </div>
                    </div>
                </section>