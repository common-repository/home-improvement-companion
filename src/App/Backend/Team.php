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

namespace HomeImprovementCompanion\App\Backend;

use HomeImprovementCompanion\Common\Abstracts\Base;

/**
 * Class Team
 *
 * @package HomeImprovementCompanion\App\Backend
 * @since 1.0.0
 */
class Team extends Base {
	/**
	 * Post
	 *
	 * @var array|mixed|null
	 */
	private static $fields;

	/**
	 * Team init.
	 */
	public function init() {
		$fields = array(
			'general' => array(
				'title'  => __( 'General', 'home-improvement' ),
				'fields' => array(
					array(
						'name' => __( 'Designation', 'home-improvement' ),
						'id'   => 'team_designation',
						'type' => 'text',
					),
					array(
						'name' => __( 'Facebook Link', 'home-improvement' ),
						'id'   => 'team_facebook_link',
						'type' => 'url',
					),
					array(
						'name' => __( 'Linkedin Link', 'home-improvement' ),
						'id'   => 'team_linkedin_link',
						'type' => 'url',
					),
					array(
						'name' => __( 'Twitter Link', 'home-improvement' ),
						'id'   => 'team_twitter_link',
						'type' => 'url',
					),
					array(
						'name' => __( 'Instagram Link', 'home-improvement' ),
						'id'   => 'team_instagram_link',
						'type' => 'url',
					),
				),
			),
		);

		$this::$fields = apply_filters( 'home_improvement_team_post_fields', $fields );

		add_action( 'add_meta_boxes', array( $this, 'register_metabox' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Initialize metabox box.
	 *
	 * @uses add_meta_boxes
	 */
	public function register_metabox() {
		add_meta_box( $this->plugin->textDomain() . 'team-meta-box', __( 'More Info', 'home-improvement' ), array( $this, 'metabox_html' ), 'team', 'normal', 'high' );
	}

	/**
	 * Initialize metabox box fields.
	 *
	 * @param object $post Optional.
	 * @uses register_metabox
	 */
	public function metabox_html( $post ) {
		$hi_data = get_post_meta( $post->ID, 'home_improvement_data_key', true );

		// Add nonce field for verification.

		wp_nonce_field( plugin_basename( __FILE__ ), 'home_improvement_meta_box_nonce' );
		?>
		<div class="home-improvement-metabox wp-clearfix">
			<?php
			foreach ( $this::$fields as $group => $field_group ) :
				if ( 'general' !== $group ) {
					echo '<h3>' . esc_html( $field_group['title'] ) . '</h3>';
				}

				?>
				<table class="form-table">
					<?php foreach ( $field_group['fields'] as $field ) : ?>
						<div class="form-group">
								<label for="input_<?php echo esc_attr( $field['id'] ); ?>"><?php echo esc_html( $field['name'] ); ?></label>
								<input
									id="input_<?php echo esc_attr( $field['id'] ); ?>"
									type="<?php echo esc_attr( $field['type'] ); ?>"
									name="home_improvement_data[<?php echo esc_attr( $field['id'] ); ?>]"
									class="form-control"
									placeholder="<?php echo esc_html( $field['name'] ); ?>"
									<?php if ( isset( $hi_data[ $field['id'] ] ) ) : ?>
									value="<?php echo esc_attr( $hi_data[ $field['id'] ] ); ?>"
								<?php endif; ?> >
						</div>
					<?php endforeach; ?>
				</table>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Save data from metabox.
	 *
	 * @param int $post_id Optional. Post ID.
	 * @return int Post ID if nonce is not verified.
	 * @uses save_post
	 */
	public function save_post( $post_id ): int {
		// Check if we're doing an autosave. Skip if so.

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Verify nonce.
		if ( ! isset( $_POST['home_improvement_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['home_improvement_meta_box_nonce'] ) ), plugin_basename( __FILE__ ) ) ) {
			return $post_id;
		}

		// Verify this meta box is for the right post type.
		if ( get_post_type( $post_id ) !== 'team' ) {
			return $post_id;
		}

		// Sanitize and save the custom field value as an array.
		if ( isset( $_POST['home_improvement_data'] ) ) {
			$hi_data_sanitize_value = array_map( 'sanitize_text_field', wp_unslash( $_POST['home_improvement_data'] ) );
			update_post_meta( $post_id, 'home_improvement_data_key', $hi_data_sanitize_value );
			return $post_id;

		}
		return $post_id;
	}

}
