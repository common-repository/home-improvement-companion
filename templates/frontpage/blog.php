<?php

/**
 * Home Improvement Homepage "Blog" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="ap-section ap-blog-section heading-center type-one">
	<div class="container">
		<div class="heading">
			<?php $hi_homepage_blog_title = get_theme_mod( 'mod_data_homepage_blog_title', '' ); ?>
			<h2><?php echo esc_html( $hi_homepage_blog_title ); ?></h2>
			<?php $hi_homepage_blog_sub_title = get_theme_mod( 'mod_data_homepage_blog_sub_title', '' ); ?>
			<p><?php echo esc_html( $hi_homepage_blog_sub_title ); ?></p>
		</div>

		<div class="ap-col-grid ap-post-grid ap-three-col has-border-text-box has-box-shadow">
			<?php
			$hi_post_per_page = get_theme_mod( 'mod_data_homepage_blog_post_per_page', 6 );
			$hi_args          = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $hi_post_per_page,
			);

			$hi_homepage_blog_sort_by = get_theme_mod( 'mod_data_homepage_blog_sort_by', 'latest' );
			if ( $hi_homepage_blog_sort_by !== 'latest' ) :
                // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				$hi_args['tax_query'] = array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $hi_homepage_blog_sort_by,
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
					<div class="col post">
						<div class="img-box">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php if ( true === get_theme_mod( 'mod_data_homepage_blog_category_enable', true ) ) : ?>
							<div class="cat-links">
								<?php the_category( ' ' ); ?>
							</div>
						<?php endif; ?>
						<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="post-meta">
							<?php home_improvement_posted_by(); ?>
							<?php home_improvement_posted_on(); ?>
							<?php home_improvement_comment(); ?>
							<?php home_improvement_tags(); ?>
						</div>
						<div class="post-excerpt">

							<?php
							$hi_excerpt_limit = get_theme_mod( 'mod_data_homepage_blog_excerpt_limit', -1 );
							echo wp_kses_post( home_improvement_post_content( $hi_excerpt_limit ) );
							?>

						</div>
						<?php $hi_button_label = get_theme_mod( 'mod_data_homepage_blog_each_card_button_label', 'Read More' ); ?>
						<a href="<?php the_permalink(); ?>" class="btn btn-link"><?php echo esc_html( $hi_button_label ); ?> <i class="fas fa-arrow-right"></i></a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>


	</div>
</div>
<!-- .type-one -->
