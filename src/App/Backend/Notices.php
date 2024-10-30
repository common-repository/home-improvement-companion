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

namespace HomeImprovementCompanion\App\Backend;

use HomeImprovementCompanion\Common\Abstracts\Base;
use HomeImprovementCompanion\Config\Requirements;

/**
 * Class Notices
 *
 * @package HomeImprovementCompanion\App\Backend
 * @since 1.0.0
 */
class Notices extends Base {

	/**
	 * Represents a requirement object for checking plugin activation and managing notices.
	 *
	 * This property holds an instance of the Requirement class, which is responsible for checking the activation status of plugins and managing related notices.
	 *
	 * @var Requirement
	 */
	protected $requirement;

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
		 * Add plugin code here for admin notices specific functions
		 */

		$this->requirement = new Requirements();

		 add_action( 'admin_notices', array( $this, 'noticeThemeMissing' ) );
		 add_action( 'admin_notices', array( $this, 'noticePluginMissing' ) );
	}

	/**
	 * Example admin notice
	 *
	 * @since 1.0.0
	 */
	public function noticeThemeMissing() {

		if ( $this->requirement->isThemeActivated() ) {
			return;
		}

		echo '<div class="notice error is-dismissible">';
		printf(
			'<p>%s – This plugin requires %s to be activated to work.</p>',
			'<strong>' . esc_html( $this->plugin->name() ) . '</strong>',
			'<a href="#">Home Improvement Theme</a>'
		);
		echo '</div>';

	}

	/**
	 * Display a notice to the user when required plugins are missing.
	 *
	 * This function is responsible for showing a notice to the user when one or more required plugins are not activated.
	 * It provides information and prompts the user to install and activate the necessary plugins to fully utilize the theme's features.
	 */
	public function noticePluginMissing() {
		if ( $this->requirement->isPluginActivated() ) {
			return;
		}
		$dismiss_url = wp_nonce_url(
			remove_query_arg( array( 'activated' ), add_query_arg( 'hide-notice', 'welcome' ) ),
			'hide_notices_security_nonce',
			'notice_security_nonce'
		);
		?>
		<div class="notice notice-success home-improvement-notice">
			<div class="notice-content">
				<div class="image">
					<img src="<?php echo esc_url( $this->plugin->pluginUrl() . '/assets/public/images/logo.png' ); ?>" alt="<?php esc_attr_e( 'logo', 'home-improvement' ); ?>" />
				</div>

				<div class="notice-text">
					<h2>
						<?php
						printf(
						/* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
							esc_html__( 'Thank you for choosing Us! To fully take advantage of the best our theme can offer, please make sure you visit our %1$ swelcome page %2$s.', 'home-improvement' ),
							'<a href="' . esc_url( admin_url( 'admin.php?page=home-improvement-options' ) ) . '">',
							'</a>'
						);
						?>
					</h2>

					<div class="notice-cta">
						<a class="btn-plugin-get-started button button-primary" href="#"><?php echo esc_html__( 'Get started', 'home-improvement' ); ?></a>
						<span class="plugin-install-notice">
						<?php printf( esc_html__( 'Clicking the button will install and activate all required plugins.', 'home-improvement' ) ); // phpcs:ignore xss ok. ?>
						</span>
					</div>
				</div>
			</div>
		</div> <!-- /.message__content -->
		<?php

	}

	/**
	 * Displays an admin notice for limiting posts.
	 *
	 * @param mixed $data Additional data related to the admin notice (optional).
	 * @return mixed
	 */
	public function adminNoticeForLimitPost( $data = null ) {
		global $pagenow;

		// Check admin list page and add new post page
		// $pagenow !== 'post.php' this for edit page
		if ( $pagenow !== 'edit.php' && $pagenow !== 'post-new.php' ) {
			return $data;
		}
		if ( is_customize_preview() ) {
			return $data;
		}
		// get the current screen
		$screen = get_current_screen();

		$post_type = $screen->post_type;
		if ( ! $post_type ) {
			return $data;
		}
		$limit_post_types = array( 'testimonial', 'promotion', 'team', 'portfolio' );
		if ( ! in_array( $post_type, $limit_post_types, true ) ) {
			return $data;
		}

		// Change 'post' to the slug of your post-type
		$count_posts = wp_count_posts( $post_type );
		$post_limit  = 3;

		if ( ! $count_posts ) {
			return $data;
		}

		$published_posts = $count_posts->publish;

		if ( $published_posts >= $post_limit ) {
			$message = sprintf(
			/* translators: %1$1s: post limit, %2$2s: current post type */
				__( 'You have reached the limit of  %1$1s posts. Post type is %2$2s.', 'home-improvement' ),
				$post_limit,
				esc_attr( $post_type )
			);

			if ( $data ) {
				wp_die( esc_html( $message ), esc_html__( 'Reached the limit', 'home-improvement' ) );
			}

			echo '<div class="notice notice-warning is-dismissible">
                    <p>' . esc_html( $message ) . '</p>
                </div>';
		}
		return $data;
	}
}
