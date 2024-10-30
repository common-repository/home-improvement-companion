<?php

/**
 * Home Improvement Homepage "Team" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="ap-section ap-team-section type-two">
	<div class="container">
		<div class="heading-section">
			<div class="heading">
				<?php $hi_homepage_team_title = get_theme_mod( 'mod_data_homepage_team_title', '' ); ?>
				<h3><?php echo esc_html( $hi_homepage_team_title ); ?></h3>
				<?php $hi_homepage_team_sub_title = get_theme_mod( 'mod_data_homepage_team_sub_title', '' ); ?>
				<p><?php echo esc_html( $hi_homepage_team_sub_title ); ?></p>
			</div>
			<!-- .heading -->
		</div>
		<!-- .heading-section -->

		<div class="ap-col-grid ap-two-col has-border has-border-radius">
			<?php
			$hi_homepage_team_post_per_page = get_theme_mod( 'mod_data_homepage_team_post_per_page', 3 );
			$hi_args                        = array(
				'post_type'      => 'team',
				'post_status'    => 'publish',
				'posts_per_page' => $hi_homepage_team_post_per_page,
			);

			$hi_homepage_team_sort_by = 'latest';
			if ( $hi_homepage_team_sort_by !== 'latest' ) :
                // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				$hi_args['tax_query'] = array(
					array(
						'taxonomy' => 'team_cat',
						'field'    => 'slug',
						'terms'    => $hi_homepage_team_sort_by,
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
						<div class="img-box is-circle">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="text-box">
							<h4 class="name">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h4>
							<?php $hi_meta_data = get_post_meta( get_the_ID(), 'home_improvement_data_key', true ); ?>
							<?php if ( ! empty( $hi_meta_data['team_designation'] ) ) : ?>
								<div class=" designation"><?php echo esc_html( $hi_meta_data['team_designation'] ); ?>
								</div>
							<?php endif; ?>
							<div class="desc">

								<?php
								$hi_excerpt_limit = get_theme_mod( 'mod_data_homepage_team_excerpt_limit', -1 );
								echo wp_kses_post( home_improvement_post_content( $hi_excerpt_limit ) );
								?>

							</div>
							<?php $hi_homepage_team_button_label = get_theme_mod( 'mod_data_homepage_team_button_label', 'Learn More' ); ?>
							<a href="<?php the_permalink(); ?>" class="btn btn-link"><?php echo esc_html( $hi_homepage_team_button_label ); ?> <i class="fas fa-arrow-right"></i></a>
							<div class="social-block">
								<ul>
									<?php if ( ! empty( $hi_meta_data['team_facebook_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $hi_meta_data['team_facebook_link'] ); ?>" target="_blank">
												<i class="fab fa-facebook-square"></i>
											</a>
										</li>
									<?php endif; ?>
									<?php if ( ! empty( $hi_meta_data['team_linkedin_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $hi_meta_data['team_linkedin_link'] ); ?>" target="_blank">
												<i class="fab fa-linkedin"></i>
											</a>
										</li>
									<?php endif; ?>
									<?php if ( ! empty( $hi_meta_data['team_twitter_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $hi_meta_data['team_twitter_link'] ); ?>" target="_blank">
												<i class="fab fa-twitter"></i>
											</a>
										</li>
									<?php endif; ?>
									<?php if ( ! empty( $hi_meta_data['team_instagram_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $hi_meta_data['team_instagram_link'] ); ?>" target="_blank">
												<i class="fab fa-instagram"></i>
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
		<!-- .ap-col-grid -->
	</div>
</section><!-- .type-one -->
