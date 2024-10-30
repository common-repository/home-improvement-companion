<?php
/**
 * Home Improvement About Options
 *
 * @package home-improvement
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Enable/disable the section.
new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_homepage_about_enable',
		'label'    => esc_html__( 'Enable Section', 'home-improvement' ),
		'section'  => 'about_section',
		'default'  => false,
	)
);

// Section Heading.
new \Kirki\Field\Text(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_about_heading',
		'label'    => esc_html__( 'Heading', 'home-improvement' ),
		'section'  => 'about_section',
	)
);

// Section Image.
new \Kirki\Field\Image(
	array(
		'type'        => 'image',
		'settings'    => 'mod_data_homepage_about_image',
		'label'       => esc_html__( 'Image', 'home-improvement' ),
		'section'     => 'about_section',
		'description' => sprintf(
			/* translators: %s: Site icon size in pixels. */
			esc_html__( 'Recommended size is %s pixels.', 'home-improvement' ),
			'<strong>655 &times; 830</strong>'
		),
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);

// Text Alignment.
new \Kirki\Field\Select(
	array(
		'settings'    => 'mod_data_homepage_about_text_align',
		'label'       => esc_html__( 'Text Alignment', 'home-improvement' ),
		'section'     => 'about_section',
		'default'     => 'left',
		'placeholder' => esc_html__( 'Choose an option', 'home-improvement' ),
		'choices'     => array(
			'left'   => esc_html__( 'Left', 'home-improvement' ),
			'center' => esc_html__( 'Center', 'home-improvement' ),
			'right'  => esc_html__( 'Right', 'home-improvement' ),
		),
	)
);

// Section Description.
new \Kirki\Field\Editor(
	array(
		'type'     => 'editor',
		'settings' => 'mod_data_homepage_about_description',
		'label'    => esc_html__( 'Description', 'home-improvement' ),
		'section'  => 'about_section',
	)
);

// Button option.
new \Kirki\Field\Repeater(
	array(
		'type'      => 'repeater',
		'settings'  => 'mod_data_homepage_about_buttons',
		'label'     => esc_html__( 'Buttons', 'home-improvement' ),
		'section'   => 'about_section',
		'choices'   => array(
			'limit' => 1,
		),
		'row_label' => array(
			'type'  => 'text',
			'value' => 'Button #',
		),
		'default'   => array(),
		'fields'    => array(
			'label' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button label', 'home-improvement' ),
			),
			'link'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Link', 'home-improvement' ),
			),
		),
	)
);

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-about-section-info',
		'label'    => '',
		'section'  => 'about_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . __( 'Additional Button Option', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( '“Open in New Tab” Option for Links', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Select Button Types', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-about-section" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 1000,
	)
);
