<?php
/**
 * Home Improvement Companion
 *
 * @package   home-improvement-companion
 * @author    Alley Themes <alleythemes.com>
 * @copyright 2023 Home Improvement Companion
 * @license   MIT
 * @link      https://alleythemes.com/
 */

declare(strict_types=1);

namespace HomeImprovementCompanion\Integrations\Customizer;

use Kirki\Compatibility\Kirki;

/**
 * Class Api
 *
 * @package HomeImprovementCompanion\Integrations\Example
 * @since 1.0.0
 */
class Customizer {


	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * Integration classes instantiates before anything else
		 *
		 * @see Bootstrap::__construct
		 *
		 * Widget is registered via the app/general/widgets class, but it is also
		 * possible to register from this class
		 * @see Widgets
		 */
	}

	/**
	 * Sets up a new HTML widget instance.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		if ( ! class_exists( 'Kirki' ) ) {
			return false;
		}

		add_filter( 'kirki/config', array( $this, 'kirkiConfig' ) );

		// Register our custom sections and panels.
		add_action( 'init', array( $this, 'register' ) );
		add_action( 'customize_register', array( $this, 'sortingDefaultWordpressSections' ) );
		add_action( 'init', array( $this, 'homepageSortable' ) );

		add_filter( 'init', array( $this, 'includeFields' ) );
	}


	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function sortingDefaultWordpressSections( $wp_customize ) {
		// Reassign default sections to panels.
		$wp_customize->get_section( 'title_tagline' )->panel     = 'defaults';
		$wp_customize->get_section( 'static_front_page' )->panel = 'defaults';
		$wp_customize->get_section( 'custom_css' )->panel        = 'defaults';
	}



	/**
	 * Sets up kirki config.
	 *
	 * @since 1.0.0
	 */
	public function kirkiConfig() {
		return array(
			'url_path'    => get_template_directory_uri() . '/inc/kirki/',
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		);
	}

	/**
	 * Add our panels, sections, and settings to the customizer.
	 *
	 * @param object $wp_customize An instance of the WP_Customize_Manager class.
	 */
	public function register( $wp_customize ) {

		// Fire up our theme mods class.
		$theme_mods_class = new Theme_Mods();

		// Grab our panels, sections, and settings.
		$hi_panels   = $theme_mods_class->getPanels()['panels'];
		$hi_sections = $theme_mods_class->getPanels()['sections'];

		// For each panel...
		foreach ( $hi_panels as $hi_panel_id => $hi_panel ) {
			$hi_panel_args = array(
				'title' => $hi_panel[0],
			);
			if ( isset( $hi_panel[1] ) ) {
				$hi_panel_args['panel'] = $hi_panel[1];
			}
			if ( isset( $hi_panel[2] ) ) {
				$hi_panel_args['priority'] = $hi_panel[1];
			}

			new \Kirki\Panel( $hi_panel_id, $hi_panel_args );

			if ( ! array_key_exists( $hi_panel_id, $hi_sections ) ) {
				continue;
			}
			foreach ( $hi_sections[ $hi_panel_id ] as $hi_section_id => $hi_section ) {
				$hi_section_args = array(
					'title' => $hi_section[0],
					'panel' => $hi_panel_id,
				);
				if ( isset( $hi_section[1] ) ) {
					$hi_section_args['priority'] = $hi_section[1];
				}
				new \Kirki\Section( $hi_section_id, $hi_section_args );
			}
		}
	}

	/**
	 * Initialize and configure the sortable homepage sections.
	 *
	 * This function sets up and configures the sortable homepage sections in the WordPress Customizer.
	 * It creates a theme mod setting 'mod_data_homepage_section_sortable' to store the order of sections,
	 * and defines a sanitize callback to ensure that only valid section keys are saved.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function homepageSortable() {
		// Fire up our theme mods class.
		$theme_mods          = new Theme_Mods();
		$hi_default_sections = $theme_mods->getPanels()['sections']['homepage'];

		$hi_homepage_section_sortable = get_theme_mod( 'mod_data_homepage_section_sortable', array_keys( $hi_default_sections ) );
		// Register a setting for the theme mod which contains the section order.
		new \Kirki\Field\Text(
			array(
				'type'              => 'theme_mod',
				'settings'          => 'mod_data_homepage_section_sortable',
				'default'           => $hi_homepage_section_sortable,
                // phpcs:ignore
                'sanitize_callback' => function ($value) use ($hi_default_sections) {
					return array_intersect(
						explode( ',', sanitize_text_field( $value ) ),
						array_keys( $hi_default_sections )
					);
				},
			)
		);
	}


	/**
	 * Include customizer options files
	 */
	public function includeFields() {

		$file_path = plugin_dir_path( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'src/Integrations/Customizer/options/';

		/**
		 * Add the required kirki customizer options files
		 */
        // phpcs:disable
        if (file_exists($file_path . 'frontpage/hero.php')) {
            require_once $file_path . 'demo-import.php';
        }

        if (file_exists($file_path . 'frontpage/hero.php')) {
            require_once $file_path . 'frontpage/hero.php';
        }
        if (file_exists($file_path . 'frontpage/service.php')) {
            require_once $file_path . 'frontpage/service.php';
        }
        if (file_exists($file_path . 'frontpage/portfolio.php')) {
            require_once $file_path . 'frontpage/portfolio.php';
        }
        if (file_exists($file_path . 'frontpage/extra-service.php')) {
            require_once $file_path . 'frontpage/extra-service.php';
        }
        if (file_exists($file_path . 'frontpage/promotion.php')) {
            require_once $file_path . 'frontpage/promotion.php';
        }
        if (file_exists($file_path . 'frontpage/cta.php')) {
            require_once $file_path . 'frontpage/cta.php';
        }
        if (file_exists($file_path . 'frontpage/about.php')) {
            require_once $file_path . 'frontpage/about.php';
        }
        if (file_exists($file_path . 'frontpage/newsletter.php')) {
            require_once $file_path . 'frontpage/newsletter.php';
        }
        if (file_exists($file_path . 'frontpage/location.php')) {
            require_once $file_path . 'frontpage/location.php';
        }
        if (file_exists($file_path . 'frontpage/contact.php')) {
            require_once $file_path . 'frontpage/contact.php';
        }
        if (file_exists($file_path . 'frontpage/team.php')) {
            require_once $file_path . 'frontpage/team.php';
        }
        if (file_exists($file_path . 'frontpage/testimonial.php')) {
            require_once $file_path . 'frontpage/testimonial.php';
        }
        if (file_exists($file_path . 'frontpage/blog.php')) {
            require_once $file_path . 'frontpage/blog.php';
        }

        if (file_exists($file_path . 'header.php')) {
            require_once $file_path . 'header.php';
        }
        if (file_exists($file_path . 'color.php')) {
            require_once $file_path . 'color.php';
        }

        if (file_exists($file_path . 'cpt.php')) {
            require_once $file_path . 'cpt.php';
        }

        if (file_exists($file_path . 'mobile-cta.php')) {
            require_once $file_path . 'mobile-cta.php';
        }


        if (file_exists($file_path . 'sidebar.php')) {
            require_once $file_path . 'sidebar.php';
        }
        if (file_exists($file_path . 'site-identity.php')) {
            require_once $file_path . 'site-identity.php';
        }
        if (file_exists($file_path . 'typography.php')) {
            require_once $file_path . 'typography.php';
        }
        if (file_exists($file_path . 'button.php')) {
            require_once $file_path . 'button.php';
        }


        //Blog
        if (file_exists($file_path . 'blog/single.php')) {
            require_once $file_path . 'blog/single.php';
        }

        if (file_exists($file_path . 'blog/layout.php')) {
            require_once $file_path . 'blog/layout.php';
        }

        if (file_exists($file_path . 'blog/general.php')) {
            require_once $file_path . 'blog/general.php';
        }


        //Footers
        if (file_exists($file_path . 'footers/copyright.php')) {
            require_once $file_path . 'footers/copyright.php';
        }
        if (file_exists($file_path . 'footers/scroll-top.php')) {
            require_once $file_path . 'footers/scroll-top.php';
        }
        // phpcs:enable

	}
}
