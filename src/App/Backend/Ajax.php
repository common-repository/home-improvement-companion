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

declare( strict_types = 1 );

namespace HomeImprovementCompanion\App\Backend;

use Plugin_Upgrader;
use HomeImprovementCompanion\Common\Abstracts\Base;
use HomeImprovementCompanion\Config\Requirements;
use WP_Ajax_Upgrader_Skin;

/**
 * Class Enqueue
 *
 * @package HomeImprovementCompanion\App\Frontend
 * @since 1.0.0
 */
class Ajax extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This frontend class is only being instantiated in the frontend as requested in the Bootstrap class
		 *
		 * @see Requester::isFrontend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
		add_action( 'wp_ajax_required_plugins', array( $this, 'InstallActivateRequiredPlugins' ) );
		add_action( 'wp_ajax_check_plugin', array( $this, 'InstallActivateRequiredPlugins' ) );
	}

	/**
	 * Handle the AJAX process while import or get started button clicked.
	 */
	public function InstallActivateRequiredPlugins() {
		check_ajax_referer( 'ajax-admin-security-nonce', 'security' );

		$status             = array(
			'install' => 'plugin',
		);
		$status['redirect'] = admin_url( '/themes.php?page=one-click-demo-import&browse=all&hide-notice=welcome' );

		$requirement = new Requirements();

		if ( ! current_user_can( 'install_plugins' ) ) {
			$status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.', 'home-improvement' );
			wp_send_json_error( $status );
		}

		$plugins = $requirement->specifications()['plugins'];

		foreach ( $plugins as $plugin ) :
			if ( isset( $_POST['pluginName'] ) && $_POST['pluginName'] !== $plugin['name'] ) {
				continue;
			}
			if ( $requirement->checkPluginIsActivated( $plugin['name'] ) ) {
				continue;
			}

			if ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin['file'] ) ) {

				wp_enqueue_style( 'plugin-install' );
				wp_enqueue_script( 'plugin-install' );

				/**
				 * Install Plugin.
				 */
                include_once ABSPATH . '/wp-admin/includes/file.php'; //phpcs:ignore
                include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php'; //phpcs:ignore
                include_once ABSPATH . 'wp-admin/includes/plugin-install.php'; //phpcs:ignore

				$api = plugins_api(
					'plugin_information',
					array(
						'slug'   => sanitize_key( wp_unslash( $plugin['slug'] ) ),
						'fields' => array(
							'sections' => false,
						),
					)
				);

				if ( is_wp_error( $api ) ) {
					$status['errorMessage'] = $api->get_error_message();
					wp_send_json_error( $status );
				}

				$skin     = new WP_Ajax_Upgrader_Skin();
				$upgrader = new Plugin_Upgrader( $skin );
				$result   = $upgrader->install( $api->download_link );

				if ( is_wp_error( $result ) ) {
					$status['errorCode']    = $result->get_error_code();
					$status['errorMessage'] = $result->get_error_message();
					wp_send_json_error( $status );
				}
			}

			if ( ! current_user_can( 'activate_plugin' ) ) {
				$status['errorMessage'] = __( 'Sorry, you are not allowed to active plugins on this site.', 'home-improvement' );
				wp_send_json_error( $status );
			}

			$result = activate_plugin( $plugin['file'] );

			if ( is_wp_error( $result ) ) {
				$status['errorCode']    = $result->get_error_code();
				$status['errorMessage'] = $result->get_error_message();
				wp_send_json_error( $status );
			}
		endforeach;

		wp_send_json_success( $status );

		exit();
	}
}
