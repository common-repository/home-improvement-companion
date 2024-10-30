<?php
/**
 * Home Improvement Homepage "Favourite" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
$hi_title     = get_theme_mod( 'mod_data_homepage_promotion_title' );
$hi_sub_title = get_theme_mod( 'mod_data_homepage_promotion_sub_title' );
?>

<section class="ap-section ap-fav-section type-one">
	<div class="container">
		<div class="heading">
			<h2><?php echo esc_html( $hi_title ); ?></h2>
			<p><?php echo esc_html( $hi_sub_title ); ?></p>
		</div>
		<div class="col-wrap ap-three-col ap-col-grid has-thumb-img has-border-radius text-has-bgc">
			<?php
			$hi_post_per_page = get_theme_mod( 'mod_data_homepage_promotion_post_per_page', 3 );
			$hi_args          = array(
				'post_type'      => 'promotion',
				'post_status'    => 'publish',
				'posts_per_page' => $hi_post_per_page,
			);

			$hi_sort_by = 'latest';
			if ( $hi_sort_by !== 'latest' ) :
                // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				$hi_args['tax_query'] = array(
					array(
						'taxonomy' => 'promotion_cat',
						'field'    => 'slug',
						'terms'    => $hi_sort_by,
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

						<div class="img-box">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="text-box">
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>

								<?php
								$hi_excerpt_limit = get_theme_mod( 'mod_data_homepage_promotion_excerpt_limit', -1 );
								echo wp_kses_post( home_improvement_post_content( $hi_excerpt_limit ) );
								?>


							<?php $hi_button_label = get_theme_mod( 'mod_data_homepage_promotion_each_card_button_label', 'Read More' ); ?>
							<a href="<?php the_permalink(); ?>" class="btn btn-link"><?php echo esc_html( $hi_button_label ); ?> <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- .ap-fav-section .type-one -->
