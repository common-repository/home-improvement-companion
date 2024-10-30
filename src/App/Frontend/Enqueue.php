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

namespace HomeImprovementCompanion\App\Frontend;

use HomeImprovementCompanion\Common\Abstracts\Base;

/**
 * Class Enqueue
 *
 * @package HomeImprovementCompanion\App\Frontend
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
		 * This frontend class is only being instantiated in the frontend as requested in the Bootstrap class
		 *
		 * @see Requester::isFrontend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );
	}

	/**
	 * Enqueue scripts function
	 *
	 * @since 1.0.0
	 */
	public function enqueueScripts() {
		// Enqueue CSS
		foreach ( array(
			array(
				'deps'    => array(),
				'handle'  => 'plugin-frontend-css',
				'media'   => 'all',
				'source'  => plugins_url( '/assets/public/css/frontend.css', HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
				'version' => $this->plugin->version(),
			),
		) as $css ) {
			wp_enqueue_style( $css['handle'], $css['source'], $css['deps'], $css['version'], $css['media'] );
		}
		// Enqueue JS
		foreach ( array(
			array(
				'deps'      => array( 'jquery' ),
				'handle'    => 'plugin-frontend-js',
				'in_footer' => true,
				'source'    => plugins_url( '/assets/public/js/frontend.js', HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
				'version'   => $this->plugin->version(),
			),
		) as $js ) {
			wp_enqueue_script( $js['handle'], $js['source'], $js['deps'], $js['version'], $js['in_footer'] );
		}

		// For blog archive masonry
		if ( get_theme_mod( 'mod_data_archive_layout_blog_grid_enable_masonry', false ) && in_array( 'has-masonry', get_body_class(), true ) ) {
			wp_enqueue_script( 'jquery-masonry', false, array( 'jquery' ), $this->plugin->version(), true );
			wp_add_inline_script(
				'jquery-masonry',
				'
                jQuery(document).ready(function () {
                    jQuery("#post-container").masonry({
                        itemSelector: "article"
                    });
                });
            '
			);
		}

		// Send variables to JS
		global $wp_query;

		// localize a script and send variables
		wp_localize_script(
			'plugin-frontend-js',
			'ajaxObj',
			array(
				'ajaxUrl'              => admin_url( 'admin-ajax.php' ),
				'security'             => wp_create_nonce( 'infinite-scroll-nonce' ),
				'postsPerPage'         => get_option( 'posts_per_page' ),
				'isBlog'               => ! in_array( 'blog', get_body_class(), true ) ? false : array(
					'activeInfiniteScroll' => get_theme_mod( 'mod_data_archive_enable_infiniteScroll', false ),
					'activeMasonry'        => get_theme_mod( 'mod_data_archive_layout_blog_grid_enable_masonry', false ),
				),
				'plugin_wp_query_vars' => $wp_query->query_vars,
				'plugin_wp_query'      => $wp_query->query,
				'plugin_wp_post_type'  => get_post_type(),
				'loadingText'          => esc_attr__( 'Loading...', 'home-improvement' ),
			)
		);
	}
}
