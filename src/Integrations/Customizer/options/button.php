<?php

/**
 * Home Improvement Companion
 * For Button customizer sections
 *
 * @package   home-improvement-companion
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
--------------------------------------------------------------
Primary Button
--------------------------------------------------------------
*/

new \Kirki\Field\Radio_Buttonset(
	array(
		'settings' => 'mod_data_button_primaryType',
		'label'    => esc_html__( 'Button Style', 'home-improvement' ),
		'section'  => 'primary_button_section',
		'default'  => 'fill',
		'choices'  => array(
			'fill'    => esc_html__( 'Filled', 'home-improvement' ),
			'outline' => esc_html__( 'Outline', 'home-improvement' ),
		),
	)
);


/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-primary-button-section-info',
		'label'    => '',
		'section'  => 'primary_button_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Control Button Shape', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Button Type', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control colors', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Hover State', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-primary-button-options" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);

/*
--------------------------------------------------------------
Secondary Button
--------------------------------------------------------------
*/

new \Kirki\Field\Radio_Buttonset(
	array(
		'settings' => 'mod_data_button_secondaryType',
		'label'    => esc_html__( 'Button Style', 'home-improvement' ),
		'section'  => 'secondary_button_section',
		'default'  => 'fill',
		'choices'  => array(
			'fill'    => esc_html__( 'Filled', 'home-improvement' ),
			'outline' => esc_html__( 'Outline', 'home-improvement' ),
		),
	)
);

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-secondary-button-section-info',
		'label'    => '',
		'section'  => 'secondary_button_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Control Button Shape', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Button Type', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control colors', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Hover State', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-secondary-button-options" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
