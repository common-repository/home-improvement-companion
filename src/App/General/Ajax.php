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
use WP_Query;

/**
 * Class Enqueue
 *
 * @package HomeImprovementCompanion\App\Frontend
 * @since 1.0.0
 */
class Ajax extends Base {

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
		add_action( 'wp_ajax_load_more_posts', array( $this, 'loadMorePosts' ) );
		add_action( 'wp_ajax_nopriv_load_more_posts', array( $this, 'loadMorePosts' ) );
	}

	/**
	 * Enqueue scripts function
	 *
	 * @since 1.0.0
	 */
	public function loadMorePosts() {
		check_ajax_referer( 'infinite-scroll-nonce', 'security' );

		$obj            = map_deep( $_POST, 'sanitize_text_field' );
		$post_type      = $obj['plugin_wp_post_type'];
		$paged          = absint( $obj['page'] );
		$posts_per_page = absint( $obj['postsPerPage'] );

		// Query the posts
		$args  = array(
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
		);
		$args  = array_merge( $obj['plugin_wp_query'], $args );
		$query = new WP_Query( $args );

		$data_array = array();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				ob_start();
				get_template_part( 'template-parts/content', $post_type );
				$data_array[] = ob_get_clean();
			}
			wp_reset_postdata();
		}

		wp_send_json_success( array_merge( array( 'posts' => $data_array ), array( 'post_count' => $query->found_posts ), array( 'has_more' => $query->found_posts > $posts_per_page * $paged ) ) );
		wp_die();
	}
}
