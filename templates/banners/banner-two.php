<?php
/**
 * Home Improvement Companion
 *  Banner Template two
 *
 * @package   home-improvement-companion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$hi_banner_two_image         = get_theme_mod( 'mod_data_homepage_hero_image', '' );
$hi_banner_two_title         = get_theme_mod( 'mod_data_homepage_hero_title', '' );
$hi_banner_two_sub_title     = get_theme_mod( 'mod_data_homepage_hero_sub_title', '' );
$hi_header_two_text_position = get_theme_mod( 'mod_data_homepage_hero_two_text_position', '' );
$hi_header_two_text_align    = get_theme_mod( 'mod_data_homepage_hero_two_text_align', '' );
$hi_banner_hero_buttons      = get_theme_mod( 'mod_data_homepage_hero_buttons', '' );
$hi_banner_form_title        = get_theme_mod( 'mod_data_homepage_hero_two_form_title', '' );
$hi_banner_shortcode         = get_theme_mod( 'mod_data_homepage_hero_two_shortcode', '' );
?>

<section class="hero-section type-two has-overlay <?php echo esc_attr( 'text-position-' . $hi_header_two_text_position ); ?>">
	<div class="hero-img">
		<?php echo wp_kses_post( wp_get_attachment_image( $hi_banner_two_image, 'full' ) ); ?>
	</div>

	<div class="container">
		<?php
		$hi_form_align = get_theme_mod( 'mod_data_homepage_hero_form_align', 'right' );
		$hi_text_align = get_theme_mod( 'mod_data_homepage_hero_text_align', 'center' );
		?>
		<div class="two-col-section <?php echo esc_attr( 'form-' . $hi_form_align ); ?>">

			<div class="col text-col <?php echo esc_attr( 'text-align-' . $hi_header_two_text_align ); ?>">
				<h2><?php echo esc_html( $hi_banner_two_title ); ?></h2>
				<p><?php echo esc_html( $hi_banner_two_sub_title ); ?></p>

				<div class="btn-wrap">
					<?php
					if ( $hi_banner_hero_buttons ) :

						foreach ( $hi_banner_hero_buttons as $hi_button ) :
							?>
							<a href="<?php echo esc_url( $hi_button['item_url'] ); ?>"
												<?php
												if ( $hi_button['item_target'] ) {
													echo 'target="_blank"';
												}
												?>
																					 class="btn cta-btn <?php echo esc_attr( $hi_button['item_buttonType'] ); ?>">
								<?php echo esc_html( $hi_button['item_text'] ); ?>
							</a>
							<?php
						endforeach;
					endif;
					?>
				</div><!-- .btn-wrap -->
			</div><!-- .text-col -->

			<?php if ( ! empty( $hi_banner_shortcode ) ) : ?>
				<div class="col form-col">
					<?php $hi_form_button_type = get_theme_mod( 'mod_data_homepage_hero_two_formButtonType', 'btn-secondary' ); ?>
					<div class="form-wrap has-<?php echo esc_attr( $hi_form_button_type ); ?>">
						<?php if ( ! empty( $hi_banner_form_title ) ) : ?>
							<h3><?php echo esc_html( $hi_banner_form_title ); ?></h3>
						<?php endif; ?>
						<?php if ( ! empty( $hi_banner_shortcode ) ) : ?>
							<?php echo wp_kses_post( wp_kses_post( do_shortcode( '[contact-form-7 id="' . esc_attr( $hi_banner_shortcode ) . '"]' ) ) ); ?>
						<?php endif; ?>
					</div>
				</div><!-- .col -->
			<?php endif; ?>
		</div>
	</div>
</section><!-- .hero-section -->
