<?php

/**
 * Home Improvement Companion
 * For modified and add option to Site Identity customizer sections
 *
 * @package   home-improvement-companion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use HomeImprovementCompanion\Config\Requirements;

$hi_requirement = new Requirements();


if ( ! $hi_requirement->checkPluginIsActivated( 'One Click Demo Import' ) ) :
	new \Kirki\Section(
		'install-demo-importer',
		array(
			'title'       => '&nbsp;',
			'panel'       => 'import_demo',
			'type'        => 'link',
			'button_text' => esc_html__( 'Install Demo Importer', 'home-improvement' ),
			'button_url'  => 'javascript:void(0)',
		)
	);
elseif ( $hi_requirement->checkPluginIsActivated( 'One Click Demo Import' ) ) :
	new \Kirki\Section(
		'install-demo-importer-one',
		array(
			'title'       => '&nbsp;',
			'panel'       => 'import_demo',
			'type'        => 'link',
			'button_text' => esc_html__( 'View Demo', 'home-improvement' ),
			'button_url'  => admin_url( '/themes.php?page=one-click-demo-import' ),
		)
	);
endif;
