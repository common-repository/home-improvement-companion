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

new \Kirki\Field\Custom(
	array(
		'settings' => 'dividers-general',
		'label'    => '',
		'section'  => 'archive_blog_section',
		'default'  => '<hr class="cei-hr"><h2 class="customize-control-title">' . __( 'General', 'home-improvement' ) . '</h2>',
	)
);

new \Kirki\Field\Select(
	array(
		'type'     => 'select',
		'settings' => 'mod_data_archive_sort_by',
		'label'    => __( 'Post By', 'home-improvement' ),
		'section'  => 'archive_blog_section',
		'default'  => 'DESC',
		'choices'  => array(
			'ASC'  => esc_attr__( 'Published Date Ascending', 'home-improvement' ),
			'DESC' => esc_attr__( 'Published Date Descending', 'home-improvement' ),
		),
	)
);

new \Kirki\Field\Sortable(
	array(
		'settings' => 'mod_data_archive_content_order',
		'label'    => __( 'Post Content Order', 'home-improvement' ),
		'section'  => 'archive_blog_section',
		'default'  => array( 'image', 'category', 'title', 'meta', 'excerpt', 'read-more' ),
		'choices'  => array(
			'image'     => esc_html__( 'Image', 'home-improvement' ),
			'category'  => esc_html__( 'Category', 'home-improvement' ),
			'title'     => esc_html__( 'Title', 'home-improvement' ),
			'meta'      => esc_html__( 'Meta', 'home-improvement' ),
			'excerpt'   => esc_html__( 'Excerpt', 'home-improvement' ),
			'read-more' => esc_html__( 'Read More Link', 'home-improvement' ),
		),
	)
);

new \Kirki\Field\Sortable(
	array(
		'settings' => 'mod_data_archive_meta_order',
		'label'    => __( 'Meta Order', 'home-improvement' ),
		'section'  => 'archive_blog_section',
		'default'  => array( 'author', 'date', 'comments', 'tags' ),
		'choices'  => array(
			'author'   => esc_html__( 'Author', 'home-improvement' ),
			'date'     => esc_html__( 'Date', 'home-improvement' ),
			'comments' => esc_html__( 'Comments', 'home-improvement' ),
			'tags'     => esc_html__( 'Tags', 'home-improvement' ),
		),
	)
);

new \Kirki\Field\Text(
	array(
		'settings' => 'mod_data_archive_metaSeparator',
		'label'    => esc_html__( 'Meta Separator', 'home-improvement' ),
		'section'  => 'archive_blog_section',
		'default'  => '/',
	)
);

// Section excerpt limit.
new \Kirki\Field\Number(
	array(
		'settings' => 'mod_data_archive_excerpt_limit',
		'label'    => esc_html__( 'Excerpt Limit', 'home-improvement' ),
		'section'  => 'archive_blog_section',
		'default'  => -1,
		'choices'  => array(
			'min'  => -1,
			'max'  => 1000,
			'step' => 1,
		),
	)
);

new \Kirki\Field\Text(
	array(
		'type'     => 'text',
		'settings' => 'mod_data_archive_button_label',
		'label'    => esc_html__( 'Read More Text', 'home-improvement' ),
		'section'  => 'archive_blog_section',
		'default'  => 'Read More',
	)
);

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-archive-blog-section-info',
		'label'    => '',
		'section'  => 'archive_blog_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Blog Updated Date Option', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Infinite Scroll', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Grid Layout Style', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Full Layout Style', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-blog-archive-options " >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);
