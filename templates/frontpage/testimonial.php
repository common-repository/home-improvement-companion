<?php

/**
 * Home Improvement Homepage "Testimonial" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="ap-section ap-testimonial-section heading-center type-one">
	<div class="container">
		<div class="heading">
			<?php $hi_homepage_testimonial_title = get_theme_mod( 'mod_data_homepage_testimonial_title', '' ); ?>
			<h2><?php echo esc_html( $hi_homepage_testimonial_title ); ?></h2>
			<?php $hi_homepage_testimonial_sub_title = get_theme_mod( 'mod_data_homepage_testimonial_sub_title', '' ); ?>
			<p><?php echo esc_html( $hi_homepage_testimonial_sub_title ); ?></p>
		</div>

		<div class="testimonial-wrap">
			<?php
			$hi_homepage_testimonial_post_per_page = get_theme_mod( 'mod_data_homepage_testimonial_post_per_page', 2 );
			$hi_args                               = array(
				'post_type'      => 'testimonial',
				'post_status'    => 'publish',
				'posts_per_page' => $hi_homepage_testimonial_post_per_page,
			);

			$hi_homepage_testimonial_sort_by = 'latest';
			if ( $hi_homepage_testimonial_sort_by !== 'latest' ) :

                // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				$hi_args['tax_query'] = array(
					array(
						'taxonomy' => 'testimonial_cat',
						'field'    => 'slug',
						'terms'    => $hi_homepage_testimonial_sort_by,
					),
				);
			endif;
			$hi_query = new WP_Query( $hi_args );

			if ( $hi_query->have_posts() ) :
				?>
				<?php
				while ( $hi_query->have_posts() ) :
					$hi_query->the_post();
					?>
					<div class="testimonial-item">
						<div class="img">
							<?php the_post_thumbnail(); ?>
						</div>
						<!-- .img -->

						<div class="quote">
							<blockquote>

								<?php
								$hi_excerpt_limit = get_theme_mod( 'mod_data_homepage_testimonial_excerpt_limit', -1 );
								echo wp_kses_post( home_improvement_post_content( $hi_excerpt_limit ) );
								?>

							</blockquote>
						</div>
						<!-- .quote -->

						<div class="quote-meta">
							<?php $hi_meta_data = get_post_meta( get_the_ID(), 'home_improvement_data_key', true ); ?>
							<h2 class="name">
								<?php
								if ( ! empty( $hi_meta_data['testimonial_name'] ) ) :
									echo esc_html( $hi_meta_data['testimonial_name'] );
								else :
									the_title();
								endif;
								?>
							</h2>
							<!-- .name -->

							<?php if ( ! empty( $hi_meta_data['testimonial_company_name'] ) ) : ?>
								<div class="company">
									<?php
									$hi_link = '';
									if ( ! empty( $hi_meta_data['testimonial_company_link'] ) ) :
										$hi_link = $hi_meta_data['testimonial_company_link'];
									endif;

									?>
									<?php
									if ( ! empty( $hi_link ) ) {
										echo '<a href="' . esc_url( $hi_link ) . '">';
									}
									?>

									<?php echo esc_html( $hi_meta_data['testimonial_company_name'] ); ?>
									<?php
									if ( isset( $hi_link ) ) {
										echo '</a>';
									}
									?>
								</div>
								<!-- .company -->
							<?php endif; ?>

							<div class="quote-cat">
								<?php echo wp_kses_post( home_improvement_custom_taxonomies_terms_links( 1 ) ); ?>
							</div>
							<!-- .quote-cat -->
						</div>
						<!-- .quote-meta -->
					</div>
					<!-- .testimonial-item -->
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		</div>
		<!-- .testimonial-wrap -->

		<?php $hi_homepage_testimonial_button_label = get_theme_mod( 'mod_data_homepage_testimonial_button_label', 'View More' ); ?>
		<!-- <div class="btn-wrap btn-single"> -->
		<!-- <a href="<?php echo esc_url( get_post_type_archive_link( 'testimonial' ) ); ?>" class="btn btn-primary"><?php echo esc_html( $hi_homepage_testimonial_button_label ); ?></a> -->
		<!-- </div> -->
	</div>
</section><!-- .type-one -->
