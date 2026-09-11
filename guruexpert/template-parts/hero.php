<?php
/**
 * Homepage hero: headline, CTAs, featured image + quick category chips.
 *
 * @package ToptechMachinery
 */

defined( 'ABSPATH' ) || exit;

$gx_shop = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
$gx_wa   = function_exists( 'rk_whatsapp_number' ) ? rk_whatsapp_number() : '254708777192';
$gx_cats = function_exists( 'rk_cached_terms' ) ? rk_cached_terms( 'product_cat', 8 ) : array();
?>
<section class="gx-hero">
	<div class="container gx-hero__grid">
		<div class="gx-hero__content">
			<span class="gx-eyebrow"><?php esc_html_e( 'Power tools . Solar . Hardware', 'toptech-machinery' ); ?></span>
			<h1 class="gx-hero__title"><?php esc_html_e( 'Genuine tools & solar power,', 'toptech-machinery' ); ?> <span><?php esc_html_e( 'priced for Kenya', 'toptech-machinery' ); ?></span></h1>
			<p class="gx-hero__lead"><?php esc_html_e( 'Shop Total, Ingco, Makita, Bosch, Solarmax and more - authorised stock, honest prices, and quick delivery from our Tom Mboya Street shop to anywhere in the country.', 'toptech-machinery' ); ?></p>
			<div class="gx-hero__cta">
				<a class="gx-btn gx-btn--solid" href="<?php echo esc_url( $gx_shop ); ?>"><?php esc_html_e( 'Shop all products', 'toptech-machinery' ); ?></a>
				<?php if ( $gx_wa ) : ?>
				<a class="gx-btn gx-btn--wa" href="https://wa.me/<?php echo esc_attr( $gx_wa ); ?>" target="_blank" rel="noopener nofollow">
					<svg viewBox="0 0 32 32" width="18" height="18" fill="currentColor" aria-hidden="true" focusable="false"><path d="M16 3C9.4 3 4 8.4 4 15c0 2.1.6 4.2 1.6 6L4 29l8.2-1.6c1.7.9 3.7 1.4 5.8 1.4C24.6 28.8 30 23.4 30 16.8 30 9.4 24.6 3 16 3zm0 23.6c-1.8 0-3.6-.5-5.1-1.4l-.4-.2-4.8 1 1-4.7-.3-.4C5.5 19 5 17 5 15c0-5.5 4.5-10 11-10s11 4.5 11 10-4.5 11.6-11 11.6z"/></svg>
					<?php esc_html_e( 'Order on WhatsApp', 'toptech-machinery' ); ?>
				</a>
				<?php endif; ?>
			</div>
			<ul class="gx-hero__points">
				<li><?php esc_html_e( 'Pay by M-PESA or on delivery', 'toptech-machinery' ); ?></li>
				<li><?php esc_html_e( 'Genuine brands + warranty', 'toptech-machinery' ); ?></li>
				<li><?php esc_html_e( 'Countrywide delivery in 1-5 days', 'toptech-machinery' ); ?></li>
			</ul>
		</div>
		<div class="gx-hero__media">
			<img src="<?php echo esc_url( TOPTECH_URI . 'assets/img/banner-tools.jpg' ); ?>" width="720" height="540" alt="<?php esc_attr_e( 'Power tools and equipment', 'toptech-machinery' ); ?>" fetchpriority="high" decoding="async">
			<div class="gx-hero__badge"><strong>15+</strong><span><?php esc_html_e( 'trusted brands in stock', 'toptech-machinery' ); ?></span></div>
		</div>
	</div>
	<?php if ( ! empty( $gx_cats ) && ! is_wp_error( $gx_cats ) ) : ?>
	<div class="container gx-quickcats">
		<span class="gx-quickcats__label"><?php esc_html_e( 'Popular:', 'toptech-machinery' ); ?></span>
		<?php foreach ( $gx_cats as $gx_c ) : ?>
			<a href="<?php echo esc_url( get_term_link( $gx_c ) ); ?>"><?php echo esc_html( $gx_c->name ); ?></a>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</section>
