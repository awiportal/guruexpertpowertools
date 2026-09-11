<?php
/**
 * Homepage category mosaic - image tiles with overlay (replaces the scroller).
 *
 * @package ToptechMachinery
 */

defined( 'ABSPATH' ) || exit;

if ( ! taxonomy_exists( 'product_cat' ) ) {
	return;
}
$gx_cats = function_exists( 'rk_cached_terms' ) ? rk_cached_terms( 'product_cat', 8 ) : array();
if ( empty( $gx_cats ) ) {
	return;
}
$gx_shop = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
?>
<section class="gx-section">
	<div class="container">
		<div class="gx-head">
			<div>
				<p class="gx-head__eyebrow"><?php esc_html_e( 'Browse the range', 'toptech-machinery' ); ?></p>
				<h2><?php esc_html_e( 'Shop by category', 'toptech-machinery' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( $gx_shop ); ?>"><?php esc_html_e( 'View all products', 'toptech-machinery' ); ?> &rarr;</a>
		</div>
		<div class="gx-catmosaic">
			<?php
			foreach ( $gx_cats as $gx_cat ) {
				$thumb_id = (int) get_term_meta( $gx_cat->term_id, 'thumbnail_id', true );
				$img      = $thumb_id
					? wp_get_attachment_image( $thumb_id, 'toptech-card', false, array( 'loading' => 'lazy', 'alt' => $gx_cat->name ) )
					: ( function_exists( 'wc_placeholder_img' ) ? wc_placeholder_img( 'toptech-card' ) : '' );
				printf(
					'<a class="gx-cat" href="%1$s"><span class="gx-cat__img">%2$s</span><span class="gx-cat__go" aria-hidden="true">&rarr;</span><span class="gx-cat__overlay"><span class="gx-cat__name">%3$s</span><span class="gx-cat__count">%4$s</span></span></a>',
					esc_url( get_term_link( $gx_cat ) ),
					$img, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP image markup.
					esc_html( $gx_cat->name ),
					esc_html( sprintf( _n( '%d product', '%d products', $gx_cat->count, 'toptech-machinery' ), $gx_cat->count ) )
				);
			}
			?>
		</div>
	</div>
</section>
