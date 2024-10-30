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

namespace HomeImprovementCompanion\Config;

use HomeImprovementCompanion\Common\Traits\Singleton;

/**
 * Plugin data which are used through the plugin, most of them are defined
 * by the root file meta data. The data is being inserted in each class
 * that extends the Base abstract class
 *
 * @see Base
 * @package HomeImprovementCompanion\Config
 * @since 1.0.0
 */
final class Plugin {
	/**
	 * Singleton trait
	 */
	use Singleton;

	/**
	 * Get the plugin meta data from the root file and include own data
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function data(): array {
		$plugin_data = apply_filters(
			'home_improvement_companion_plugin_data',
			array(
				'settings'               => get_option( 'home-improvement-companion-settings' ),
				'plugin_url'             => untrailingslashit(
					plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE )  // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
				),
				'plugin_path'            => untrailingslashit(
					plugin_dir_path( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE )  // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
				),
				'plugin_template_folder' => 'templates',
				'ext_template_folder'    => 'home-improvement-companion-templates',
			/**
			 * Add extra data here
			 */
			)
		);
		return array_merge(
			apply_filters(
				'home_improvement_companion_plugin_meta_data',
				get_file_data(
					HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE, // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
					array(
						'name'         => 'Plugin Name',
						'uri'          => 'Plugin URI',
						'description'  => 'Description',
						'version'      => 'Version',
						'author'       => 'Author',
						'author-uri'   => 'Author URI',
						'text-domain'  => 'Text Domain',
						'domain-path'  => 'Domain Path',
						'required-php' => 'Requires PHP',
						'required-wp'  => 'Requires WP',
						'namespace'    => 'Namespace',
					),
					'plugin'
				)
			),
			$plugin_data
		);
	}

	/**
	 * Get the URL of the plugin.
	 *
	 * @return string The URL of the plugin.
	 */
	public function pluginUrl(): string {
		return $this->data()['plugin_url'];
	}

	/**
	 * Get the plugin external template path
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function pluginPath(): string {
		return $this->data()['plugin_path'];
	}

	/**
	 * Get the plugin internal template path
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function templatePath(): string {
		return $this->data()['plugin_path'] . '/' . $this->data()['plugin_template_folder'];
	}

	/**
	 * Get the plugin internal template folder name
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function templateFolder(): string {
		return $this->data()['plugin_template_folder'];
	}

	/**
	 * Get the plugin external template path
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function extTemplatePath(): string {
		return $this->data()['plugin_path'] . '/' . $this->data()['ext_template_folder'];
	}

	/**
	 * Get the plugin external template path
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function extTemplateFolder(): string {
		return $this->data()['ext_template_folder'];
	}

	/**
	 * Get the plugin settings
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function settings(): string {
		return $this->data()['settings'];
	}

	/**
	 * Get the plugin version number
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function version(): string {
		return $this->data()['version'];
	}

	/**
	 * Get the required minimum PHP version
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function requiredPhp(): string {
		return $this->data()['required-php'];
	}

	/**
	 * Get the required minimum WP version
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function requiredWp(): string {
		return $this->data()['required-wp'];
	}

	/**
	 * Get the plugin name
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function name(): string {
		return $this->data()['name'];
	}

	/**
	 * Get the plugin url
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function uri(): string {
		return $this->data()['uri'];
	}

	/**
	 * Get the plugin description
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function description(): string {
		return $this->data()['description'];
	}

	/**
	 * Get the plugin author
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function author(): string {
		return $this->data()['author'];
	}

	/**
	 * Get the plugin author uri
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function authorUri(): string {
		return $this->data()['author-uri'];
	}

	/**
	 * Get the plugin text domain
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function textDomain(): string {
		return $this->data()['text-domain'];
	}

	/**
	 * Get the plugin domain path
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function domainPath(): string {
		return $this->data()['domain-path'];
	}

	/**
	 * Get the plugin namespace
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function namespace(): string {
		return $this->data()['namespace'];
	}

}
