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

// Layout Options.
new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-layout',
		'label'    => '',
		'section'  => 'archive_blog_section',
		'default'  => '<h2 class="customize-control-title">' . __( 'Layout', 'home-improvement' ) . '</h2>',
	)
);

new \Kirki\Field\Radio_Buttonset(
	array(
		'settings' => 'mod_data_archive_layout_blog_type',
		'label'    => esc_html__( 'Choose Style', 'home-improvement' ),
		'section'  => 'archive_blog_section',
		'default'  => 'list',
		'choices'  => array(
			'list' => esc_html__( 'List', 'home-improvement' ),
		),
	)
);

new \Kirki\Field\Radio_Buttonset(
	array(
		'settings'        => 'mod_data_archive_layout_blog_list_imagePosition',
		'label'           => esc_html__( 'Image Position', 'home-improvement' ),
		'section'         => 'archive_blog_section',
		'default'         => 'left',
		'choices'         => array(
			'left'        => esc_html__( 'Left', 'home-improvement' ),
			'alternating' => esc_html__( 'Alternating', 'home-improvement' ),
			'right'       => esc_html__( 'Right', 'home-improvement' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_archive_layout_blog_type',
				'operator' => '==',
				'value'    => 'list',
			),
		),
	)
);

new \Kirki\Field\Slider(
	array(
		'settings'        => 'mod_data_archive_layout_blog_grid_columns',
		'label'           => esc_html__( 'Columns', 'home-improvement' ),
		'section'         => 'archive_blog_section',
		'default'         => 3,
		'choices'         => array(
			'min'  => 2,
			'max'  => 4,
			'step' => 1,
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_archive_layout_blog_type',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);

new \Kirki\Field\Checkbox_Toggle(
	array(
		'settings'        => 'mod_data_archive_layout_blog_grid_enable_masonry',
		'label'           => esc_html__( 'Enable Masonry', 'home-improvement' ),
		'section'         => 'archive_blog_section',
		'default'         => '1',
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_archive_layout_blog_type',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);
