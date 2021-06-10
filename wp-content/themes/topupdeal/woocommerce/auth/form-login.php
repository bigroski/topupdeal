<?php
/**
 * Auth form login
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/auth/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Auth
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_auth_page_header' ); ?>

<h1>
	<?php
	/* translators: %s: app name */
	printf( esc_html__( '%s would like to connect to your store', 'woocommerce' ), esc_html( $app_name ) );
	?>
</h1>

<?php wc_print_notices(); ?>

<p>
	<?php
	/* translators: %1$s: app name, %2$s: URL */
	echo wp_kses_post( sprintf( __( 'To connect to %1$s you need to be logged in. Log in to your store below, or <a href="%2$s">cancel and return to %1$s</a>', 'woocommerce' ), esc_html( wc_clean( $app_name ) ), esc_url( $return_url ) ) );
	?>
</p>

<form class="" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>

	<div class="form-group">
		<label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="form-control" name="username" id="username" autocomplete="username" />
	</div>
	<div class="form-group">
		<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input class="form-control" type="password" name="password" id="password" autocomplete="current-password" />
	</div>
	
	<?php do_action( 'woocommerce_login_form' ); ?>
	<div class="form-footer">
		<div class="form-checkbox">
        	<input type="checkbox" class="custom-checkbox" id="signin-remember" name="rememberme" value="forever" >
            <label class="form-control-label font-secondary" for="signin-remember">Remember me</label>
		</div>
        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"  class="lost-link font-secondary"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
    </div>
	
	<p class="form-row">
		<!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
			<input class="custom-checkbox woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
		</label> -->
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
		<button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn btn-primary btn-block" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
	</p>
	<!-- <p class="lost_password">
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
	</p> -->

	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>


<form method="post" class="wc-auth-login">
	<p class="form-row form-row-wide">
		<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" /><?php //@codingStandardsIgnoreLine ?>
	</p>
	<p class="form-row form-row-wide">
		<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input class="input-text" type="password" name="password" id="password" />
	</p>
	<p class="wc-auth-actions">
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<button type="submit" class="button button-large button-primary wc-auth-login-button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect_url ); ?>" />
	</p>
</form>

<?php do_action( 'woocommerce_auth_page_footer' ); ?>
