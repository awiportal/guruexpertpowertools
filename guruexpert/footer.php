<?php
/**
 * Site footer.
 *
 * @package ToptechMachinery
 */

defined( 'ABSPATH' ) || exit;

$rk_phone    = get_theme_mod( 'toptech_phone', '+254 708 777192' );
$rk_email    = get_theme_mod( 'toptech_email', 'info@guruexpertpowertools.co.ke' );
$rk_address  = get_theme_mod( 'toptech_address', 'Magomano House, 1st Floor, Room 10D, Tom Mboya Street, Nairobi' );
$rk_whatsapp = get_theme_mod( 'toptech_whatsapp', '254708777192' );
?>
</div><!-- #content -->
<footer class="rk-footer">
	<div class="container">
		<div class="rk-footer__cols">
			<div>
				<h3><?php bloginfo( 'name' ); ?></h3>
				<p><strong><?php esc_html_e( 'Address:', 'toptech-machinery' ); ?></strong><br><?php echo esc_html( $rk_address ); ?></p>
				<p><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $rk_phone ) ); ?>"><?php echo esc_html( $rk_phone ); ?></a> &middot; <a href="mailto:<?php echo esc_attr( $rk_email ); ?>"><?php echo esc_html( $rk_email ); ?></a></p>
			</div>
			<div>
				<h3><?php esc_html_e( 'Customer Service', 'toptech-machinery' ); ?></h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_service', 'container' => false, 'fallback_cb' => false, 'depth' => 1 ) ); ?>
			</div>
			<div>
				<h3><?php esc_html_e( 'Policies', 'toptech-machinery' ); ?></h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_policies', 'container' => false, 'fallback_cb' => false, 'depth' => 1 ) ); ?>
			</div>
			<div>
				<h3><?php esc_html_e( 'We Accept', 'toptech-machinery' ); ?></h3>
				<div class="rk-payments">
					<span>M-PESA</span><span>Visa</span><span>Mastercard</span><span>Cash on Delivery</span>
				</div>
				<h3 style="margin-top:18px"><?php esc_html_e( 'Secure Shopping', 'toptech-machinery' ); ?></h3>
				<div class="rk-payments"><span>SSL Secured</span><span>Verified Business</span></div>
			</div>
		</div>
	</div>
	<div class="rk-footer__bar">
		<div class="container">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'toptech-machinery' ); ?>
		</div>
	</div>
</footer>

<a class="rk-whatsapp" href="https://wa.me/<?php echo esc_attr( $rk_whatsapp ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'toptech-machinery' ); ?>">
	<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15l-1.4 5 5.1-1.3A10 10 0 1 0 12 2Zm5.3 14.1c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.3-.7-2.8-1.1-4.5-3.9-4.7-4.1-.1-.2-1-1.4-1-2.6s.6-1.8.9-2.1c.2-.2.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 1.9c.1.2.1.4 0 .5l-.4.5c-.2.2-.3.4-.1.6.2.4.9 1.4 1.9 2.3 1.3 1.1 2.3 1.4 2.5 1.5.2.1.4.1.6-.1l.7-.9c.2-.3.4-.2.6-.1l1.8.9c.2.1.4.2.5.3.1.3.1.7-.1 1.3Z"/></svg>
</a>
<button class="rk-backtop" aria-label="<?php esc_attr_e( 'Back to top', 'toptech-machinery' ); ?>">&uarr;</button>

<?php
/* Mobile bottom navigation bar (shown on small screens only). */
$gx_bn_home    = home_url( '/' );
$gx_bn_shop    = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : $gx_bn_home;
$gx_bn_cart    = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $gx_bn_home;
$gx_bn_account = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : $gx_bn_home;
$gx_bn_count   = ( function_exists( 'WC' ) && WC() && WC()->cart ) ? (int) WC()->cart->get_cart_contents_count() : 0;
?>
<nav class="gx-botnav" aria-label="<?php esc_attr_e( 'Quick navigation', 'toptech-machinery' ); ?>">
	<a class="gx-botnav__item" href="<?php echo esc_url( $gx_bn_home ); ?>">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/><path d="M9.5 21v-6h5v6"/></svg>
		<span><?php esc_html_e( 'Home', 'toptech-machinery' ); ?></span>
	</a>
	<a class="gx-botnav__item" href="<?php echo esc_url( $gx_bn_shop ); ?>">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 9h16l-1.2-4.3A1 1 0 0 0 17.8 4H6.2a1 1 0 0 0-1 .7L4 9z"/><path d="M5 9v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9"/><path d="M9.5 20v-5h5v5"/></svg>
		<span><?php esc_html_e( 'Shop', 'toptech-machinery' ); ?></span>
	</a>
	<?php if ( $rk_whatsapp ) : ?>
	<a class="gx-botnav__item gx-botnav__item--wa" href="https://wa.me/<?php echo esc_attr( $rk_whatsapp ); ?>" target="_blank" rel="noopener nofollow">
		<span class="gx-botnav__wa"><svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true"><path d="M16 3C9.4 3 4 8.4 4 15c0 2.1.6 4.2 1.6 6L4 29l8.2-1.6c1.7.9 3.7 1.4 5.8 1.4C24.6 28.8 30 23.4 30 16.8 30 9.4 24.6 3 16 3zm0 23.6c-1.8 0-3.6-.5-5.1-1.4l-.4-.2-4.8 1 1-4.7-.3-.4C5.5 19 5 17 5 15c0-5.5 4.5-10 11-10s11 4.5 11 10-4.5 11.6-11 11.6zm6-8.3c-.3-.2-2-1-2.3-1.1-.3-.1-.5-.2-.8.2-.2.3-.9 1.1-1.1 1.3-.2.2-.4.2-.7.1-.3-.2-1.4-.5-2.6-1.6-1-.9-1.6-1.9-1.8-2.3-.2-.3 0-.5.1-.7.1-.1.3-.4.5-.6.1-.2.2-.3.3-.5.1-.2 0-.4 0-.6-.1-.2-.8-1.9-1.1-2.6-.3-.7-.6-.6-.8-.6h-.7c-.2 0-.6.1-.9.4-.3.3-1.2 1.2-1.2 2.9s1.2 3.4 1.4 3.6c.2.2 2.4 3.7 5.8 5.1.8.3 1.4.5 1.9.7.8.3 1.5.2 2.1.1.6-.1 2-.8 2.3-1.6.3-.8.3-1.4.2-1.6-.1-.1-.3-.2-.6-.4z"/></svg></span>
		<span><?php esc_html_e( 'WhatsApp', 'toptech-machinery' ); ?></span>
	</a>
	<?php endif; ?>
	<a class="gx-botnav__item" href="<?php echo esc_url( $gx_bn_cart ); ?>" data-rk-drawer-open>
		<span class="gx-botnav__ico">
			<?php echo rk_icon( 'cart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static inline SVG. ?>
			<span class="gx-botnav__count<?php echo $gx_bn_count ? '' : ' is-empty'; ?>"><?php echo esc_html( $gx_bn_count ); ?></span>
		</span>
		<span><?php esc_html_e( 'Cart', 'toptech-machinery' ); ?></span>
	</a>
	<a class="gx-botnav__item" href="<?php echo esc_url( $gx_bn_account ); ?>">
		<?php echo rk_icon( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static inline SVG. ?>
		<span><?php esc_html_e( 'Account', 'toptech-machinery' ); ?></span>
	</a>
</nav>

<?php if ( function_exists( 'woocommerce_mini_cart' ) ) : ?>
<div class="rk-drawer" aria-hidden="true">
	<div class="rk-drawer__overlay" data-rk-drawer-close></div>
	<aside class="rk-drawer__panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Shopping cart', 'toptech-machinery' ); ?>">
		<div class="rk-drawer__head">
			<h3><?php esc_html_e( 'Your Cart', 'toptech-machinery' ); ?></h3>
			<button type="button" class="rk-drawer__close" data-rk-drawer-close aria-label="<?php esc_attr_e( 'Close cart', 'toptech-machinery' ); ?>">&times;</button>
		</div>
		<div class="rk-drawer__body">
			<div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
		</div>
		<div class="rk-drawer__foot">
			<a class="rk-btn rk-btn--ghost rk-btn--block" href="#" data-rk-drawer-close><?php esc_html_e( 'Continue shopping', 'toptech-machinery' ); ?></a>
			<a class="rk-btn rk-btn--primary rk-btn--block rk-drawer__checkout" href="<?php echo esc_url( function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : '' ); ?>"><?php esc_html_e( 'Proceed to checkout', 'toptech-machinery' ); ?></a>
		</div>
		<div class="rk-drawer__spin" aria-hidden="true"><span class="rk-spinner"></span></div>
	</aside>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
