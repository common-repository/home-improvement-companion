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

namespace HomeImprovementCompanion\Integrations\Widget;

use HomeImprovementCompanion\Config\Plugin;
use WP_Widget;

/**
 * Class HTML_Widget
 *
 * @package HomeImprovementCompanion\Integrations\Widget
 */
class Custom_Categories_List extends WP_Widget {

	/**
	 * Default data
	 *
	 * @var array will be filled with data from the plugin config class
	 * @see Plugin
	 */
	protected $plugin = array();

	/**
	 * Default instance.
	 *
	 * @var   array
	 */
	protected $default_instance = array(
		'title'   => '',
		'content' => '',
		'limit'   => 5,
		'orderby' =>
			'date',
		'order'   => 'DESC',
	);

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * Integration classes instantiates before anything else
		 *
		 * @see Bootstrap::__construct
		 *
		 * Widget is registered via the app/general/widgets class, but it is also
		 * possible to register from this class
		 * @see Widgets
		 */
	}

	/**
	 * Sets up a new HTML widget instance.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->plugin = Plugin::init();
		$widget_ops   = array(
			'classname'                   => 'widget_html',
			'description'                 => __( 'Display a list of all categories by post type.', 'home-improvement' ),
			'customize_selective_refresh' => true,
		);
		$control_ops  = array();
		parent::__construct( 'home-improvement-companion-custom-categories-list', __( 'Home Improvement Categories List', 'home-improvement' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current widget instance.
	 *
	 * @param array $args Default widget arguments.
	 * @param array $instance Settings for the current instance.
	 * @since 1.0.0
	 */
	public function widget( $args, $instance ) {

		$instance = array_merge( $this->default_instance, $instance );
		$title    = $instance['title'];

		/**
		 * Filters the content of the HTML Code widget.
		 *
		 * @param string $content The widget content.
		 * @param array $instance Settings for the current widget.
		 * @since 0.1.0
		 */

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $args['before_title'] . esc_attr( $title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$taxonomies = get_object_taxonomies( $instance['post_type'], 'objects' );

		$taxonomie_list = array(
			'post'        => 'category',
			'testimonial' => 'testimonial_cat',
			'team'        => 'team_cat',
			'portfolio'   => 'portfolio_cat',
			'promotion'   => 'promotion_cat',
		);

		$out = array();
		$i   = 0;

		$terms         = get_terms(
			array(
				'taxonomy'   => $taxonomie_list[ $instance['post_type'] ],
				'hide_empty' => false,
			)
		);
		$current_query = get_queried_object();

		if ( ! empty( $terms ) ) {
			$out[]        = "<ul class='categories-list'>";
			$active_class = '';
			if ( isset( $current_query->name ) ) :
				$active_class = $current_query->name === get_post_type() ? ' active' : '';
			endif;

			$out[] = sprintf(
				'<li class="cat-item cat-item-all%3$s"><a href="%1$s">%2$s</a></li>',
				esc_url( get_post_type_archive_link( $instance['post_type'] ) ),
				esc_attr( 'All' ),
				$current_query->name === get_post_type() ? esc_attr( ' active' ) : ''
			);

			foreach ( $terms as $term ) {
				if ( isset( $current_query->name ) ) :
					$active_class = $current_query->name === $term->name ? ' active' : '';
				endif;
				$out[] = sprintf(
					'<li class="%1$s"><a href="%2$s">%3$s</a></li>',
					esc_attr( 'cat-item cat-item-' . $term->term_id . ' ' . $active_class ),
					esc_url( get_term_link( $term->term_id ) ),
					esc_attr( $term->name )
				);
			}
			$out[] = '</ul>';
		}

		echo wp_kses_post( implode( '', $out ) );

		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Handles updating settings for the current widget instance.
	 *
	 * @param array $new_instance New settings for this instance.
	 * @param array $old_instance Old settings for this instance.
	 * @return array $instance Settings to save or bool false to cancel saving.
	 * @since 1.0.0
	 */
	public function update( $new_instance, $old_instance ): array {
		$instance = array_merge( $this->default_instance, $old_instance );

		$instance['title']     = wp_kses_post( $new_instance['title'] );
		$instance['post_type'] = sanitize_text_field( $new_instance['post_type'] );

		return $instance;
	}

	/**
	 * Outputs the HTML Code widget settings form.
	 *
	 * @param array $instance Current widget instance.
	 * @return void
	 * @since 1.0.0
	 */
	public function form( $instance ) {
		$instance   = wp_parse_args( (array) $instance, $this->default_instance );
		$post_types = array(
			'post'        => 'Post',
			'testimonial' => 'Testimonial',
			'promotion'   => 'Promotion',
			'team'        => 'Team',
			'portfolio'   => 'Portfolio',
		);
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'home-improvement' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
				   value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php esc_html_e( 'Filter by Post Type:', 'home-improvement' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
				<?php foreach ( $post_types as $post_type => $post_type_name ) : ?>
					<option value="<?php echo esc_attr( $post_type ); ?>" <?php selected( esc_attr( $instance['post_type'] ), esc_attr( $post_type ) ); ?>>
						<?php echo esc_attr( $post_type_name ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php
	}

}
