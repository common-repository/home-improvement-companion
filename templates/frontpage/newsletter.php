<?php
/**
 * Home Improvement Homepage "Newsletter" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
$hi_homepage_newsletter_title            = get_theme_mod( 'mod_data_homepage_newsletter_title' );
$hi_homepage_newsletter_form             = get_theme_mod( 'mod_data_homepage_newsletter_form' );
$hi_homepage_newsletter_form_button_type = get_theme_mod( 'mod_data_homepage_newsletter_formButtonType' );
?>
<section class="ap-section ap-newsletter-section heading-center">
	<div class="container">
		<div class="heading">
			<h2><?php echo esc_html( $hi_homepage_newsletter_title ); ?></h2>
		</div>

		<?php if ( ! empty( $hi_homepage_newsletter_form ) ) : ?>
			<div class="newsletter-form has-<?php echo esc_attr( $hi_homepage_newsletter_form_button_type ); ?>">
				<?php echo wp_kses_post( do_shortcode( '[contact-form-7 id="' . $hi_homepage_newsletter_form . '"]' ) ); ?>
			</div>
		<?php endif; ?>
	</div>
</section><!-- .newsletter-section -->
