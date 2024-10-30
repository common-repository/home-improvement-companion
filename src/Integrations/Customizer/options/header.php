<?php

/**
 * Home Improvement Header Options
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Enable/disable the sticky header.

// Select header style.
new \Kirki\Field\Radio_Image(
	array(
		'type'     => 'radio-image',
		'settings' => 'mod_data_header_type',
		'label'    => esc_html__( 'Select Header Layout', 'home-improvement' ),
		'section'  => 'header_section',
		'priority' => 15,
		'default'  => 'one',
		'choices'  => array(
			'one' => plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/headers/header-default.png',
		),
	)
);

// Enable/disable the Social Link.
new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_header_enable_social_link',
		'label'    => esc_html__( 'Enable Social Link', 'home-improvement' ),
		'section'  => 'header_section',
		'priority' => 20,
		'default'  => '1',
	)
);

// Option to add the social links via repeater field.
new \Kirki\Field\Repeater(
	'home_improvement_config',
	array(
		'type'            => 'repeater',
		'settings'        => 'mod_data_header_social_link',
		'label'           => esc_html__( 'Add Social Profile here', 'home-improvement' ),
		'description'     => esc_html__( 'Drag & Drop items to re-arrange the order', 'home-improvement' ),
		'section'         => 'header_section',
		'priority'        => 30,
		'default'         => array(),
		'choices'         => array(
			'limit' => 3,
		),
		'row_label'       => array(
			'type'  => 'field',
			'value' => esc_html__( 'Social Profile', 'home-improvement' ),
		),
		'fields'          => array(
			'social_icon' => array(
				'label'   => esc_html__( 'Social Icon', 'home-improvement' ),
				'type'    => 'select',
				'default' => 'facebook',
				'choices' => array(
					'facebook'  => esc_html__( 'Facebook', 'home-improvement' ),
					'instagram' => esc_html__( 'Instagram', 'home-improvement' ),
					'twitter'   => esc_html__( 'Twitter', 'home-improvement' ),
				),
			),
			'social_link' => array(
				'type'    => 'text',
				'label'   => esc_html__( 'Social Link URL', 'home-improvement' ),
				'default' => '',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_header_enable_social_link',
				'operator' => '==',
				'value'    => '1',
			),
		),
	)
);

new \Kirki\Field\Custom(
	array(
		'settings' => 'mod_data_header_topbar_divider',
		'label'    => '',
		'section'  => 'header_section',
		'priority' => 35,
		'default'  => '<hr class="cei-hr"><h2 class="customize-control-title">' . __( 'Topbar', 'home-improvement' ) . '</h2>',
	)
);

// Enable/disable the topbar.
new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_header_enable_topbar',
		'label'    => esc_html__( 'Enable Topbar', 'home-improvement' ),
		'section'  => 'header_section',
		'priority' => 35,
		'default'  => '1',
	)
);

// Option to add the Header Top Text.

new \Kirki\Field\Text(
	array(
		'type'            => 'text',
		'settings'        => 'mod_data_header_topbar_text',
		'label'           => esc_html__( 'Header Top Text', 'home-improvement' ),
		'section'         => 'header_section',
		'priority'        => 40,
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_header_enable_topbar',
				'operator' => '==',
				'value'    => '1',
			),
		),
	)
);

// Contact info phone.
new \Kirki\Field\Text(
	array(
		'type'            => 'text',
		'settings'        => 'mod_data_header_topbar_phone',
		'label'           => esc_html__( 'Phone Number', 'home-improvement' ),
		'section'         => 'header_section',
		'priority'        => 50,
		'input_attrs'     => array(
			'placeholder' => __( '(123)456-7890', 'home-improvement' ),
		),
		'placeholder'     => __( '(123)456-7890', 'home-improvement' ),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_header_enable_topbar',
				'operator' => '==',
				'value'    => '1',
			),
		),
	)
);

// Contact info email.
new \Kirki\Field\Text(
	array(
		'type'            => 'text',
		'settings'        => 'mod_data_header_topbar_email',
		'label'           => esc_html__( 'Email Address', 'home-improvement' ),
		'section'         => 'header_section',
		'priority'        => 60,
		'input_attrs'     => array(
			'placeholder' => __( 'example@domain.com', 'home-improvement' ),
		),
		'js_vars'         => array(
			array(
				'element'  => '.tg-contact-info .tg-contact-info__email span',
				'function' => 'html',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mod_data_header_enable_topbar',
				'operator' => '==',
				'value'    => '1',
			),
		),
	)
);

new \Kirki\Field\Custom(
	array(
		'settings' => 'mod_data_header_middle_divider',
		'label'    => '',
		'section'  => 'header_section',
		'priority' => 70,
		'default'  => '<hr class="cei-hr"></h2>',
	)
);
// Enable/disable the section.
new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_header_enable_button',
		'label'    => esc_html__( 'Enable Button on Header', 'home-improvement' ),
		'section'  => 'header_section',
		'priority' => 70,
		'default'  => '1',
	)
);

// Option to add the Header Middle Button.
new \Kirki\Field\Repeater(
	array(
		'type'            => 'repeater',
		'settings'        => 'mod_data_header_button_items',
		'section'         => 'header_section',
		'priority'        => 80,
		'choices'         => array(
			'limit' => 1,
		),
		'row_label'       => array(
			'type'  => 'text',
			'value' => 'Header Button',
		),
		'default'         => array(
			array(
				'item_text'   => esc_html__( 'Book Now', 'home-improvement' ),
				'item_url'    => '#',
				'item_target' => '0',
			),
		),
		'fields'          => array(
			'item_text'       => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Text', 'home-improvement' ),
			),
			'item_url'        => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button URL', 'home-improvement' ),
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

		'active_callback' => array(
			array(
				'setting'  => 'mod_data_header_enable_button',
				'operator' => '==',
				'value'    => '1',
			),
		),
	)
);


/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-header-section-info',
		'label'    => '',
		'section'  => 'header_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Two button header layout', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Sticky Header', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( '“Open in New Tab” Option For Link', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Website Search', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Breadcrumbs Links', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Add more than 3 Social Profiles', 'home-improvement' ) . '</li>
								</ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-header-options" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
