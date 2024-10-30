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
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! function_exists( 'home_improvement_custom_wpkses_post_tags' ) ) :
	/**
	 * Add iFrame to allow wp_kses_post tags
	 *
	 * @param array  $tags Allowed tags, attributes, and/or entities.
	 * @param string $context Context to judge allowed tags by. Allowed values are 'post'.
	 *
	 * @return array
	 */
	function home_improvement_custom_wpkses_post_tags( $tags, $context ): array {

		if ( 'post' === $context ) {
			$tags['iframe'] = array(
				'src'             => true,
				'height'          => true,
				'width'           => true,
				'frameborder'     => true,
				'allowfullscreen' => true,
			);
		}

		return $tags;
	}
	add_filter( 'wp_kses_allowed_html', 'home_improvement_custom_wpkses_post_tags', 10, 2 );
endif;

if ( ! function_exists( 'home_improvement_post_type' ) ) :
	/**
	 * Checks if a post-type belongs to home improvement.
	 *
	 * Checks if the given post type is one of the predefined post types used in home improvement.
	 *
	 * @param string|null $post_type The post-type to check. Default is null (current post type).
	 * @return bool True if the post-type belongs to home improvement, false otherwise.
	 */
	function home_improvement_post_type( $post_type = null ) {

		if ( ! $post_type ) {
			$post_type = get_post_type();
		}
		$args = array(
			'testimonial' => 'testimonial_cat',
			'team'        => 'team_cat',
			'portfolio'   => 'portfolio_cat',
			'promotion'   => 'promotion_cat',
		);

		if ( ! key_exists( $post_type, $args ) ) {
			return false;
		}
		return true;
	}
endif;


if ( ! function_exists( 'home_improvement_get_categories' ) ) :
	/**
	 * Retrieve categories for a given taxonomy.
	 *
	 * @param string $taxonomy The taxonomy for which to retrieve categories.
	 * @return array An associative array of categories where the keys are term slugs and the values are term names.
	 */
	function home_improvement_get_categories( $taxonomy ) {
		$term_query = new WP_Term_Query(
			array(
				'taxonomy' => $taxonomy,
			)
		);

		$terms = $term_query->get_terms();

		$tags_data = array();
		foreach ( $terms as $term ) {
			$tags_data[ $term->slug ] = $term->name;
		}

		return $tags_data;
	}
endif;


if ( ! function_exists( 'home_improvement_get_contact_form_7_posts' ) ) :
	/**
	 * Retrieve Contact Form 7 posts and return them as an associative array.
	 *
	 * @return array An associative array of Contact Form 7 posts where the keys are post IDs and the values are post titles.
	 */
	function home_improvement_get_contact_form_7_posts() {
		$posts = get_posts(
			array(
				'post_type'   => 'wpcf7_contact_form',
				'numberposts' => -1,
			)
		);

		$post_data = array( '' => 'Hide Form' );

		if ( $posts ) {
			foreach ( $posts as $post ) {
				$post_data[ $post->ID ] = $post->post_title;
			}
		} else {
			$post_data[''] = 'Need Contact Form 7';
		}

		return $post_data;
	}
endif;
