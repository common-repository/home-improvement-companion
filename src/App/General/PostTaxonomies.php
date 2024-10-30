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
 * Class PostTypes
 *
 * @package HomeImprovementCompanion\App\General
 * @since 1.0.0
 */
class PostTaxonomies extends Base {

	/**
	 * Post type data
	 */
	public const POST_TAXONOMIES = array(
		array(
			'id'           => 'portfolio_cat',
			'post_type'    => array( 'portfolio' ),
			'hierarchical' => true,
			'title'        => 'Portfolio Categories',
			'singular'     => 'Portfolio Category',
		),
		array(
			'id'           => 'testimonial_cat',
			'post_type'    => array( 'testimonial' ),
			'hierarchical' => true,
			'title'        => 'Testimonial Categories',
			'singular'     => 'Testimonial Category',
		),
		array(
			'id'           => 'team_cat',
			'post_type'    => array( 'team' ),
			'hierarchical' => true,
			'title'        => 'Team Categories',
			'singular'     => 'Team Category',
		),
		array(
			'id'           => 'promotion_cat',
			'post_type'    => array( 'promotion' ),
			'hierarchical' => true,
			'title'        => 'Promotion Categories',
			'singular'     => 'Promotion Category',
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
		foreach ( self::POST_TAXONOMIES as $post_taxonomy ) :
			register_taxonomy(
				$post_taxonomy['id'],
				$post_taxonomy['post_type'],
				array(
					'labels'             => array(
						'name'           => $post_taxonomy['title'],
						'singular_name'  => $post_taxonomy['singular'],
						'menu_name'      => $post_taxonomy['title'],
						'name_admin_bar' => $post_taxonomy['singular'],
						'add_new'        => sprintf( /* translators: %s: post type singular title */ __( 'New %s', 'home-improvement' ), $post_taxonomy['singular'] ),
						'add_new_item'   => sprintf( /* translators: %s: post type singular title */ __( 'Add New %s', 'home-improvement' ), $post_taxonomy['singular'] ),
						'new_item'       => sprintf( /* translators: %s: post type singular title */ __( 'New %s', 'home-improvement' ), $post_taxonomy['singular'] ),
						'edit_item'      => sprintf( /* translators: %s: post type singular title */ __( 'Edit %s', 'home-improvement' ), $post_taxonomy['singular'] ),
						'view_item'      => sprintf( /* translators: %s: post type singular title */ __( 'View %s', 'home-improvement' ), $post_taxonomy['singular'] ),
						'all_items'      => sprintf( /* translators: %s: post type title */ __( 'All %s', 'home-improvement' ), $post_taxonomy['title'] ),
						'search_items'   => sprintf( /* translators: %s: post type title */ __( 'Search %s', 'home-improvement' ), $post_taxonomy['title'] ),
					),
					'public'             => true,
					'publicly_queryable' => true,
					'show_ui'            => true,
					'show_in_menu'       => true,
					'show_in_rest'       => true,
					'show_admin_column'  => true,
					'hierarchical'       => $post_taxonomy['hierarchical'],
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
		foreach ( self::POST_TAXONOMIES as $post_taxonomy ) :
			unregister_taxonomy(
				$post_taxonomy['id']
			);
		endforeach;

	}
}
