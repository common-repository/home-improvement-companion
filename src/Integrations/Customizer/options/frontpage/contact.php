<?php

/**
 * Home Improvement contact Options
 *
 * @package home-improvement
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-contact-section-info',
		'label'    => '',
		'section'  => 'contact_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <div class="hi-upsell__img"><img src="' . plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/contact/contact.png" alt=""></div>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Access Contact Section', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Add/Customize Contact Form', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Appearance Customization', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Switch ', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=need-contact-section" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
