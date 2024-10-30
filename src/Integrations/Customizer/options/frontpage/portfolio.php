<?php

/**
 * Home Improvement Team Options
 *
 * @package home-improvement
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Enable/disable the section.
new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_homepage_portfolio_enable',
		'label'    => esc_html__( 'Enable Section', 'home-improvement' ),
		'section'  => 'portfolio_section',
		'default'  => false,
	)
);

// Section Heading.
new \Kirki\Field\Text(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_portfolio_title',
		'label'    => esc_html__( 'Heading', 'home-improvement' ),
		'section'  => 'portfolio_section',
	)
);

// Section Sub Heading.
new \Kirki\Field\Textarea(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_portfolio_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'home-improvement' ),
		'section'  => 'portfolio_section',
	)
);

// Section Post Per Page.
new \Kirki\Field\Slider(
	array(
		'settings' => 'mod_data_homepage_portfolio_post_per_page',
		'label'    => esc_html__( 'No of Posts', 'home-improvement' ),
		'section'  => 'portfolio_section',
		'tooltip'  => esc_html__( 'No of items to show.', 'home-improvement' ),
		'default'  => 3,
		'choices'  => array(
			'min'  => 1,
			'max'  => 3,
			'step' => 1,
		),
	)
);

// Section Sort options.


// Section excerpt limit.
new \Kirki\Field\Number(
	array(
		'settings' => 'mod_data_homepage_portfolio_excerpt_limit',
		'label'    => esc_html__( 'Excerpt Limit', 'home-improvement' ),
		'section'  => 'portfolio_section',
		'default'  => -1,
		'choices'  => array(
			'min'  => -1,
			'max'  => 1000,
			'step' => 1,
		),
	)
);

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-portfolio-section-info',
		'label'    => '',
		'section'  => 'portfolio_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . __( 'Show up to 9 Portfolio', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Show Specific Portfolio', 'home-improvement' ) . '</li>  
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-more-portfolio" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 1000,
	)
);
