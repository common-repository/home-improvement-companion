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

namespace HomeImprovementCompanion\App\General;

use HomeImprovementCompanion\Common\Abstracts\Base;

/**
 * Class PostTypes
 *
 * @package HomeImprovementCompanion\App\General
 * @since 1.0.0
 */
class PostTypes extends Base {

	/**
	 * Post type data
	 */
	public const POST_TYPES = array(
		array(
			'id'        => 'testimonial',
			'archive'   => true,
			'title'     => 'Testimonial',
			'singular'  => 'Testimonial',
			'icon'      => 'dashicons-format-chat',
			'query_var' => false,
		),
		array(
			'id'        => 'promotion',
			'archive'   => true,
			'title'     => 'Promotion',
			'singular'  => 'Promotion',
			'icon'      => 'dashicons-megaphone',
			'query_var' => true,
		),
		array(
			'id'        => 'team',
			'archive'   => true,
			'title'     => 'Team',
			'singular'  => 'Team',
			'icon'      => 'dashicons-businessman',
			'query_var' => true,
		),
		array(
			'id'        => 'portfolio',
			'archive'   => true,
			'title'     => 'Portfolio',
			'singular'  => 'Portfolio',
			'icon'      => 'dashicons-database',
			'query_var' => true,
		),
	);

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
		 * Add plugin code here
		 */
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Register post type
	 *
	 * @since 1.0.0
	 */
	public static function register() {
		foreach ( self::POST_TYPES as $post_type ) :
			register_post_type(
				$post_type['id'],
				array(
					'labels'             => array(
						'name'           => $post_type['title'],
						'singular_name'  => $post_type['singular'],
						'menu_name'      => $post_type['title'],
						'name_admin_bar' => $post_type['singular'],
						'add_new'        => sprintf( /* translators: %s: post type singular title */ __( 'New %s', 'home-improvement' ), $post_type['singular'] ),
						'add_new_item'   => sprintf( /* translators: %s: post type singular title */ __( 'Add New %s', 'home-improvement' ), $post_type['singular'] ),
						'new_item'       => sprintf( /* translators: %s: post type singular title */ __( 'New %s', 'home-improvement' ), $post_type['singular'] ),
						'edit_item'      => sprintf( /* translators: %s: post type singular title */ __( 'Edit %s', 'home-improvement' ), $post_type['singular'] ),
						'view_item'      => sprintf( /* translators: %s: post type singular title */ __( 'View %s', 'home-improvement' ), $post_type['singular'] ),
						'all_items'      => sprintf( /* translators: %s: post type title */ __( 'All %s', 'home-improvement' ), $post_type['title'] ),
						'search_items'   => sprintf( /* translators: %s: post type title */ __( 'Search %s', 'home-improvement' ), $post_type['title'] ),
					),
					'public'             => true,
					'publicly_queryable' => true,
					'has_archive'        => $post_type['archive'],
					'show_ui'            => true,
					'rewrite'            => array(
						'slug'       => $post_type['id'],
						'with_front' => true,
					),
					'show_in_menu'       => true,
                    //phpcs:ignore
					//'show_in_menu'       => 'home-improvement-options', //phpcs:ignore
					'query_var'          => $post_type['query_var'], // Allow/Disallow single page
					'capability_type'    => 'post',
					'menu_icon'          => $post_type['icon'],
					'show_in_rest'       => true,
					'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
				)
			);
		endforeach;

	}

	/**
	 * Register post type
	 *
	 * @since 1.0.0
	 */
	public static function unregister() {
		foreach ( self::POST_TYPES as $post_type ) :
			unregister_post_type(
				$post_type['id']
			);
		endforeach;

	}
}
