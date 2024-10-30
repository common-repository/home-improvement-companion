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

namespace HomeImprovementCompanion\App\Frontend;

use HomeImprovementCompanion\Common\Abstracts\Base;
use HomeImprovementCompanion\Integrations\Customizer\Theme_Mods;

/**
 * Class Enqueue
 *
 * @package HomeImprovementCompanion\App\Frontend
 * @since 1.0.0
 */
class Hooks extends Base {


	/**
	 * The template manager instance for handling HTML templates.
	 *
	 * This private property is initialized within the `init` method and holds an instance of the
	 * `Templates` class. It is used throughout the class to manage and render HTML templates,
	 * providing methods for fetching and rendering templates based on various parameters.
	 *
	 * @var Templates
	 */
	private $template;

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		$this->template = new Templates();
		/**
		 * This frontend class is only being instantiated in the frontend as requested in the Bootstrap class
		 *
		 * @see Requester::isFrontend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
		add_action( 'home_improvement_header', array( $this, 'headerTemplate' ) );
		add_action( 'home_improvement_frontpage', array( $this, 'frontpageSections' ) );

		add_action( 'home_improvement_sidebar', array( $this, 'sidebar' ) );
		add_action( 'home_improvement_archive_filter', array( $this, 'archiveFilter' ) );

		add_filter( 'get_the_archive_title', array( $this, 'cptArchiveTitle' ), 1 );
		add_filter( 'get_the_archive_description', array( $this, 'cptArchiveDescription' ), 1 );
		add_filter( 'get_the_archive_title_prefix', '__return_false' );

	}

	/**
	 * Retrieves and returns the HTML template for the website header based on the selected header type.
	 *
	 * This function fetches the HTML template for the website header from the template manager,
	 * taking into account the header type specified in the theme settings.
	 *
	 * @return string The HTML template for the website header.
	 */
	public function headerTemplate() {
		$hi_header_type = 'one';

		return $this->template->get( 'headers/header', $hi_header_type );
	}

	/**
	 * Return a list of frontpage section
	 * Default section and sortable section from customizer
	 *
	 * @return mixed|void
	 */
	public function frontpageSections(): void {
		$theme_mods       = new Theme_Mods();
		$default_sections = array_keys( $theme_mods->homepageSections() );

		$frontpage_sort_sections = get_theme_mod( 'mod_data_homepage_section_sortable', $default_sections );

		foreach ( $frontpage_sort_sections as $section ) {

			$section_name      = str_replace( '_section', '', $section );
			$section_file_name = str_replace( '_', '-', $section_name );

			if ( true === get_theme_mod( 'mod_data_homepage_' . $section_name . '_enable', $section_name === 'blog' ) ) :

				$this->template->get( 'frontpage/' . $section_file_name );
			endif;
		}
	}

	/**
	 * Sidebar
	 *
	 * @since 1.0.0
	 */
	public function sidebar() {
		if ( get_post_type() === 'testimonial' && is_active_sidebar( 'sidebar-testimonial' ) ) {
			dynamic_sidebar( 'sidebar-testimonial' );
		} elseif ( get_post_type() === 'promotion' && is_active_sidebar( 'sidebar-promotion' ) ) {
			dynamic_sidebar( 'sidebar-promotion' );
		} elseif ( get_post_type() === 'team' && is_active_sidebar( 'sidebar-team' ) ) {
			dynamic_sidebar( 'sidebar-team' );
		} elseif ( get_post_type() === 'portfolio' && is_active_sidebar( 'sidebar-portfolio' ) ) {
			dynamic_sidebar( 'sidebar-portfolio' );
		}
	}

	/**
	 * Renders the archive filter for different post types.
	 *
	 * @return void
	 */
	public function archiveFilter() {

		if ( get_post_type() === 'post' ) {
			return;
		}
		$args = array();
		if ( ! is_active_sidebar( 'sidebar-testimonial' ) ) :
			$args['testimonial'] = 'testimonial_cat';
		endif;
		if ( ! is_active_sidebar( 'sidebar-team' ) ) :
			$args['team'] = 'team_cat';
		endif;
		if ( ! is_active_sidebar( 'sidebar-portfolio' ) ) :
			$args['portfolio'] = 'portfolio_cat';
		endif;
		if ( ! is_active_sidebar( 'sidebar-promotion' ) ) :
			$args['promotion'] = 'promotion_cat';
		endif;

			$args = array(
				'testimonial' => 'testimonial_cat',
				'team'        => 'team_cat',
				'portfolio'   => 'portfolio_cat',
				'promotion'   => 'promotion_cat',
			);

			$current_query = get_queried_object();
			?>
		<div class="filter-tab-title-wrap">
			<ul>
				<li class="tab
					<?php
					if ( $current_query->name === get_post_type() ) {
						echo esc_attr( ' active' );
					}
					?>
					">
					<a href="<?php echo esc_url( get_post_type_archive_link( get_post_type() ) ); ?>"><?php esc_html_e( 'All', 'home-improvement' ); ?></a>
				</li>
				<?php
				$testimonial_terms = get_terms(
					array(
						'taxonomy'   => $args[ get_post_type() ],
						'hide_empty' => true,
					)
				);
				foreach ( $testimonial_terms as $term ) {
					$term_link    = get_term_link( $term );
					$active_class = $current_query->name === $term->name ? ' active' : '';
					printf( '<li class="%1$s"><a href="%2$s">%3$s</a></li>', esc_attr( "tab$active_class" ), esc_url( $term_link ), esc_attr( $term->name ) );
				}
				?>
			</ul>
		</div>
		<?php
	}

	/**
	 * Modifies the archive title for custom post types.
	 *
	 * @param string $title The original archive title.
	 * @return string The modified archive title.
	 */
	public function cptArchiveTitle( $title ): string {
		if ( ! home_improvement_post_type() || ! is_post_type_archive() && is_category() ) {
			return $title;
		}
		return esc_html( get_theme_mod( 'mod_data_cpt_' . get_post_type() . '_title' ) );
	}

	/**
	 * Modifies the archive description for custom post types.
	 *
	 * @param string $description The original archive description.
	 * @return string The modified archive description.
	 */
	public function cptArchiveDescription( $description ): string {
		if ( ! home_improvement_post_type() || ! is_post_type_archive() && is_category() ) {
			return $description;
		}
		return esc_html( get_theme_mod( 'mod_data_cpt_' . get_post_type() . '_description' ) );
	}
}
