<?php
/**
 * Home Improvement Homepage "Location" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
$hi_homepage_location_title       = get_theme_mod( 'mod_data_homepage_location_title', '' );
$hi_homepage_location_description = get_theme_mod( 'mod_data_homepage_location_description', '' );
$hi_homepage_location_iframe      = get_theme_mod( 'mod_data_homepage_location_iframe', '' );
$hi_homepage_location_image       = get_theme_mod( 'mod_data_homepage_location_image', '' );
?>

<section class="ap-section ap-location-section type-one">
	<div class="container">
		<div class="ap-col-grid">
			<div class="text-box">
				<div class="heading">
					<h2><?php echo esc_html( $hi_homepage_location_title ); ?></h2>
					<p><?php echo esc_html( $hi_homepage_location_description ); ?></p>

					<?php $hi_homepage_location_lists = get_theme_mod( 'mod_data_homepage_location_lists', array() ); ?>
					<div class="location-list">
						<ul>
							<?php foreach ( $hi_homepage_location_lists as $hi_homepage_location_list ) : ?>
								<li>
									<a href="<?php echo esc_url( $hi_homepage_location_list['link'] ); ?>" 
														<?php
														if ( $hi_homepage_location_list['target'] ) {
															echo 'target="_blank"';}
														?>
									>
										<?php echo esc_html( $hi_homepage_location_list['title'] ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

			<div class=" map-col">
				<?php if ( ! empty( $hi_homepage_location_image ) ) : ?>
					<?php echo wp_kses_post( wp_get_attachment_image( $hi_homepage_location_image, 'full' ) ); ?>
				<?php else : ?>
					<?php echo wp_kses_post( $hi_homepage_location_iframe ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section><!-- .ap-location-section .type-one -->
