<?php
/**
 * Homepage: hero, benefits, category mosaic, promo split, product rows,
 * brand strip and closing call to action.
 *
 * @package ToptechMachinery
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="site-main gx-home">

	<?php get_template_part( 'template-parts/hero' ); ?>

	<?php get_template_part( 'template-parts/trust-band' ); ?>

	<?php get_template_part( 'template-parts/featured-categories' ); ?>

	<?php get_template_part( 'template-parts/promo-split' ); ?>

	<?php get_template_part( 'template-parts/brand-strip' ); ?>

	<div class="gx-home__rows">
		<?php
		/**
		 * Product rows, one per featured category. Slugs can be changed via the
		 * toptech_homepage_categories filter or by editing this array.
		 */
		$rk_sections = apply_filters(
			'toptech_homepage_categories',
			array( 'water-pumps', 'power-tools', 'solar-panels', 'welding-machines', 'generators', 'batteries' )
		);
		foreach ( $rk_sections as $rk_slug ) {
			set_query_var( 'rk_cat_slug', $rk_slug );
			get_template_part( 'template-parts/product-section' );
		}
		?>
	</div>

	<?php get_template_part( 'template-parts/cta-band' ); ?>

</main>
<?php
get_footer();
