<?php
/**
 * Home Improvement Header Options
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-mobile-cta-service-section-info',
		'label'    => '',
		'section'  => 'mobile_cta_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <div class="hi-upsell__img"><img src="' . plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/mobile-cta/mobile-cta.png" alt="Image of CTA section"></div>
                            <ul class="hi-upsell__feat-list">
                                <li>' . __( 'Access Mobile CTA', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Two Mobile CTA Layouts', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Improved Mobile Navigation', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-mobilecta" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
