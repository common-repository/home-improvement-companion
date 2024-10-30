<?php
/**
 * Home Improvement Header Options
 *
 * @package home-improvement
 */

declare( strict_types = 1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-copyright-section-info',
		'label'    => '',
		'section'  => 'copyright_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <div class="hi-upsell__img"><img src="' . plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/copyright/copyright.png" alt=""></div>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Show or hide Copyright', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Edit Copyright Text', 'home-improvement' ) . '</li>  
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-copyright" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
