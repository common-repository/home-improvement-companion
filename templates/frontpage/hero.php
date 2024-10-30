<?php
/**
 * Home Improvement Homepage Hero Template
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use HomeImprovementCompanion\App\Frontend\Templates;

$hi_banner_type = get_theme_mod( 'mod_data_banner_type', 'banner-one' );

$hi_template = new Templates();
$hi_template->get( 'banners/' . $hi_banner_type );
