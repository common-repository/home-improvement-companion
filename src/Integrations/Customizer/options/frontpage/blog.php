<?php

/**
 * Home Improvement Team Options
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
		'settings' => 'mod_data_homepage_blog_enable',
		'label'    => esc_html__( 'Enable Section', 'home-improvement' ),
		'section'  => 'blog_section',
		'default'  => true,
	)
);

// Section Sub Heading.
new \Kirki\Field\Text(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_blog_title',
		'label'    => esc_html__( 'Heading', 'home-improvement' ),
		'section'  => 'blog_section',
	)
);

// Section Sub Heading.
new \Kirki\Field\Textarea(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_blog_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'home-improvement' ),
		'section'  => 'blog_section',
	)
);

// Section Post Per Page.
new \Kirki\Field\Slider(
	array(
		'settings' => 'mod_data_homepage_blog_post_per_page',
		'label'    => esc_html__( 'No of Posts', 'home-improvement' ),
		'section'  => 'blog_section',
		'tooltip'  => esc_html__( 'No of items to show.', 'home-improvement' ),
		'default'  => 6,
		'choices'  => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		),
	)
);

// Section Sort options.
new \Kirki\Field\Select(
	array(
		'type'     => 'select',
		'settings' => 'mod_data_homepage_blog_sort_by',
		'label'    => __( 'Sort By', 'home-improvement' ),
		'section'  => 'blog_section',
		'default'  => 'latest',
		'choices'  => array(
			'latest'    => esc_attr__( 'Latest post', 'home-improvement' ),
			'optgroup1' => array(
				esc_attr__( 'Categories', 'home-improvement' ),
				home_improvement_get_categories( 'category' ),
			),
		),
	)
);

new \Kirki\Field\Number(
	array(
		'settings' => 'mod_data_homepage_blog_excerpt_limit',
		'label'    => esc_html__( 'Excerpt Limit', 'home-improvement' ),
		'section'  => 'blog_section',
		'default'  => -1,
		'choices'  => array(
			'min'  => -1,
			'max'  => 1000,
			'step' => 1,
		),
	)
);

// Section Button Label.
new \Kirki\Field\Text(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_homepage_blog_each_card_button_label',
		'label'    => esc_html__( 'Each Card Button Label', 'home-improvement' ),
		'section'  => 'blog_section',
		'default'  => 'Read More',
	)
);
