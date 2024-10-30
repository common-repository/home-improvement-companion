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

namespace HomeImprovementCompanion\Config;

use HomeImprovementCompanion\Common\Abstracts\Base;
use HomeImprovementCompanion\Common\Utils\Errors;

/**
 * Check if any requirements are needed to run this plugin. We use the
 * "Requirements" package from "MicroPackage" to check if any PHP Extensions,
 * plugins, themes or PHP/WP version are required.
 *
 * @docs https://github.com/micropackage/requirements
 *
 * @package HomeImprovementCompanion\Config
 * @since 1.0.0
 */
final class Requirements extends Base {


	/**
	 * Specifications for the requirements
	 *
	 * @return array : used to specify the requirements
	 * @since 1.0.0
	 */
	public function specifications(): array {
		return apply_filters(
			'home_improvement_companion_plugin_requirements',
			array(
				'php'            => $this->plugin->requiredPhp(),
				'php_extensions' => array(
					/**
				 * 'mbstring'
				 */
				),
				'wp'             => $this->plugin->requiredWp(),
				'active_theme'   => array(
					'file' => 'home-improvement',
					'name' => 'Home Improvement',
				),
				'plugins'        => array(
					array(
						'file' => 'one-click-demo-import/one-click-demo-import.php',
						'name' => 'One Click Demo Import',
						'slug' => 'one-click-demo-import',
					),
				),
			)
		);
	}

	/**
	 * Plugin requirements checker
	 *
	 * @since 1.0.0
	 */
	public function check() {
		// We use "Requirements" if the package is required and installed by composer.json
		if ( class_exists( '\Micropackage\Requirements\Requirements' ) ) {
			$this->requirements = new \Micropackage\Requirements\Requirements(
				$this->plugin->name(),
				$this->specifications()
			);
			if ( ! $this->requirements->satisfied() ) {
				// Print notice
				$message = sprintf(
					// Translators: Plugin name.
					_nx(
						'The plugin: <strong>%s</strong> required following plugin -',
						'The plugin: <strong>%s</strong> required following plugins -',
						count( $this->requirements->get()['plugins'] ),
						'home-improvement',
						'home-improvement'
					),
					esc_html( $this->plugin->name() )
				);

				$this->requirements->print_notice( $message );
				// Kill plugin
				Errors::pluginDie();
			}
		} else {
			// Else we do a version check based on version_compare
			$this->versionCompare();
		}
	}

	/**
	 * Compares PHP & WP versions and kills plugin if it's not compatible
	 *
	 * @since 1.0.0
	 */
	public function versionCompare() {
		foreach ( array(
			// PHP version check
			array(
				'current' => phpversion(),
				'compare' => $this->plugin->requiredPhp(),
				'title'   => __( 'Invalid PHP version', 'home-improvement' ),
				'message' => sprintf( /* translators: %1$1s: required php version, %2$2s: current php version */
					__( 'You must be using PHP %1$1s or greater. You are currently using PHP %2$2s.', 'home-improvement' ),
					$this->plugin->requiredPhp(),
					phpversion()
				),
			),
			// WP version check
			array(
				'current' => get_bloginfo( 'version' ),
				'compare' => $this->plugin->requiredWp(),
				'title'   => __( 'Invalid WordPress version', 'home-improvement' ),
				'message' => sprintf( /* translators: %1$1s: required wordpress version, %2$2s: current wordpress version */
					__( 'You must be using WordPress %1$1s or greater. You are currently using WordPress %2$2s.', 'home-improvement' ),
					$this->plugin->requiredWp(),
					get_bloginfo( 'version' )
				),
			),
		) as $compat_check ) {
			if ( version_compare(
				$compat_check['compare'],
				$compat_check['current'],
				'>='
			) ) {
				// Kill plugin
				Errors::pluginDie(
					$compat_check['message'],
					$compat_check['title'],
					plugin_basename( __FILE__ )
				);
			}
		}
	}

	/**
	 * Check if a set of specified plugins are currently active in the WordPress environment.
	 *
	 * This function iterates through a list of plugin specifications and checks if each plugin is currently active using the `is_plugin_active()` function.
	 *
	 * @return bool Returns `true` if all specified plugins are active; otherwise, returns `false` as soon as one plugin is found to be inactive.
	 */
	public function isPluginActivated() {
		$plugins = $this->specifications()['plugins'];
		foreach ( $plugins as $plugin ) {
			$plugin_path = $plugin['file'];

			if ( ! is_plugin_active( $plugin_path ) ) {
				return false; // Return false as soon as one plugin is not active.
			}
		}
		return true; // All specified plugins are active.
	}

	/**
	 * Check if a specific theme is currently activated in the WordPress environment.
	 *
	 * This function checks whether the currently active theme matches the target theme name, or if it's defined as a constant.
	 *
	 * @return bool Returns `true` if the active theme matches the target theme (parent or child) or if it's defined as a constant; otherwise, returns `false`.
	 */
	public function isThemeActivated() {
		$active_theme      = wp_get_theme(); // Gets the active theme
		$active_theme_name = $active_theme->get( 'Name' );
		$target_theme_name = $this->specifications()['active_theme']['name'];

		// Check if the active theme matches the target theme (parent or child) or if it's defined as a constant
		return ( $active_theme_name === $target_theme_name || $active_theme->template === $target_theme_name || defined( '_SERVICE_BUSINESS_VERSION' ) );
	}

	/**
	 * Check if a specific plugin is activated in the WordPress environment.
	 *
	 * This function checks if a plugin with the specified name is activated in WordPress.
	 *
	 * @param string $plugin_name The name of the plugin to check for activation.
	 *
	 * @return bool Returns `true` if the specified plugin is active, `false` otherwise.
	 */
	public function checkPluginIsActivated( $plugin_name ) {
		if ( empty( $this->specifications()['plugins'] ) ) {
			return false;
		}

		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugins = $this->specifications()['plugins'];
		foreach ( $plugins as $plugin ) {
			if ( $plugin['name'] === $plugin_name && ! is_plugin_active( $plugin['file'] ) ) {
				return false;
			}
		}

		return true;
	}


	/**
	 * Checks if a specific plugin is installed.
	 *
	 * @param string $plugin_name The name of the plugin to check.
	 * @return bool True if the plugin is not installed, false if the plugin is installed.
	 */
	public function checkPluginIsInstalled( $plugin_name ) {
		if ( empty( $this->specifications()['plugins'] ) ) {
			return false;
		}

		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugins = $this->specifications()['plugins'];
		foreach ( $plugins as $plugin ) {
			if ( $plugin['name'] === $plugin_name && file_exists( WP_PLUGIN_DIR . '/' . $plugin['file'] ) ) {
				return false;
			}
		}

		return true;
	}


	/**
	 * Generates a button related to a plugin based on its installation and activation status.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @return void
	 */
	public function pluginButton( $plugin_name ) {

		if ( $this->checkPluginIsInstalled( $plugin_name ) ) {
			$type = 'install';
			$text = esc_html__( 'Install & Activate', 'home-improvement' );
		} elseif ( ! $this->checkPluginIsActivated( $plugin_name ) ) {
			$type = 'active';
			$text = esc_html__( 'Activate', 'home-improvement' );
		} else {
			$type = 'activated';
			$text = esc_html__( 'Activated', 'home-improvement' );
		}

		printf( '<a class="btn-plugin %1$1s" href="javascript:void(0)" data-type="%1$1s" data-plugin="%2$1s">%3$1s</a>', esc_attr( $type ), esc_attr( $plugin_name ), esc_html( $text ) );
	}
}
