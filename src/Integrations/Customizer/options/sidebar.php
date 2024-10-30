<?php

/**
 * Home Improvement Companion
 * Blog & pages options
 *
 * @package   home-improvement-companion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Select Sidebar style.
new \Kirki\Field\Radio_Image(
	array(
		'type'     => 'radio-image',
		'settings' => 'mod_data_default_sidebar_type',
		'label'    => esc_html__( 'Sidebar Layout', 'home-improvement' ),
		'section'  => 'default_sidebar_section',
		'default'  => 'right-sidebar',
		'choices'  => array(
			'no-sidebar'    => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/no-sidebar.png',
			'left-sidebar'  => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/left-sidebar.png',
			'right-sidebar' => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/right-sidebar.png',
		),
	)
);
new \Kirki\Field\Slider(
	array(
		'settings' => 'mod_data_default_sidebar_width',
		'label'    => esc_html__( 'Content Width %', 'home-improvement' ),
		'section'  => 'default_sidebar_section',
		'default'  => 75,
		'choices'  => array(
			'min' => 0,
			'max' => 100,
		),
		'output'   => array(
			array(
				'element'  => array( 'body.archive #primary.site-main' ),
				'units'    => '%',
				'property' => 'width',
			),
		),
	)
);

new \Kirki\Field\Radio_Image(
	array(
		'type'     => 'radio-image',
		'settings' => 'mod_data_archive_sidebar_type',
		'label'    => esc_html__( 'Sidebar Layout', 'home-improvement' ),
		'section'  => 'archive_sidebar_section',
		'default'  => 'right-sidebar',
		'choices'  => array(
			'no-sidebar'    => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/no-sidebar.png',
			'left-sidebar'  => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/left-sidebar.png',
			'right-sidebar' => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/right-sidebar.png',
		),
	)
);
new \Kirki\Field\Slider(
	array(
		'settings' => 'mod_data_archive_sidebar_width',
		'label'    => esc_html__( 'Content Width %', 'home-improvement' ),
		'section'  => 'archive_sidebar_section',
		'default'  => 75,
		'choices'  => array(
			'min' => 0,
			'max' => 100,
		),
		'output'   => array(
			array(
				'element'  => array( 'not(.home)body.blog #primary.site-main' ),
				'units'    => '%',
				'property' => 'width',
			),
		),
	)
);

new \Kirki\Field\Radio_Image(
	array(
		'type'     => 'radio-image',
		'settings' => 'mod_data_single_sidebar_type',
		'label'    => esc_html__( 'Sidebar Layout', 'home-improvement' ),
		'section'  => 'single_sidebar_section',
		'default'  => 'right-sidebar',
		'choices'  => array(
			'no-sidebar'    => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/no-sidebar.png',
			'left-sidebar'  => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/left-sidebar.png',
			'right-sidebar' => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/sidebars/right-sidebar.png',
		),
	)
);
new \Kirki\Field\Slider(
	array(
		'settings' => 'mod_data_single_sidebar_width',
		'label'    => esc_html__( 'Content Width %', 'home-improvement' ),
		'section'  => 'single_sidebar_section',
		'default'  => 75,
		'choices'  => array(
			'min' => 0,
			'max' => 100,
		),
		'output'   => array(
			array(
				'element'  => array( 'body.single-post #primary.site-main' ),
				'units'    => '%',
				'property' => 'width',
			),
		),
	)
);
