<?php

/**
 * Home Improvement Services Options
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
		'settings' => 'mod_data_homepage_service_enable',
		'label'    => esc_html__( 'Enable Section', 'home-improvement' ),
		'section'  => 'service_section',
		'default'  => false,
	)
);

// Section Heading.
new \Kirki\Field\Text(
	array(
		'settings' => 'mod_data_homepage_service_title',
		'label'    => esc_html__( 'Heading', 'home-improvement' ),
		'section'  => 'service_section',
	)
);

// Section Sub Heading.
new \Kirki\Field\Textarea(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_service_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'home-improvement' ),
		'section'  => 'service_section',
	)
);

// Section Lists.
new \Kirki\Field\Repeater(
	array(
		'type'      => 'repeater',
		'settings'  => 'mod_data_homepage_service_items',
		'label'     => esc_html__( 'Service Lists', 'home-improvement' ),
		'section'   => 'service_section',
		'choices'   => array(
			'limit' => 3,
		),
		'row_label' => array(
			'type'  => 'text',
			'value' => 'Service #',
		),
		'fields'    => array(
			'image'       => array(
				'type'    => 'image',
				'label'   => esc_html__( 'Icon', 'home-improvement' ),
				'choices' => array(
					'save_as' => 'id',
				),
			),
			'title'       => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'home-improvement' ),
			),
			'description' => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Description', 'home-improvement' ),
			),
			'link_label'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Link Label', 'home-improvement' ),
			),
			'link'        => array(
				'type'  => 'text',
				'label' => esc_html__( 'Link', 'home-improvement' ),
			),
		),
	)
);

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-service-section-info',
		'label'    => '',
		'section'  => 'service_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Add upto 9 Services', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Open link in New Tab', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=need-additional-service-cards" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 1000,
	)
);
