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

namespace HomeImprovementCompanion\Common\Abstracts;

use HomeImprovementCompanion\Config\Plugin;

/**
 * The Base class which can be extended by other classes to load in default methods
 *
 * @package HomeImprovementCompanion\Common\Abstracts
 * @since 1.0.0
 */
abstract class Base {
	/**
	 * Data container for plugin configuration.
	 *
	 * @var array $plugin Will be filled with data from the plugin config class.
	 * @see Plugin
	 */
	protected $plugin = array();

	/**
	 * Base constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->plugin = Plugin::init();
	}
}
