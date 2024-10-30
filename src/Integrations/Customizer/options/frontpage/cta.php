<?php

/**
 * Home Improvement CTA Options
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
		'settings' => 'upgrade-cta-section-info',
		'label'    => '',
		'section'  => 'cta_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <div class="hi-upsell__img"><img src="' . plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/cta/cta.png" alt=""></div>
                            <ul class="hi-upsell__feat-list">
                                 <li>' . __( 'Access CTA Section', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'CTA plays vital role in lead generation', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Full customization control', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-cta-section" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 1000,
	)
);
