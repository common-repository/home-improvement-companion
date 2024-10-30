<?php
/**
 * Home Improvement Homepage "Service" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
$hi_homepage_service_title     = get_theme_mod( 'mod_data_homepage_service_title', '' );
$hi_homepage_service_sub_title = get_theme_mod( 'mod_data_homepage_service_sub_title', '' );
?>

<section class="ap-section ap-feat-section heading-center type-one">
	<div class="container">
		<div class="heading">
			<h2><?php echo esc_html( $hi_homepage_service_title ); ?></h2>
			<p><?php echo esc_html( $hi_homepage_service_sub_title ); ?></p>
		</div>

		<div class="col-wrap ap-three-col has-icon ap-col-grid">
			<?php $hi_homepage_service_items = get_theme_mod( 'mod_data_homepage_service_items', array() ); ?>

			<?php foreach ( $hi_homepage_service_items as $hi_homepage_service_item ) : ?>
				<div class="col">
					<div class="icon-box">
						<?php echo wp_kses_post( wp_get_attachment_image( $hi_homepage_service_item['image'], 'full' ) ); ?>
					</div>
					<div class="text-box">
						<h3>
							<a href="<?php echo esc_url( $hi_homepage_service_item['link'] ); ?>">
								<?php echo esc_html( $hi_homepage_service_item['title'] ); ?>
							</a>
						</h3>
						<?php if ( ! empty( $hi_homepage_service_item['description'] ) ) : ?>
							<p><?php echo esc_html( $hi_homepage_service_item['description'] ); ?></p>
						<?php endif; ?>


						<?php if ( ! empty( $hi_homepage_service_item['link'] ) ) : ?>
							<a href="<?php echo esc_url( $hi_homepage_service_item['link'] ); ?>" class="btn btn-link" 
												<?php
												if ( isset( $hi_homepage_service_item['target'] ) ) {
													echo 'target="_blank"';}
												?>
							>
								<?php echo esc_html( $hi_homepage_service_item['link_label'] ); ?>
								<i class="fas fa-arrow-right"></i>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
			<!-- .col -->
		</div>
		<!-- .col-wrap -->
	</div>
</section>
<!-- .ap-feat-section -->
