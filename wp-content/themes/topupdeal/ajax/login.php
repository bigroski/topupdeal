<div id="login-popup" class="login-popup">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#signin">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#register">Register</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="signin">
                    <?php 
                        woocommerce_login_form();
                    ?>
                    
                </div>
                <div class="tab-pane" id="register">
                    
                    
                    <form method="post" action="<?php echo wp_registration_url() ?>">
                        <div class="form-group">
                            <label for="user_login">Pick a name:</label>
                            <input type="text" class="form-control" id="user_login" name="user_login"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="user_email">Your email address:</label>
                            <input type="email" class="form-control" id="user_email" name="user_email"
                                required />
                        </div>
                        <!-- <div class="form-group">
                            <label for="singin-password">Password:</label>
                            <input type="password" class="form-control" id="register-password" name="register-password"
                                required />
                        </div> -->
                        <!-- <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree"
                                    required />
                                <label class="form-control-label font-secondary" for="register-agree">I agree to the
                                    privacy policy</label>
                            </div>
                        </div> -->
                        <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                    </form>
                    <div class="form-choice text-center hide">
                        <label class="font-secondary">Sign in with social account</label>
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>