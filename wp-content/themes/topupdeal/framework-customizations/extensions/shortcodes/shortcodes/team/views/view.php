<section class="team-section pt-10 pb-9">
                    <div class="container">
                        <h2 class="title mt-2"><?php echo $atts['team_heading'] ?></h2>
                        <div class="row cols-sm-2 cols-md-4">
                            <?php 
                            if(!empty($atts['our_team'])):
                                foreach($atts['our_team'] as $member):
                            ?>
                            <div class="member appear-animate" data-animation-options="{'name': 'fadeInLeftShorter'}">
                                <figure style="width: 280px; height: 280px; overflow-y: hidden;">
                                    <?php 
                                        if(!empty($member['team_member_image'])){
                                            $url = $member['team_member_image']['url'];

                                        }else{
                                            $url = get_template_directory_uri().'/images/subpages/team1.jpg';
                                        }
                                    ?>
                                    <img src="<?php echo $url; ?>" alt="team member" width="280" height="280">
                                    <!-- <div class="overlay social-links">
                                        <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                        <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                    </div> -->
                                </figure>
                                <h4 class="member-name"><?php echo $member['team_member'] ?></h4>
                                <h5 class="member-job"><?php echo $member['team_member_post'] ?></h5>
                            </div>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                            
                        </div>
                    </div>
                </section>