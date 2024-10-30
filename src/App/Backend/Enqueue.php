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

declare( strict_types=1 );

namespace HomeImprovementCompanion\App\Backend;

use HomeImprovementCompanion\Common\Abstracts\Base;

/**
 * Class Enqueue
 *
 * @package HomeImprovementCompanion\App\Backend
 * @since 1.0.0
 */
class Enqueue extends Base {

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
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueScripts' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customizeControlsJs' ) );
		add_action( 'customize_controls_print_styles', array( $this, 'customizeCss' ) );
	}

	/**
	 * Enqueue scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueueScripts() {
		// Enqueue CSS.
		foreach ( array(
			array(
				'deps'    => array(),
				'handle'  => 'home-improvement-companion-backend-css',
				'media'   => 'all',
				'source'  => plugins_url( '/assets/public/css/backend.css', HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
				'version' => $this->plugin->version(),
			),
		) as $css ) {
			wp_enqueue_style( $css['handle'], $css['source'], $css['deps'], $css['version'], $css['media'] );
		}
		// Enqueue JS.
		foreach ( array(
			array(
				'deps'      => array(),
				'handle'    => 'home-improvement-companion-backend-js',
				'in_footer' => true,
				'source'    => plugins_url( '/assets/public/js/backend.js', HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
				'version'   => $this->plugin->version(),
			),
		) as $js ) {
			wp_enqueue_script( $js['handle'], $js['source'], $js['deps'], $js['version'], $js['in_footer'] );
		}

		$data = array(
			'uri'                 => esc_url( admin_url( 'admin.php?page=home-improvement-options-tool' ) ),
			'btn_text'            => esc_html__( 'Processing...', 'home-improvement' ),
			'btn_text_activating' => esc_html__( 'Activating...', 'home-improvement' ),
			'btn_text_activated'  => esc_html__( 'Activated', 'home-improvement' ),
			'security_nonce'      => wp_create_nonce( 'ajax-admin-security-nonce' ),
		);

		wp_localize_script( 'home-improvement-companion-backend-js', 'adminAjaxObj', $data );

		// Add inline JavaScript to reload the tab when clicked
		$inline_js = "
			document.addEventListener('DOMContentLoaded', function() {
					const tabs3Element = document.querySelector('.home-improvement-dashboard #demo');
					if (tabs3Element) {
							tabs3Element.addEventListener('click', function(event) {
								event.preventDefault();
                const targetTab = '#tabs-3';
                window.location.href = targetTab
								location.reload();
							});
					}
			});
		";
		
		wp_add_inline_script( 'home-improvement-companion-backend-js', $inline_js );
	
}

	/**
	 *  Theme Customizer sections sortable js.
	 */
	public function customizeControlsJs() {
		wp_enqueue_script( 'home-improvement-companion-customizer-controls', plugins_url( '/assets/public/js/customizer_controls.js', HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ), array( 'customize-preview', 'jquery-ui-sortable', 'customize-controls' ), $this->plugin->version(), true );
	}

	/**
	 *  Theme Customizer sections css.
	 */
	public function customizeCss() {       ?>
		<style>
			.sortable-placeholder {
				height: 45px;
				margin: 0 !important;
			}
			.ui-sortable-handle .accordion-section-title{
				cursor: move;
			}
			#input_mod_data_banner_type,
			#input_mod_data_default_sidebar_type,
			#input_mod_data_single_sidebar_type,
			#input_mod_data_archive_sidebar_type {
				display: grid;
				gap: 10px;
			}
			#input_mod_data_banner_type {
				grid-template-columns: repeat(2, 1fr);
			}
			#input_mod_data_default_sidebar_type,
			#input_mod_data_single_sidebar_type,
			#input_mod_data_archive_sidebar_type {
				grid-template-columns: repeat(3, 1fr);
			}
			#input_mod_data_header_type {
				gap: 10px;
			}
			.customize-control-kirki-radio-image input:checked+label {
				-webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .25);
				box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
				border-radius: 3px;
				overflow: hidden;
			}
			.customize-control-kirki-radio-image input:checked+label img {
				padding: 0;
				border: none;
				box-shadow: none;
			}
		</style>
		<?php
	}
}
