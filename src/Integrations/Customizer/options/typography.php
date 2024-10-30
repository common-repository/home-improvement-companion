<?php

/**
 * Home Improvement Companion
 * For Global color customizer sections
 *
 * @package   home-improvement-companion
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-body',
		'label'    => '',
		'section'  => 'typography_section',
		'default'  => '<h2 class="customize-control-title">' . __( 'Body', 'home-improvement' ) . '</h2>',
	)
);

new \Kirki\Field\Typography(
	array(
		'settings'    => 'mod_data_typography_body',
		'description' => esc_html__( 'Body Typography Options.', 'home-improvement' ),
		'section'     => 'typography_section',
		'transport'   => 'auto',
		'default'     => array(
			'font-family'    => 'Poppins',
			'font-size'      => '16px',
			'text-transform' => 'none',
			'variant'        => 'regular',
			'font-style'     => 'normal',
		),
		'output'      => array(
			array(
				'element' => 'body,
				p,
				.btn,
				input, 
				select,
				textarea,
				ul li,
				ol li,
				.site-description,
				.breadcrumbs li,
				.post-meta,
				.entry-meta,
				.contact-us-page .main-content .text-box li,
				.team-single-page .main-content-wrap .text-box p,
				.entry-content p,
				.entry-content li,
				.ap-location-section .text-box ul li,
				.pagination .nav-links .page-numbers,
				.hero-section .form-wrap input[type="submit"]',
			),
		),
	)
);

new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-heading',
		'label'    => '',
		'section'  => 'typography_section',
		'default'  => '<hr class="cei-hr"><h2 class="customize-control-title">' . __( 'Heading', 'home-improvement' ) . '</h2>',
	)
);

new \Kirki\Field\Typography(
	array(
		'settings'  => 'mod_data_typography_heading_h1',
		'label'     => esc_html__( 'H1', 'home-improvement' ),
		'section'   => 'typography_section',
		'transport' => 'auto',
		'default'   => array(
			'font-family'    => 'Poppins',
			'font-size'      => '',
			'text-transform' => 'none',
			'variant'        => 'regular',
			'font-style'     => 'normal',
		),
		'output'    => array(
			array(
				'element' => 'h1,
				.site-branding .site-title,
				.site-branding .site-title a',
			),
		),
	)
);
new \Kirki\Field\Typography(
	array(
		'settings'  => 'mod_data_typography_heading_h2',
		'label'     => esc_html__( 'H2', 'home-improvement' ),
		'section'   => 'typography_section',
		'transport' => 'auto',
		'default'   => array(
			'font-family'    => 'Poppins',
			'font-size'      => '',
			'text-transform' => 'none',
			'variant'        => '700',
			'font-style'     => 'normal',
		),
		'output'    => array(
			array(
				'element' => 'h2,
				.ap-section .heading h2',
			),
		),
	)
);
new \Kirki\Field\Typography(
	array(
		'settings'  => 'mod_data_typography_heading_h3',
		'label'     => esc_html__( 'H3', 'home-improvement' ),
		'section'   => 'typography_section',
		'transport' => 'auto',
		'default'   => array(
			'font-family'    => 'Poppins',
			'font-size'      => '',
			'text-transform' => 'none',
			'variant'        => '700',
			'font-style'     => 'normal',
		),
		'output'    => array(
			array(
				'element' => 'h3,
				.ap-section .heading h3',
			),
		),
	)
);
new \Kirki\Field\Typography(
	array(
		'settings'  => 'mod_data_typography_heading_h4',
		'label'     => esc_html__( 'H4', 'home-improvement' ),
		'section'   => 'typography_section',
		'transport' => 'auto',
		'default'   => array(
			'font-family'    => 'Poppins',
			'font-size'      => '',
			'text-transform' => 'none',
			'variant'        => '600',
			'font-style'     => 'normal',
		),
		'output'    => array(
			array(
				'element' => 'h4',
			),
		),
	)
);
new \Kirki\Field\Typography(
	array(
		'settings'  => 'mod_data_typography_heading_h5',
		'label'     => esc_html__( 'H5', 'home-improvement' ),
		'section'   => 'typography_section',
		'transport' => 'auto',
		'default'   => array(
			'font-family'    => 'Poppins',
			'font-size'      => '',
			'text-transform' => 'none',
			'variant'        => '600',
			'font-style'     => 'normal',
		),
		'output'    => array(
			array(
				'element' => 'h5',
			),
		),
	)
);
new \Kirki\Field\Typography(
	array(
		'settings'  => 'mod_data_typography_heading_h6',
		'label'     => esc_html__( 'H6', 'home-improvement' ),
		'section'   => 'typography_section',
		'transport' => 'auto',
		'default'   => array(
			'font-family'    => 'Poppins',
			'font-size'      => '',
			'text-transform' => 'none',
			'variant'        => 'regular',
			'font-style'     => 'normal',
		),
		'output'    => array(
			array(
				'element' => 'h6',

			),
		),
	)
);
