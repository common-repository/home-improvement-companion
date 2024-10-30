<?php
/**
 * Home Improvement Homepage "Portfolio" section
 *
 * @package home-improvement-companion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="ap-section ap-projects-section heading-center project-type-one">
	<div class="container">
		<div class="heading">
			<?php $hi_homepage_portfolio_title = get_theme_mod( 'mod_data_homepage_portfolio_title', '' ); ?>
			<h2><?php echo esc_html( $hi_homepage_portfolio_title ); ?></h2>
			<?php $hi_homepage_portfolio_sub_title = get_theme_mod( 'mod_data_homepage_portfolio_sub_title', '' ); ?>
			<p><?php echo esc_html( $hi_homepage_portfolio_sub_title ); ?></p>
		</div>

		<div class="ap-col-grid has-border-radius has-overlay ap-three-col">

			<?php
			$hi_homepage_team_post_per_page = get_theme_mod( 'mod_data_homepage_portfolio_post_per_page', 3 );
			$hi_args                        = array(
				'post_type'      => 'portfolio',
				'post_status'    => 'publish',
				'posts_per_page' => $hi_homepage_team_post_per_page,
			);

			$hi_homepage_portfolio_sort_by = 'latest';
			if ( $hi_homepage_portfolio_sort_by !== 'latest' ) :
                // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				$hi_args['tax_query'] = array(
					array(
						'taxonomy' => 'portfolio_cat',
						'field'    => 'slug',
						'terms'    => $hi_homepage_portfolio_sort_by,
					),
				);
			endif;

			$hi_the_query = new WP_Query( $hi_args );

			if ( $hi_the_query->have_posts() ) :
				?>
				<?php
				while ( $hi_the_query->have_posts() ) :
					$hi_the_query->the_post();
					?>
					<div class="col">
						<div class="cat-box">
							<?php echo wp_kses_post( home_improvement_custom_taxonomies_terms_links( 2 ) ); ?>
						</div>

						<div class="img-box">
							<?php the_post_thumbnail(); ?>
						</div>

						<div class="text-box">
							<h3><?php the_title(); ?></h3>

							<?php
							$hi_excerpt_limit = get_theme_mod( 'mod_data_homepage_portfolio_excerpt_limit', -1 );
							echo wp_kses_post( home_improvement_post_content( $hi_excerpt_limit ) );
							?>

							<a href="<?php the_permalink(); ?>" class="btn btn-link"><?php esc_html_e( 'VIEW PROJECT', 'home-improvement' ); ?> <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>

		<?php $hi_homepage_portfolio_button_label = get_theme_mod( 'mod_data_homepage_portfolio_button_label', 'View All' ); ?>
		<!-- <div class="btn-wrap btn-single"> -->
		<!-- <a href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>" class="btn btn-primary"><?php echo esc_html( $hi_homepage_portfolio_button_label ); ?></a> -->
		<!-- </div> -->
	</div>
</div><!-- .project-type-one -->
