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

namespace HomeImprovementCompanion\App\General;

use HomeImprovementCompanion\Common\Abstracts\Base;

/**
 * Class Widgets
 *
 * @package HomeImprovementCompanion\App\General
 * @since 1.0.0
 */
class Widgets extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This general class is always being instantiated as requested in the Bootstrap class
		 *
		 * @see Bootstrap::__construct
		 *
		 * Widget is registered from the Integrations folder, but it can also be registered
		 * from the integration class file self
		 * @see HTML_Widget::init()
		 */

		add_action(
			'widgets_init',
			function () {
				register_widget( $this->plugin->namespace() . '\Integrations\Widget\Custom_Categories_List' );
			}
		);

		add_action( 'widgets_init', array( $this, 'registerSidebars' ), 100 );
	}

	/**
	 * Register Sidebars
	 *
	 * @since 1.0.0
	 */
	public function registerSidebars() {
		// Enqueue CSS
		foreach ( array(
			array(
				'name'          => __( 'Testimonial Sidebar', 'home-improvement' ),
				'id'            => 'sidebar-testimonial',
				'description'   => __( 'Add widgets here to appear in your sidebar on testimonial archive page.', 'home-improvement' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
			array(
				'name'          => __( 'Promotion Sidebar', 'home-improvement' ),
				'id'            => 'sidebar-promotion',
				'description'   => __( 'Add widgets here to appear in your sidebar on promotion archive page.', 'home-improvement' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
			array(
				'name'          => __( 'Team Sidebar', 'home-improvement' ),
				'id'            => 'sidebar-team',
				'description'   => __( 'Add widgets here to appear in your sidebar on team archive page.', 'home-improvement' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
			array(
				'name'          => __( 'Portfolio Sidebar', 'home-improvement' ),
				'id'            => 'sidebar-portfolio',
				'description'   => __( 'Add widgets here to appear in your sidebar on portfolio archive page.', 'home-improvement' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
		) as $sidebars ) {
			register_sidebar( $sidebars );
		}
	}

}

