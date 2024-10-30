<?php
/**
 * Home Improvement Companion
 *
 * Handles demo content import and related functionalities for the Home Improvement Companion plugin/theme.
 *
 * @package   home-improvement-companion
 * @author    Alley Themes <alleythemes.com>
 * @copyright 2023 Home Improvement Companion
 * @license   MIT
 * @link      https://alleythemes.com/
 */

declare( strict_types = 1 );

namespace HomeImprovementCompanion\App\Backend;

use HomeImprovementCompanion\Common\Abstracts\Base;
use HomeImprovementCompanion\Config\Requirements;

/**
 * Class DemoImporter
 *
 * Handles the importation of demo content and modification of settings after import.
 *
 * @package HomeImprovementCompanion\App\Backend
 * @since 1.0.0
 */
class DemoImporter extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This backend class is only being instantiated in the backend as requested in the Bootstrap class
		 *
		 * @see Requester::isAdminBackend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */

		add_filter( 'pt-ocdi/import_files', array( $this, 'demoImporterFiles' ) );
		add_filter( 'admin_enqueue_scripts', array( $this, 'demoImporterOcdiCss' ), 100 );
		add_filter( 'ocdi/register_plugins', array( $this, 'registerPlugins' ) );
		add_action( 'pt-ocdi/after_import', array( $this, 'afterImportMods' ) );
		add_filter( 'ocdi/plugin_page_setup', array( $this, 'demoImporterPageSetup' ) );
	}

	/**
	 * Sets up the demo importer page with default settings.
	 *
	 * @param array $default_settings The default settings for the demo importer.
	 * @return array The updated settings for the demo importer.
	 */
	public function demoImporterPageSetup( $default_settings ) {
		$default_settings['parent_slug'] = 'themes.php';
		$default_settings['page_title']  = esc_html__( 'Home Improvement Demo Importer', 'home-improvement' );
		$default_settings['menu_title']  = esc_html__( 'Home Improvement Demo Importer', 'home-improvement' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'one-click-demo-import';

		return $default_settings;
	}

	/**
	 * Generates an array of demo import files.
	 *
	 * @return array An array containing details of demo import files.
	 */
	public function demoImporterFiles(): array {

		// Demos url
		$demo_url = $this->plugin->pluginUrl();

		return array(
			array(
				'import_file_name'           => esc_html__( 'Home Improvement', 'home-improvement' ),
				'categories'                 => array( 'Free' ),
				'import_file_url'            => $demo_url . '/demo-content/free/home-improvement/content.xml',
				'import_widget_file_url'     => $demo_url . '/demo-content/free/home-improvement/widgets.wie',
				'import_customizer_file_url' => $demo_url . '/demo-content/free/home-improvement/customizer.dat',
				'preview_url'                => 'https://hi-demo.alleythemes.com/',
				'import_preview_image_url'   => $demo_url . '/demo-content/free/home-improvement/thumb.png',
			),
			array(
				'import_file_name'         => esc_html__( 'Home Improvement Pro', 'home-improvement' ),
				'categories'               => array( 'Premium' ),
				'preview_url'              => 'https://hi-demo.alleythemes.com/home-improvement-pro/',
				'import_preview_image_url' => $demo_url . '/demo-content/premium/home-improvement-pro/thumb.png',
			),
		);
	}

	/**
	 * Adds custom CSS and JavaScript to manipulate elements within the WordPress admin area.
	 *
	 * This function adds specific styles and scripts to modify the appearance and behavior
	 * of elements related to a demo importer or similar functionality in the WordPress backend.
	 * It hides certain elements and performs actions on page load using JavaScript.
	 *
	 * The added CSS hides buttons and adjusts the size of image containers,
	 * while the JavaScript removes specific elements after the page has loaded.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function demoImporterOcdiCss() {
		wp_add_inline_style(
			'home-improvement-companion-backend-css',
			'
        .ocdi__gl.js-ocdi-gl [data-categories^="premium"] .ocdi__gl-item-buttons .button-primary, .ocdi .ocdi__theme-about, .ocdi__intro-text {
				display: none;
			}
			.ocdi__gl-item-image-container::after {
				padding-top: 75% !important;
			}
        '
		);
		wp_add_inline_script(
			'home-improvement-companion-backend-js',
			'
        document.addEventListener("DOMContentLoaded", function() {
				// Add the .color-blue class
				document.querySelectorAll(\'.ocdi__gl.js-ocdi-gl [data-categories^="premium"] .ocdi__gl-item-buttons .button-primary\').forEach(function (elem) {
					elem.remove();
				});
			});
        '
		);
	}

	/**
	 * Registers plugins after import, excluding specific plugin based on file.
	 *
	 * @param array $plugins Array containing plugin details.
	 * @return array Updated array of plugins after exclusion.
	 */
	public function registerPlugins( $plugins ) {
		$requirements  = new Requirements();
		$theme_plugins = $requirements->specifications()['plugins'];

		// Loop through the array and unset the element if 'file' matches the condition
		foreach ( $theme_plugins as $key => $plugin ) {
			if ( $plugin['file'] === 'one-click-demo-import/one-click-demo-import.php' ) {
				unset( $theme_plugins[ $key ] );
			}
		}

		return array_merge( $plugins, $theme_plugins );
	}

	/**
	 * Modifies settings after importing demo content.
	 */
	public function afterImportMods() {

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary-menu' => $main_menu->term_id,
			)
		);

		$front_page = get_page_by_path( 'home' );
		$blog_page  = get_page_by_path( 'blog' );

		if ( $front_page && $blog_page ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'page_for_posts', $blog_page->ID );

			// Set the front page template to 'page-templates/frontpage.php'.
			$front_page_template = 'page-templates/frontpage.php';
			update_post_meta( $front_page->ID, '_wp_page_template', $front_page_template );
		}
	}

}
