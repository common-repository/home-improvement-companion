<?php
/**
 * Home Improvement Homepage "contact" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
$hi_homepage_contact_title         = get_theme_mod( 'mod_data_homepage_contact_title' );
$hi_homepage_contact_sub_title     = get_theme_mod( 'mod_data_homepage_contact_sub_title' );
$hi_homepage_contact_form_position = get_theme_mod( 'mod_data_homepage_contact_formPosition' );
$hi_homepage_contact_button_type   = get_theme_mod( 'mod_data_homepage_contact_formButtonType' );
?>

<section class="ap-section ap-quotation-section type-one">
	<div class="container">
		<div class="ap-col-grid form-position-<?php echo esc_attr( $hi_homepage_contact_form_position ); ?>">
			<div class="col text-box">
				<div class="heading">
					<h2><?php echo esc_html( $hi_homepage_contact_title ); ?></h2>
					<p><?php echo esc_html( $hi_homepage_contact_sub_title ); ?></p>
				</div>

				<?php
				$hi_homepage_contact_form = get_theme_mod( 'mod_data_homepage_contact_form' );
				if ( ! empty( $hi_homepage_contact_form ) ) :
					?>
					<div class="form-wrap has-<?php echo esc_attr( $hi_homepage_contact_button_type ); ?>">
						<?php echo wp_kses_post( wp_kses_post( do_shortcode( '[contact-form-7 id="' . esc_attr( $hi_homepage_contact_form ) . '"]' ) ) ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col img-box has-box-bg-right">
				<?php $hi_homepage_contact_image = get_theme_mod( 'mod_data_homepage_contact_image' ); ?>
				<?php echo wp_kses_post( wp_get_attachment_image( $hi_homepage_contact_image, 'full' ) ); ?>
			</div>
		</div>
	</div>
</section>
<!-- .ap-quotation-section .type-one -->
