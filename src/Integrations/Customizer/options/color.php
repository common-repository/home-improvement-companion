<?php

/**
 * Home Improvement Companion
 * For Global color customizer sections
 *
 * @package   home-improvement-companion
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Primary color option.
new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_primary',
		'label'    => esc_html__( 'Primary Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#0665B5',
		'output'   => array(
			array(
				'element'  => array(
					'.menu-toggle,
					.header-two .menu-toggle,
					.btn-primary,
                    .btn-link-secondary:hover,
                    .btn-link-secondary:focus,
                    .breadcrumbs a:hover,
                    .breadcrumbs a:focus,
                    .ap-section .heading ul li::before,
                    .slick-slider .slick-arrow,
                    .services-single-page .hero-section .price,
                    .main-content-meta-wrap .tags-wrap .tag a,
                    .main-content-meta-wrap .social-share ul,
                    .contact-us-page .main-content .text-box .social-box li i,
                    .team-single-page .main-content-wrap .social-box i,
					.ap-location-section .text-box ul li a,
					.ap-location-section .text-box ul li::before,
                    .hero-section .text-col .sub-title,
                    .ap-section .sub-title,
                    .testimonial-wrap .testimonial-item .company,
                    .testimonial-wrap .testimonial-item .quote-cat .cat,
					.header-cta-wrap .cta-icon:hover, 
					.header-cta-wrap .cta-icon:focus,
					.menu-toggle::before,
					.header-two .menu-toggle::before,
                    .ap-location-section .text-box ul li,
					.site-branding .site-title,
					.comments-area #respond p a,
					.pagination .nav-links .prev.page-numbers:hover,
					.pagination .nav-links .next.page-numbers:hover,
					.pagination .nav-links .prev:hover,
					.pagination .nav-links .next:hover',

				),
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => array(
					'
					input[type="submit"],
					.btn-link-secondary:hover,
                    .btn-link-secondary:focus,
                    button:hover,
                    input[type="button"]:hover,
                    input[type="reset"]:hover,
                    input[type="submit"]:hover,
					.header-bottom,
                    aside.widget-area form button[type="submit"],
                    .ap-feat-area-section.type-two .icon-box,
                    .filter-tab-title-wrap ul li.active a,
                    .filter-tab-title-wrap ul li:hover a,
                    .contact-us-page .form-box form input[type="submit"],
                    .promotion-single-page .main-content-wrap .form-wrap,
                    .error-404 .search-form .search-submit,
                    .ap-cta-section.type-two,
                    .ap-projects-section .has-overlay .cat-box .cat,
                    .testimonial-archive-page .testimonial-cta-section::before,
                    .has-box-bg-right::after,
                    .has-box-bg-left::before,
                    .ap-fav-section .has-dashed-border .col,
					.ap-projects-section .has-overlay .cat-box .cat-item a,
					.portfolio .cat-box .cat-item a,
					.comment-form .form-submit input[type="submit"],
					#go-to-top:hover,
					.pagination .nav-links .page-numbers:hover,
					.pagination .nav-links .page-numbers.current,
					#loading-message span',
				),
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => array(
					'
					.btn-primary,
					.slick-slider .slick-arrow:hover, 
					.slick-slider .slick-arrow:focus,
					.slick-slider .slick-arrow',
					'blockquote.wp-block-quote',
				),
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => array(
					'blockquote.wp-block-quote',
				),
				'function' => 'css',
				'property' => 'border-left-color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_secondary',
		'label'    => esc_html__( 'Secondary Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#FFCD3A',
		'output'   => array(
			array(
				'element'  => array(
					'a:hover, 
					a:focus, 
					a:active,
					p a:hover, 
					aside.widget-area a:hover,
					.btn-secondary,
					.btn-link-secondary,
					.header-top a:hover,
					.header-two .main-navigation li:hover>a,
    				.header-two .main-navigation li:hover>a::after,
					.main-navigation li:hover>a,
					.entry-content a:hover,
                    .ap-team-section .ap-col-grid .col .text-box .btn:hover,
                    .ap-team-section .ap-col-grid .col .text-box .btn:hover,
                    .slick-slider .slick-arrow:hover,
                    .slick-slider .slick-arrow:focus,
                    .search-form-wrap .search-trigger:hover,
                    .search-form-wrap .search-trigger:focus,
                    .ap-testimonial-section.type-three .testimonial-item .company,
					.social-block ul li a:hover,
					.social-box ul li a:hover i,
                    .ap-post-grid .col .btn-link:focus,
                    .ap-projects-section .ap-col-grid.has-border-radius .col .text-box .btn:hover,
                    .ap-projects-section .ap-col-grid.has-border-radius .col .text-box .btn:focus,
                    .contact-us-page .main-content .text-box .social-box li i:hover,
                    .team-single-page .main-content-wrap .social-box i:hover,
					.ap-location-section .text-box ul li:hover::before, 
                    .ap-location-section .text-box ul li:hover a,
					.testimonial-wrap .testimonial-item .quote-cat .cat-item:hover a,
					.portfolio .cat-box .cat-item:hover a,
					.ap-col-grid .cat-links>a:hover,
					.post-meta .comments-link:hover,
					.post-meta .comments-link:hover a,
					.post-meta .tags-links:hover a,
					.ap-feat-area-section .col .btn-link:hover,
					.ap-fav-section .ap-col-grid .text-box .btn-link:hover,
					.ap-feat-section .col .btn-link:hover,
					.testimonial-wrap .testimonial-item .company:hover,
					.testimonial-wrap .testimonial-item .company a:hover,	
                    .ap-post-grid .col .btn-link:hover,
					.post-meta a:hover, 
					.entry-meta a:hover,	
					.comments-area #respond p a:hover,
					.about-post-author-box .content-grid .author-desc a:hover,
					.ap-col-grid .cat-links .cat-item:hover a,
					.ap-projects-section .has-overlay .cat-box .cat-item:hover a',
				),
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => array(
					'button,
					#go-to-top,
                    input[type = "button"],
                    input[type = "reset"],
                    input[type = "submit"],
					.portfolio .cat-box .cat:hover,
                    .ap-three-col.has-icon .icon-box,
					.comment-form .form-submit input[type="submit"]:hover',
				),
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => array(
					'.entry-footer,
					.slick-slider .slick-arrow:hover,
					.slick-slider .slick-arrow:focus',
				),
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_heading',
		'label'    => esc_html__( 'Heading Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#053762',
		'output'   => array(
			array(
				'element'  => array(
					'h1, 
                    h2, 
                    h3, 
                    h4, 
                    h5, 
                    h6, 
                    .btn-link, 
					.ap-section .heading h3,
					aside.widget-area form[role="search"] label,
                    .ap-team-section .slick-slider .slick-arrow',

				),
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => array(
					'.header-one .main-navigation ul ul li:hover>a, 
					.header-one .main-navigation ul ul li:focus>a,
					.header-one .main-navigation ul ul li.current-menu-item>a',
				),
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_para',
		'label'    => esc_html__( 'Body Text Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#525355',
		'output'   => array(
			array(
				'element'  => array(
					'p,
					input, 
					textarea,
					.breadcrumbs li,
					.entry-content,
					.entry-content li,
					.entry-content dfn, 
					.entry-content cite, 
					.entry-content em, 
					.entry-content i,
					figcaption,
					.wp-block-table td, 
					.wp-block-table th,
					.wp-block-image figcaption,
					.ap-col-grid .col .text-box p,
					.testimonial-wrap .testimonial-item blockquote,
					.testimonial-wrap .testimonial-item blockquote p,
					.archive .testimonial-wrap .testimonial-item blockquote p,
					.testimonial-wrap .testimonial-item .name,
					.ap-team-section.type-one .ap-col-grid .col .text-box,
					.social-block ul li a,
					.archive .page-header .archive-description,
					.single .portfolio .text-box .entry-content p,
                    .ap-location-section .text-box ul li',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_secondary_text',
		'label'    => esc_html__( 'Secondary Text Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#053762',
		'output'   => array(
			array(
				'element'  => array(
					'.entry-meta,
					.ap-col-grid .cat-item a, 
					.ap-col-grid .cat-links a,
					.ap-feat-area-section .col .btn-link,
					.ap-team-section .ap-col-grid .col .text-box .btn,
					.ap-projects-section .has-overlay .cat-box .cat-item a, 
					.portfolio .cat-box .cat-item a,
					.ap-post-grid .col .btn-link,
					.post-meta .byline span,
					.ap-feat-section .col .btn-link,
					.ap-fav-section .ap-col-grid .text-box .btn-link,
					.testimonial-wrap .testimonial-item .company,
					.testimonial-wrap .testimonial-item .company a,
					.ap-team-section .ap-col-grid .col .text-box .designation,
					.testimonial-wrap .testimonial-item .quote-cat .cat-item a,
					.archive .page-header .page-title,
					.about-post-author-box .content-grid .author-desc a',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_link',
		'label'    => esc_html__( 'Link Text Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#ffcd3a',
		'output'   => array(
			array(
				'element'  => array(
					'p a',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_default_white',
		'label'    => esc_html__( 'Default White Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#ffffff',
		'output'   => array(
			array(
				'element'  => array(
					'.ap-fav-section .ap-col-grid .col .text-box',
				),
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => array(
					'.ap-projects-section .ap-col-grid .col .text-box p, 
					.ap-projects-section .ap-col-grid.has-border-radius .col .text-box .btn',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_light_bg',
		'label'    => esc_html__( 'Light Background Color', 'home-improvement' ),
		'section'  => 'global_color_section',
		'default'  => '#F5F7FC',
		'output'   => array(
			array(
				'element'  => array(
					'select,
					input[type="text"], 
					input[type="email"], 
					input[type="url"], 
					input[type="password"], 
					input[type="search"], 
					input[type="number"], 
					input[type="tel"], 
					input[type="range"], 
					input[type="date"], 
					input[type="month"], 
					input[type="week"], 
					input[type="time"], 
					input[type="datetime"], 
					input[type="datetime-local"], 
					input[type="color"], 
					textarea,
					.breadcrumbs-wrap,
					.ap-location-section,
					.ap-img-fullwidth-section,
					.ap-section.ap-feat-section,
					.ap-fav-section,
					.ap-col-grid .cat-item a, 
					.ap-col-grid .cat-links a,
					.ap-projects-section .has-overlay .cat-box .cat-item a, 
					.ap-testimonial-section,
					.testimonial-wrap .testimonial-item .quote-cat .cat-item a,
					.portfolio .cat-box .cat-item a',
				),
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => array(
					'.ap-col-grid.has-border .col',
					'aside.widget-area section',
				),
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	)
);

/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-global-color-section-info',
		'label'    => '',
		'section'  => 'global_color_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Menu Bar Color Customization', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Footer Color Customization', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Top Header Customization', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-more-color-options " >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);

// TOP HEADER COLOR.
/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-top-header-colors-section-info',
		'label'    => '',
		'section'  => 'top_header_colors_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Top Header Background', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Top Header Text Color', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Top Header Text Hover Color', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-topheader-color-options" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);

// Menu Bar Colors.
/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-menu-bar-colors-section-info',
		'label'    => '',
		'section'  => 'menu_bar_colors_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Control Menu Bar Background', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Menu Bar Text', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Menu Bar Text Hover', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Menu Bar Background Hover', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-menubar-color-options" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);

// FOOTER COLORS.
/* Upgrade Section */
new \Kirki\Field\Custom(
	array(
		'settings' => 'upgrade-footer-colors-section-info',
		'label'    => '',
		'section'  => 'footer_colors_section',
		'default'  => '<div class="hi-upsell-message">
                            <h3>' . esc_html__( 'Upgrade to Pro for additional features', 'home-improvement' ) . '</h3>
                            <ul class="hi-upsell__feat-list">
                                <li>' . esc_html__( 'Control Footer Background', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Footer Text and Heading', 'home-improvement' ) . '</li>
                                <li>' . esc_html__( 'Control Footer Link Text Hover', 'home-improvement' ) . '</li>
                            </ul>
                            <div class="hi-upsell__btn"><a class="btn" target="_blank" href="https://alleythemes.com/services-business-wordpress-theme/?utm_source=Customizer&utm_medium=needs-footer-color-options" >' . esc_html__( 'Upgrade to Pro', 'home-improvement' ) . '</a></div>
                        </div>',
		'priority' => 90,
	)
);

// Sidebar COLORS.

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_sidebar_text_color',
		'label'    => esc_html__( 'Text Color', 'home-improvement' ),
		'section'  => 'sidebar_colors_section',
		'default'  => '#525355',
		'output'   => array(
			array(
				'element'  => array(
					'aside.widget-area',
					'aside.widget-area p',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_sidebar_link',
		'label'    => esc_html__( 'Link Color', 'home-improvement' ),
		'section'  => 'sidebar_colors_section',
		'default'  => '#0665B5',
		'output'   => array(
			array(
				'element'  => array(
					'aside.widget-area a',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

new \Kirki\Field\Color(
	array(
		'settings' => 'mod_data_color_sidebar_link_hover',
		'label'    => esc_html__( 'Link Hover Color', 'home-improvement' ),
		'section'  => 'sidebar_colors_section',
		'default'  => '#ffcd3a',
		'output'   => array(
			array(
				'element'  => array(
					'aside.widget-area a:hover',
				),
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);
