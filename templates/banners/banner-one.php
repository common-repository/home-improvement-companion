<?php
/**
 * Home Improvement Companion
 *  Banner Template one
 *
 * @package   home-improvement-companion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$hi_banner_image         = get_theme_mod( 'mod_data_homepage_hero_image', '' );
$hi_banner_title         = get_theme_mod( 'mod_data_homepage_hero_title', '' );
$hi_banner_sub_title     = get_theme_mod( 'mod_data_homepage_hero_sub_title', '' );
$hi_banner_hero_buttons  = get_theme_mod( 'mod_data_homepage_hero_buttons', '' );
$hi_banner_text_position = get_theme_mod( 'mod_data_homepage_hero_text_position', '' );
?>
<section class="hero-section type-one has-overlay <?php echo esc_attr( 'text-position-' . $hi_banner_text_position ); ?>">
	<?php if ( ! empty( $hi_banner_image ) ) : ?>
		<div class="hero-img">
			<?php echo wp_kses_post( wp_get_attachment_image( $hi_banner_image, 'full' ) ); ?>
		</div>
	<?php endif; ?>

	<div class="container">
		<?php
		$hi_form_align = get_theme_mod( 'mod_data_homepage_hero_form_align', 'right' );
		$hi_text_align = get_theme_mod( 'mod_data_homepage_hero_text_align', 'center' );
		?>
		<div class="two-col-section">
			<div class="col text-col <?php echo esc_attr( 'text-align-' . $hi_text_align ); ?>">
				<h2><?php echo esc_html( $hi_banner_title ); ?></h2>
				<p><?php echo esc_html( $hi_banner_sub_title ); ?></p>

				<div class="btn-wrap">
					<?php
					if ( $hi_banner_hero_buttons ) :

						foreach ( $hi_banner_hero_buttons as $hi_button ) :
							?>
							<a href="<?php echo esc_url( $hi_button['item_url'] ); ?>"
												<?php
												if ( $hi_button['item_target'] ) {
													echo 'target="_blank"';}
												?>
							 class="btn cta-btn <?php echo esc_attr( $hi_button['item_buttonType'] ); ?>">
								<?php echo esc_html( $hi_button['item_text'] ); ?>
							</a>
							<?php
					endforeach;
					endif;
					?>
				</div><!-- .btn-wrap -->
			</div>
			<!-- .text-col -->
		</div>
	</div>
</section><!-- .hero-section -->
