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
class Theme_Mods {


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

		add_filter( 'init', array( $this, 'homepageSections' ) );
	}


	/**
	 * Define our panels, sections, and settings.
	 *
	 * @return array An array of panels, containing sections, containing settings.
	 */
	public function getPanels() {

		// Start an annoyingly huge array to define our panels, sections, and settings.
		$body = array();

		$body['panels'] = array(
			'import_demo' => array( esc_html__( 'Import Demo', 'home-improvement' ), '', 5 ),
			'theme'       => array( esc_html__( 'Theme Options', 'home-improvement' ), '', 5 ),
			'defaults'    => array( esc_html__( 'WordPress Defaults', 'home-improvement' ) ),
			'colors'      => array( esc_html__( 'Colors', 'home-improvement' ), 'theme' ),
			'buttons'     => array( esc_html__( 'Buttons', 'home-improvement' ), 'theme' ),
			'footer'      => array( esc_html__( 'Footer', 'home-improvement' ), 'theme' ),
			'homepage'    => array( esc_html__( 'Setup Homepage', 'home-improvement' ), 'theme' ),
			'sidebar'     => array( esc_html__( 'Sidebar', 'home-improvement' ), 'theme' ),
			'blog'        => array( esc_html__( 'Blog', 'home-improvement' ), 'theme' ),
		);

		$body['sections']['theme'] = array(
			'typography_section' => array( esc_html__( 'Typography', 'home-improvement' ), 1 ),
			'header_section'     => array( esc_html__( 'Header', 'home-improvement' ), 2 ),
			'cpt_section'        => array( esc_html__( 'Conversion Pages', 'home-improvement' ), 3 ),
			'mobile_cta_section' => array( esc_html__( 'Mobile CTA', 'home-improvement' ) ),
		);

		$body['sections']['colors'] = array(
			'global_color_section'      => array( esc_html__( 'Global Colors', 'home-improvement' ), '', 'colors_option_panel' ),
			'top_header_colors_section' => array( esc_html__( 'Top Header', 'home-improvement' ), '', 'colors_option_panel' ),
			'menu_bar_colors_section'   => array( esc_html__( 'Menu Bar', 'home-improvement' ), '', 'colors_option_panel' ),
			'footer_colors_section'     => array( esc_html__( 'Footer', 'home-improvement' ), '', 'colors_option_panel' ),
			'sidebar_colors_section'    => array( esc_html__( 'Sidebar', 'home-improvement' ), '', 'colors_option_panel' ),
		);

		$body['sections']['buttons'] = array(
			'primary_button_section'   => array( esc_html__( 'Primary Button', 'home-improvement' ), '', 'button_option_panel' ),
			'secondary_button_section' => array( esc_html__( 'Secondary Button', 'home-improvement' ), '', 'button_option_panel' ),
		);

		$body['sections']['footer'] = array(
			'copyright_section' => array( esc_html__( 'Copyright', 'home-improvement' ) ),
			'scrollTop_section' => array( esc_html__( 'Scroll to Top', 'home-improvement' ) ),
		);

		$body['sections']['sidebar'] = array(
			'default_sidebar_section' => array( esc_html__( 'Default Sidebar', 'home-improvement' ), '', 'sidebar_option_panel' ),
			'archive_sidebar_section' => array( esc_html__( 'Blog Archive Sidebar', 'home-improvement' ), '', 'sidebar_option_panel' ),
			'single_sidebar_section'  => array( esc_html__( 'Single Blog Sidebar', 'home-improvement' ), '', 'sidebar_option_panel' ),
		);

		$body['sections']['blog'] = array(
			'single_blog_section'  => array( esc_html__( 'Single', 'home-improvement' ) ),
			'archive_blog_section' => array( esc_html__( 'Archive', 'home-improvement' ) ),
		);

		$body['sections']['homepage'] = $this->homepageSections();

		return $body;
	}

	/**
	 * Retrieve an array of homepage sections sorted based on custom sorting order.
	 *
	 * This function retrieves an array of homepage sections and sorts them based on
	 * the custom sorting order defined in the 'mod_data_homepage_section_sortable' theme modification.
	 *
	 * @return array An array of homepage sections sorted according to the custom order.
	 */
	public function homepageSections() {

		$hi_default_sections = array(
			'hero_section'          => array( esc_html__( 'Banner', 'home-improvement' ) ),
			'service_section'       => array( esc_html__( 'Services', 'home-improvement' ) ),
			'extra_service_section' => array( esc_html__( 'Extra Services', 'home-improvement' ) ),
			'about_section'         => array( esc_html__( 'About', 'home-improvement' ) ),
			'team_section'          => array( esc_html__( 'Team', 'home-improvement' ) ),
			'promotion_section'     => array( esc_html__( 'Promotion', 'home-improvement' ) ),
			'testimonial_section'   => array( esc_html__( 'Testimonial', 'home-improvement' ) ),
			'portfolio_section'     => array( esc_html__( 'Portfolio', 'home-improvement' ) ),
			'cta_section'           => array( esc_html__( 'CTA', 'home-improvement' ) ),
			'blog_section'          => array( esc_html__( 'Blog', 'home-improvement' ) ),
			'newsletter_section'    => array( esc_html__( 'Newsletter', 'home-improvement' ) ),
			'location_section'      => array( esc_html__( 'Location', 'home-improvement' ) ),
			'contact_section'       => array( esc_html__( 'Contact', 'home-improvement' ) ),
		);

		// Get the custom sorting order
		$hi_homepage_section_sortable = get_theme_mod( 'mod_data_homepage_section_sortable', array_keys( $hi_default_sections ) );

		// Create an empty array to store the sorted sections
		$sorted_sections = array();

		// Loop through the custom sorting order and add sections to the sorted array
		foreach ( $hi_homepage_section_sortable as $key ) {
			if ( isset( $hi_default_sections[ $key ] ) ) {
				$sorted_sections[ $key ] = $hi_default_sections[ $key ];
			}
		}

		// Merge any remaining sections that were not in the custom sorting order
		$sorted_sections += $hi_default_sections;

		return $sorted_sections;

	}


}
