<?php
/**
 * Search results template.
 *
 * @package ToptechMachinery
 */

defined( 'ABSPATH' ) || exit;
get_header();

global $wp_query;
$rk_total = isset( $wp_query->found_posts ) ? (int) $wp_query->found_posts : 0;
?>
<nav class="rk-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'toptech-machinery' ); ?>">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'toptech-machinery' ); ?></a>
	<span class="rk-crumb-sep" aria-hidden="true">/</span>
	<span><?php esc_html_e( 'Search', 'toptech-machinery' ); ?></span>
</nav>
<main id="primary" class="site-main container rk-content">
	<header class="rk-content__head">
		<h1 class="page-title"><?php printf( esc_html__( 'Search results for &ldquo;%s&rdquo;', 'toptech-machinery' ), esc_html( get_search_query() ) ); ?></h1>
		<p class="rk-content__meta"><?php echo esc_html( sprintf( _n( '%s result', '%s results', $rk_total, 'toptech-machinery' ), number_format_i18n( $rk_total ) ) ); ?></p>
		<div class="rk-content__search"><?php get_search_form(); ?></div>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="rk-postlist">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'rk-post' ); ?>>
					<h2 class="rk-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="rk-post__meta"><?php echo esc_html( get_the_date() ); ?></div>
					<div class="rk-post__excerpt"><?php the_excerpt(); ?></div>
					<a class="rk-post__more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'toptech-machinery' ); ?> &rarr;</a>
				</article>
				<?php
			endwhile;
			?>
		</div>
		<?php
		the_posts_pagination(
			array(
				'mid_size'  => 1,
				'prev_text' => esc_html__( 'Previous', 'toptech-machinery' ),
				'next_text' => esc_html__( 'Next', 'toptech-machinery' ),
			)
		);
		?>
	<?php else : ?>
		<div class="rk-empty">
			<h2><?php esc_html_e( 'No results found', 'toptech-machinery' ); ?></h2>
			<p><?php esc_html_e( 'We could not find anything for that search. Check the spelling, try a different keyword, or browse the shop.', 'toptech-machinery' ); ?></p>
			<div class="rk-empty__actions">
				<a class="rk-btn rk-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'toptech-machinery' ); ?></a>
				<?php if ( function_exists( 'wc_get_page_permalink' ) ) : ?>
					<a class="rk-btn rk-btn--navy" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Browse shop', 'toptech-machinery' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="rk-empty__search"><?php get_search_form(); ?></div>
		</div>
	<?php endif; ?>
</main>
<?php
get_footer();
