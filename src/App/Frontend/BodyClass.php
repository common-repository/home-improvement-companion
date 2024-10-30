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
class BodyClass extends Base {

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
		add_filter( 'body_class', array( $this, 'sidebarBodyClass' ) );
		add_filter( 'body_class', array( $this, 'archiveBodyClass' ) );
	}

	/**
	 * Modifies the body classes for sidebar-related styles.
	 *
	 * @param array $classes The existing body classes.
	 * @return array The modified body classes.
	 */
	public function sidebarBodyClass( $classes ): array {
		$default_sidebar_type = get_theme_mod( 'mod_data_default_sidebar_type', 'right-sidebar' );
		$archive_sidebar_type = get_theme_mod( 'mod_data_archive_sidebar_type', 'right-sidebar' );
		$single_sidebar_type  = get_theme_mod( 'mod_data_single_sidebar_type', 'right-sidebar' );
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_singular( 'post' ) ) :
			$classes[] = $single_sidebar_type . '-single-post';
		elseif ( in_array( 'blog', $classes, true ) || get_post_type() === 'post' ) :
			$classes[] = $archive_sidebar_type . '-blog';
		elseif ( ! is_home() && ! is_front_page() ) :
			$classes[] = $default_sidebar_type . '-default';
		endif;

		return $classes;
	}

	/**
	 * Modifies the body classes for archive pages.
	 *
	 * @param array $classes The existing body classes.
	 * @return array The modified body classes.
	 */
	public function archiveBodyClass( $classes ) {

		if ( ! is_search() && ( is_singular( 'post' ) || get_post_type() !== 'post' ) ) {
			return $classes;
		}

		$archive_layout_blog_type = get_theme_mod( 'mod_data_archive_layout_blog_type', 'list' );

		$classes[] = 'blog-type-' . $archive_layout_blog_type;

		$classes[] = 'image-position-' . get_theme_mod( 'mod_data_archive_layout_blog_' . $archive_layout_blog_type . '_imagePosition', 'top' );

		if ( $archive_layout_blog_type === 'grid' ) :
			$classes[] = 'grid-col-' . get_theme_mod( 'mod_data_archive_layout_blog_grid_columns', '3' );

			if ( get_theme_mod( 'mod_data_archive_layout_blog_grid_enable_masonry', false ) ) {
				$classes[] = 'has-masonry';
			}

		endif;

		return $classes;
	}
}
