<?php
/**
 * Home Improvement Location Options
 *
 * @package home-improvement
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-location-section-info',
		'label'    => '',
		'section'  => 'location_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <div class="hi-upsell__img"><img src="' . plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/location/location.png" alt=""></div>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Access location section', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Show all of your business locations', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Add google map link for each location', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Embed google map', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Place Map image', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=need-location-section" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 1000,
	)
);
