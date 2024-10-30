<?php

/**
 * Home Improvement Homepage "What We Serve" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
$hi_extra_service_title     = get_theme_mod( 'mod_data_extra_service_title' );
$hi_extra_service_sub_title = get_theme_mod( 'mod_data_extra_service_sub_title' );
?>
<section class="ap-section heading-center ap-feat-area-section type-one">
	<div class="container">
		<div class="heading">
			<h2><?php echo esc_html( $hi_extra_service_title ); ?></h2>
			<p><?php echo esc_html( $hi_extra_service_sub_title ); ?></p>
		</div>

		<div class="col-wrap ap-three-col ap-col-grid has-thumb-img">
			<?php $hi_extra_service_items = get_theme_mod( 'mod_data_extra_service_items', array() ); ?>

			<?php foreach ( $hi_extra_service_items as $hi_serve_item ) : ?>
				<div class="col">
					<div class="img-box">
						<?php echo wp_kses_post( wp_get_attachment_image( $hi_serve_item['image'], 'full' ) ); ?>
					</div>
					<div class="text-box">

						<h3>
							<a href="<?php echo esc_url( $hi_serve_item['link'] ); ?>" 
												<?php
												if ( $hi_serve_item['target'] ) {
													echo 'target="_blank"';
												}
												?>
																						>
								<?php echo esc_html( $hi_serve_item['title'] ); ?>
							</a>
						</h3>

						<p><?php echo esc_html( $hi_serve_item['description'] ); ?></p>
						<a href="<?php echo esc_url( $hi_serve_item['link'] ); ?>" class="btn btn-link" 
											<?php
											if ( $hi_serve_item['target'] ) {
												echo 'target="_blank"';
											}
											?>
																										>
							<?php echo esc_html( $hi_serve_item['link_label'] ); ?>
							<i class="fas fa-arrow-right"></i>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section><!-- .ap-feat-area-section .type-one -->
