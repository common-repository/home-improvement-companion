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

/**
 * Register custom controls and settings in the WordPress Customizer.
 *
 * @param mixed $wp_customize The WordPress Customizer object.
 */
function home_improvement_register_controls( $wp_customize ) {
	$wp_customize->get_control( 'custom_logo' )->description = sprintf(
		/* translators: %s: Site icon size in pixels. */
		'<p>' . __( 'Recommended logo size is %s pixels.', 'home-improvement' ) . '</p>',
		'<strong>275 &times; 60</strong>'
	);
}
add_action( 'customize_register', 'home_improvement_register_controls' );

new \Kirki\Field\Slider(
	array(
		'settings' => 'mod_data_custom_logo_size',
		'label'    => esc_html__( 'Logo Size', 'home-improvement' ),
		'section'  => 'title_tagline',
		'default'  => 275,
		'priority' => 9,
		'choices'  => array(
			'min'  => 50,
			'max'  => 500,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'  => '.site-header .custom-logo',
				'property' => 'width',
				'units'    => 'px',
			),
		),
	)
);

new \Kirki\Field\Checkbox_Toggle(
	array(
		'settings' => 'mod_data_enable_siteTitle',
		'label'    => esc_html__( 'Display Site Title', 'home-improvement' ),
		'section'  => 'title_tagline',
		'default'  => false,
		'priority' => 10,
	)
);

new \Kirki\Field\Checkbox_Toggle(
	array(
		'settings' => 'mod_data_enable_siteTagline',
		'label'    => esc_html__( 'Display Site Tagline', 'home-improvement' ),
		'section'  => 'title_tagline',
		'default'  => true,
		'priority' => 30,
	)
);

new \Kirki\Field\Color(
	array(
		'settings'    => 'mod_data_global_color',
		'label'       => __( 'Site Identity Color', 'home-improvement' ),
		'description' => esc_html__( 'Global Font Color Options.', 'home-improvement' ),
		'section'     => 'title_tagline',
		'priority'    => 35,
		'default'     => '#0665B5',
		'output'      => array(
			array(
				'element'       => '.site-branding .site-title',
				'functionality' => 'css',
			),
		),
	)
);

new \Kirki\Field\Typography(
	array(
		'settings'    => 'mod_data_global_typography_setting',
		'label'       => esc_html__( 'Site Identity Font', 'home-improvement' ),
		'description' => esc_html__( 'Global Font Options.', 'home-improvement' ),
		'section'     => 'title_tagline',
		'priority'    => 40,
		'transport'   => 'auto',
		'default'     => array(
			'font-family' => 'Lato',
		),
		'output'      => array(
			array(
				'element' => '.site-branding .site-title',
			),
		),
	)
);
