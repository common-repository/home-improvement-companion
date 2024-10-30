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

new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-testimonial',
		'label'    => '',
		'section'  => 'cpt_section',
		'default'  => '<h2 class="customize-control-title">' . __( 'Testimonial', 'home-improvement' ) . '</h2>',
	)
);


new \Kirki\Field\Text(
	array(
		'settings' => 'mod_data_cpt_testimonial_title',
		'label'    => esc_html__( 'Title', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);

new \Kirki\Field\Textarea(
	array(
		'settings' => 'mod_data_cpt_testimonial_description',
		'label'    => esc_html__( 'Description', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);

new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-team',
		'label'    => '',
		'section'  => 'cpt_section',
		'default'  => '<hr class="cei-hr"><h2 class="customize-control-title">' . __( 'Team', 'home-improvement' ) . '</h2>',
	)
);


new \Kirki\Field\Text(
	array(
		'settings' => 'mod_data_cpt_team_title',
		'label'    => esc_html__( 'Title', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);

new \Kirki\Field\Textarea(
	array(
		'settings' => 'mod_data_cpt_team_description',
		'label'    => esc_html__( 'Description', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);

new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-promotion',
		'label'    => '',
		'section'  => 'cpt_section',
		'default'  => '<hr class="cei-hr"><h2 class="customize-control-title">' . __( 'Promotion', 'home-improvement' ) . '</h2>',
	)
);


new \Kirki\Field\Text(
	array(
		'settings' => 'mod_data_cpt_promotion_title',
		'label'    => esc_html__( 'Title', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);

new \Kirki\Field\Textarea(
	array(
		'settings' => 'mod_data_cpt_promotion_description',
		'label'    => esc_html__( 'Description', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);

new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-portfolio',
		'label'    => '',
		'section'  => 'cpt_section',
		'default'  => '<hr class="cei-hr"><h2 class="customize-control-title">' . __( 'Portfolio', 'home-improvement' ) . '</h2>',
	)
);


new \Kirki\Field\Text(
	array(
		'settings' => 'mod_data_cpt_portfolio_title',
		'label'    => esc_html__( 'Title', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);

new \Kirki\Field\Textarea(
	array(
		'settings' => 'mod_data_cpt_portfolio_description',
		'label'    => esc_html__( 'Description', 'home-improvement' ),
		'section'  => 'cpt_section',
		'default'  => '',
	)
);
