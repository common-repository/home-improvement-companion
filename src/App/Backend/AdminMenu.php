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

namespace HomeImprovementCompanion\App\Backend;

use HomeImprovementCompanion\App\Frontend\Templates;
use HomeImprovementCompanion\Common\Abstracts\Base;

/**
 * Class Enqueue
 *
 * @package HomeImprovementCompanion\App\Backend
 * @since 1.0.0
 */
class AdminMenu extends Base {


	/**
	 * The template manager instance for handling HTML templates.
	 *
	 * This private property is initialized within the `init` method and holds an instance of the
	 * `Templates` class. It is used throughout the class to manage and render HTML templates,
	 * providing methods for fetching and rendering templates based on various parameters.
	 *
	 * @var Templates
	 */
	private $template;

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

		$this->template = new Templates();

		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
	}

	/** Step 1. */
	public function admin_menus() {
		 add_menu_page( 'Home Improvement Options', 'Home Improvement', 'manage_options', 'home-improvement-options', array( $this, 'home_improvement_options' ), '', 1 );
	}

	/** Step 3. */
	public function home_improvement_options() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'home-improvement' ) );
		}
		return $this->template->get( 'admin/dashboard' );
	}
}
