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

namespace HomeImprovementCompanion\Common;

use HomeImprovementCompanion\App\Frontend\Templates;
use HomeImprovementCompanion\Common\Abstracts\Base;

/**
 * Main function class for external uses
 *
 * @see home_improvement_companion()
 * @package HomeImprovementCompanion\Common
 */
class Functions extends Base {
	/**
	 * Get plugin data by using home_improvement_companion()->getData()
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function getData(): array {
		return $this->plugin->data();
	}

	/**
	 * Get the template instantiated class using home_improvement_companion()->templates()
	 *
	 * @return Templates
	 * @since 1.0.0
	 */
	public function templates(): Templates {
		return new Templates();
	}
}
