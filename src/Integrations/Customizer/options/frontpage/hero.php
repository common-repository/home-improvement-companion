<?php

/**
 * Home Improvement Hero Options
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
		'settings' => 'mod_data_homepage_hero_enable',
		'label'    => esc_html__( 'Enable Section', 'home-improvement' ),
		'section'  => 'hero_section',
		'default'  => false,
	)
);

// Select header style.
new \Kirki\Field\Radio_Image(
	array(
		'type'     => 'radio-image',
		'settings' => 'mod_data_banner_type',
		'label'    => esc_html__( 'Hero Layout', 'home-improvement' ),
		'section'  => 'hero_section',
		'default'  => 'banner-one',
		'choices'  => array(
			'banner-one' => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/banner/default.png',
		),
	)
);

/*
--------------------------------------------------------------
Default Banner (banner-one)
--------------------------------------------------------------
*/

// Option to Hero Background Image.
new \Kirki\Field\Image(
	array(
		'type'        => 'image',
		'settings'    => 'mod_data_homepage_hero_image',
		'label'       => esc_html__( 'Banner Image', 'home-improvement' ),
		'section'     => 'hero_section',
		'description' => sprintf(
			/* translators: %s: Site icon size in pixels. */
			esc_html__( 'Recommended size is %s pixels.', 'home-improvement' ),
			'<strong>Landscape: 1920 &times; 750</strong>'
		),
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);

new \Kirki\Field\Color(
	array(
		'type'     => 'image',
		'settings' => 'mod_data_homepage_hero_background',
		'label'    => esc_html__( 'Banner Background', 'home-improvement' ),
		'section'  => 'hero_section',
		'default'  => 'rgba(0, 0, 0, 0.75)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => array( '.hero-section.has-overlay::before' ),
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Option to Hero Heading Text.
new \Kirki\Field\Text(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_hero_title',
		'label'    => esc_html__( 'Heading', 'home-improvement' ),
		'section'  => 'hero_section',
	)
);

// Option to Hero Sub Heading Text.
new \Kirki\Field\Textarea(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_hero_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'home-improvement' ),
		'section'  => 'hero_section',
	)
);

new \Kirki\Field\Color(
	array(
		'type'     => 'image',
		'settings' => 'mod_data_homepage_hero_textColor',
		'label'    => esc_html__( 'Text Color', 'home-improvement' ),
		'section'  => 'hero_section',
		'default'  => '#ffffff',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => array( '.hero-section .text-col h2, .hero-section .text-col p' ),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

new \Kirki\Field\Select(
	array(
		'settings'        => 'mod_data_homepage_hero_text_align',
		'label'           => esc_html__( 'Text Alignment', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => 'center',
		'placeholder'     => esc_html__( 'Choose an option', 'home-improvement' ),
		'choices'         => array(
			'left'   => esc_html__( 'Left', 'home-improvement' ),
			'center' => esc_html__( 'Center', 'home-improvement' ),
			'right'  => esc_html__( 'Right', 'home-improvement' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-one',
			),
		),
	)
);

// Option to Hero Button.
new \Kirki\Field\Repeater(
	array(
		'type'      => 'repeater',
		'settings'  => 'mod_data_homepage_hero_buttons',
		'label'     => esc_html__( 'Banner Button', 'home-improvement' ),
		'section'   => 'hero_section',
		'choices'   => array(
			'limit' => 2,
		),
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__( 'Button #', 'home-improvement' ),
		),
		'default'   => array(),
		'fields'    => array(
			'item_text'       => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Text', 'home-improvement' ),
			),
			'item_url'        => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button URL', 'home-improvement' ),
			),
			'item_target'     => array(
				'type'  => 'checkbox',
				'label' => esc_html__( 'Open in new tab', 'home-improvement' ),
			),
			'item_buttonType' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Button Type', 'home-improvement' ),
				'default' => 'btn-primary',
				'choices' => array(
					'btn-primary'   => esc_html__( 'Primary', 'home-improvement' ),
					'btn-secondary' => esc_html__( 'Secondary', 'home-improvement' ),
				),
			),
		),
	)
);

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-hero-section-info',
		'label'    => '',
		'section'  => 'hero_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Hero Layout with Side-Image', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Hero Layout with Form', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Form Customization', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=banner" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 1000,
	)
);

/*
--------------------------------------------------------------
Form Banner (banner-two)
--------------------------------------------------------------
*/


// Text Position.
new \Kirki\Field\Select(
	array(
		'settings'        => 'mod_data_homepage_hero_two_text_position',
		'label'           => esc_html__( 'Text Position', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => 'left',
		'placeholder'     => esc_html__( 'Choose an option', 'home-improvement' ),
		'choices'         => array(
			'left'  => esc_html__( 'Left', 'home-improvement' ),
			'right' => esc_html__( 'Right', 'home-improvement' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);

// Text Alignment.
new \Kirki\Field\Select(
	array(
		'settings'        => 'mod_data_homepage_hero_two_text_align',
		'label'           => esc_html__( 'Text Alignment', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => 'left',
		'placeholder'     => esc_html__( 'Choose an option', 'home-improvement' ),
		'choices'         => array(
			'left'   => esc_html__( 'Left', 'home-improvement' ),
			'center' => esc_html__( 'Center', 'home-improvement' ),
			'right'  => esc_html__( 'Right', 'home-improvement' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);


// Option to Hero Form Title.
new \Kirki\Field\Text(
	array(
		'type'            => 'text',
		'settings'        => 'mod_data_homepage_hero_two_form_title',
		'label'           => esc_html__( 'Form Title', 'home-improvement' ),
		'section'         => 'hero_section',
		'priority'        => 100,
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);

// Form Background color.
new \Kirki\Field\Color(
	array(
		'settings'        => 'mod_data_homepage_hero_two_form_background_color',
		'label'           => __( 'Form Background Color', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => '#ffffff',
		'priority'        => 110,
		'output'          => array(
			array(
				'element'  => array( '.hero-section .form-wrap' ),
				'function' => 'css',
				'property' => 'background-color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);


new \Kirki\Field\Color(
	array(
		'settings'        => 'mod_data_homepage_hero_two_form_background_color',
		'label'           => __( 'Form Title Color', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => '#ffffff',
		'priority'        => 120,
		'output'          => array(
			array(
				'element'  => array( '.hero-section .form-wrap' ),
				'function' => 'css',
				'property' => 'background-color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);

// Option to Hero Form.
new \Kirki\Field\Select(
	array(
		'settings'        => 'mod_data_homepage_hero_two_shortcode',
		'label'           => esc_html__( 'Select Form', 'home-improvement' ),
		'section'         => 'hero_section',
		'placeholder'     => esc_html__( 'Choose an option', 'home-improvement' ),
		'priority'        => 130,
		'choices'         => home_improvement_get_contact_form_7_posts(),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);

// Form Background color.
new \Kirki\Field\Color(
	array(
		'settings'        => 'mod_data_homepage_hero_two_form_background_color',
		'label'           => __( 'Form Background Color', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => '#ffffff',
		'priority'        => 140,
		'output'          => array(
			array(
				'element'  => array( '.hero-section .form-wrap' ),
				'function' => 'css',
				'property' => 'background-color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings'        => 'mod_data_homepage_hero_two_form_label_color',
		'label'           => __( 'Form Label Color', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => '#053762',
		'priority'        => 140,
		'output'          => array(
			array(
				'element'  => array(
					'.hero-section form label',
					'.ap-quotation-section form label',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);


new \Kirki\Field\Select(
	array(
		'settings'        => 'mod_data_homepage_hero_two_formButtonType',
		'label'           => esc_html__( 'Form Button Type', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => 'btn-primary',
		'priority'        => 150,
		'choices'         => array(
			'btn-primary'   => esc_html__( 'Primary', 'home-improvement' ),
			'btn-secondary' => esc_html__( 'Secondary', 'home-improvement' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-two',
			),
		),
	)
);


/*
--------------------------------------------------------------
2 column layout with image and text (banner-three)
--------------------------------------------------------------
*/

// Text Position.
new \Kirki\Field\Select(
	array(
		'settings'        => 'mod_data_homepage_hero_three_text_position',
		'label'           => esc_html__( 'Text Position', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => 'left',
		'placeholder'     => esc_html__( 'Choose an option', 'home-improvement' ),
		'choices'         => array(
			'left'  => esc_html__( 'Left', 'home-improvement' ),
			'right' => esc_html__( 'Right', 'home-improvement' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-three',
			),
		),
	)
);

// Text Alignment.
new \Kirki\Field\Select(
	array(
		'settings'        => 'mod_data_homepage_hero_three_text_align',
		'label'           => esc_html__( 'Text Alignment', 'home-improvement' ),
		'section'         => 'hero_section',
		'default'         => 'left',
		'placeholder'     => esc_html__( 'Choose an option', 'home-improvement' ),
		'choices'         => array(
			'left'   => esc_html__( 'Left', 'home-improvement' ),
			'center' => esc_html__( 'Center', 'home-improvement' ),
			'right'  => esc_html__( 'Right', 'home-improvement' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_banner_type',
				'operator' => '==',
				'value'    => 'banner-three',
			),
		),
	)
);
