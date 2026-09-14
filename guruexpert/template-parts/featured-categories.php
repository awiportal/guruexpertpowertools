<?php
/**
 * Homepage "Shop by category": a single horizontal row that slides left/right,
 * so customers see many product categories at a glance the moment they land.
 *
 * @package ToptechMachinery
 */

defined( 'ABSPATH' ) || exit;

if ( ! taxonomy_exists( 'product_cat' ) ) {
	return;
}
$gx_cats = function_exists( 'rk_cached_terms' ) ? rk_cached_terms( 'product_cat', 16 ) : array();
if ( empty( $gx_cats ) || is_wp_error( $gx_cats ) ) {
	return;
}
$gx_shop = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
?>
<section class="gx-section gx-catrow-sec">
	<div class="container">
		<div class="gx-head">
			<div>
				<p class="gx-head__eyebrow"><?php esc_html_e( 'Browse the range', 'toptech-machinery' ); ?></p>
				<h2><?php esc_html_e( 'Shop by category', 'toptech-machinery' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( $gx_shop ); ?>"><?php esc_html_e( 'View all products', 'toptech-machinery' ); ?> &rarr;</a>
		</div>
	</div>

	<div class="container gx-catrow" data-gx-catrow>
		<button type="button" class="gx-catrow__nav gx-catrow__nav--prev" aria-label="<?php esc_attr_e( 'Scroll categories left', 'toptech-machinery' ); ?>" hidden>
			<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 5l-7 7 7 7"/></svg>
		</button>

		<div class="gx-catrow__vp" data-gx-catrow-vp>
			<div class="gx-catrow__track">
				<?php
				foreach ( $gx_cats as $gx_cat ) {
					$thumb_id = (int) get_term_meta( $gx_cat->term_id, 'thumbnail_id', true );
					$img      = $thumb_id
						? wp_get_attachment_image( $thumb_id, 'toptech-card', false, array( 'loading' => 'lazy', 'alt' => $gx_cat->name ) )
						: ( function_exists( 'wc_placeholder_img' ) ? wc_placeholder_img( 'toptech-card' ) : '' );
					printf(
						'<a class="gx-cat" href="%1$s"><span class="gx-cat__img">%2$s</span><span class="gx-cat__overlay"><span class="gx-cat__name">%3$s</span><span class="gx-cat__count">%4$s</span></span></a>',
						esc_url( get_term_link( $gx_cat ) ),
						$img, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP image markup.
						esc_html( $gx_cat->name ),
						esc_html( sprintf( _n( '%d product', '%d products', $gx_cat->count, 'toptech-machinery' ), $gx_cat->count ) )
					);
				}
				?>
			</div>
		</div>

		<button type="button" class="gx-catrow__nav gx-catrow__nav--next" aria-label="<?php esc_attr_e( 'Scroll categories right', 'toptech-machinery' ); ?>" hidden>
			<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 5l7 7-7 7"/></svg>
		</button>
	</div>
</section>
