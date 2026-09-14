<?php
/**
 * Instantiate theme modules on load (each guarded).
 *
 * @package GuruExpertPowerTools
 */

declare( strict_types = 1 );

defined( 'ABSPATH' ) || exit;

require GURUEXPERTPOWERTOOLS_DIR . 'inc/helpers.php';

$guruexpertpowertools_modules = array(
	'GuruExpertPowerTools\\Setup',
	'GuruExpertPowerTools\\Assets',
	'GuruExpertPowerTools\\Security',
	'GuruExpertPowerTools\\WooCommerce_Support',
	'GuruExpertPowerTools\\Ajax',
	'GuruExpertPowerTools\\Customizer',
	'GuruExpertPowerTools\\Schema',
	'GuruExpertPowerTools\\Content_Installer',
	'GuruExpertPowerTools\\Demo_Import',
	'GuruExpertPowerTools\\Single_Product',
		'GuruExpertPowerTools\\Merchant_Inspector',
);

foreach ( $guruexpertpowertools_modules as $guruexpertpowertools_class ) {
	try {
		if ( class_exists( $guruexpertpowertools_class ) ) {
			( new $guruexpertpowertools_class() )->hooks();
		}
	} catch ( \Throwable $e ) {
		error_log( 'Guru Expert Power Tools module ' . $guruexpertpowertools_class . ' failed: ' . $e->getMessage() );
	}
}

require GURUEXPERTPOWERTOOLS_DIR . 'inc/required-plugins.php';
