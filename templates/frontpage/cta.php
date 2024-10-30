<?php
/**
 * Home Improvement Homepage "CTA" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
$hi_cta_type          = get_theme_mod( 'mod_data_cta_type', '' );
$hi_cta_image         = get_theme_mod( 'mod_data_cta_image', '' );
$hi_cta_title         = get_theme_mod( 'mod_data_cta_title', '' );
$hi_cta_sub_title     = get_theme_mod( 'mod_data_cta_sub_title', '' );
$hi_cta_button_label  = get_theme_mod( 'mod_data_cta_button_label', 'Request Quote' );
$hi_cta_button_link   = get_theme_mod( 'mod_data_cta_button_link', '#' );
$hi_cta_button_target = get_theme_mod( 'mod_data_cta_button_target', '' );
$hi_cta_button_type   = get_theme_mod( 'mod_data_cta_button_type', 'btn-secondary' );
?>

<section class="ap-section ap-cta-section text-center type-one">
	<div class="container">
		<?php if ( ! empty( $hi_cta_title ) ) : ?>
			<h2><?php echo esc_html( $hi_cta_title ); ?></h2>
		<?php endif; ?>
		<?php if ( ! empty( $hi_cta_sub_title ) ) : ?>
			<p><?php echo wp_kses_post( $hi_cta_sub_title ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $hi_cta_button_label ) ) : ?>
			<a href="<?php echo esc_url( $hi_cta_button_link ); ?>" class="btn <?php echo esc_attr( $hi_cta_button_type ); ?>"
				<?php
				if ( $hi_cta_button_target ) {
					echo 'target="_blank"';}
				?>
			>
				<?php echo esc_html( $hi_cta_button_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</section><!-- .ap-cta-section .type-one -->
