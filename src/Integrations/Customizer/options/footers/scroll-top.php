<?php
/**
 * Home Improvement Companion
 * For Button customizer sections
 *
 * @package   home-improvement-companion
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-scrollTop-section-info',
		'label'    => '',
		'section'  => 'scrollTop_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <div class="hi-upsell__img"><img src="' . plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/customizer/scrolltop/scrolltop.png" alt=""></div>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Access Scroll to Top Button', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( '5 Scroll-to-Top Layouts', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Size, Color and Hovers', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Padding and Radius', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Appearance customization', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Select Placement', 'home-improvement' ) . '</li>  
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-scrolltotop" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
