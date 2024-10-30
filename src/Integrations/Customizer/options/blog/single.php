<?php
/**
 * Home Improvement Companion
 * Blog & pages options
 *
 * @package   home-improvement-companion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_singlePost_enable_tags',
		'label'    => esc_html__( 'Display Tags', 'home-improvement' ),
		'section'  => 'single_blog_section',
		'default'  => '1',
	)
);

new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_singlePost_enable_comments',
		'label'    => esc_html__( 'Display Comments', 'home-improvement' ),
		'section'  => 'single_blog_section',
		'default'  => '1',
	)
);

new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_single_enable_navigation',
		'label'    => esc_html__( 'Display Post Navigation', 'home-improvement' ),
		'section'  => 'single_blog_section',
		'default'  => '1',
	)
);
new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_singlePost_enable_categories',
		'label'    => esc_html__( 'Display Categories', 'home-improvement' ),
		'section'  => 'single_blog_section',
		'default'  => '1',
	)
);
new \Kirki\Field\Checkbox_Toggle(
	array(
		'type'     => 'toggle',
		'settings' => 'mod_data_singlePost_enable_date',
		'label'    => esc_html__( 'Display Date', 'home-improvement' ),
		'section'  => 'single_blog_section',
		'default'  => '1',
	)
);


/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-single-blog-section-info',
		'label'    => '',
		'section'  => 'single_blog_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Display Feature Image', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Related Post Options', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Author Bio Option', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-blog-options" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
