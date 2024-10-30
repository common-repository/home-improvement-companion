<?php

/**
 * Home Improvement Homepage "About" section
 *
 * @package home-improvement
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="ap-img-fullwidth-section ap-section ap-two-col type-one">
	<div class="container">
		<?php $hi_homepage_about_image = get_theme_mod( 'mod_data_homepage_about_image' ); ?>
		<div class="col img-box">
			<?php echo wp_kses_post( wp_get_attachment_image( $hi_homepage_about_image, 'full' ) ); ?>
		</div>

		<?php
		$hi_text_align = get_theme_mod( 'mod_data_homepage_about_text_align', 'left' );
		?>
		<div class="col text-box <?php echo esc_attr( 'text-align-' . $hi_text_align ); ?>">
			<?php $hi_about_heading = get_theme_mod( 'mod_data_homepage_about_heading' ); ?>
			<h2><?php echo esc_html( $hi_about_heading ); ?></h2>
			<?php $hi_about_description = get_theme_mod( 'mod_data_homepage_about_description' ); ?>
			<?php echo wp_kses_post( $hi_about_description ); ?>

			<div class="btn-wrap">
				<?php
				$hi_buttons = get_theme_mod( 'mod_data_homepage_about_buttons', '' );
				if ( $hi_buttons ) :
					foreach ( $hi_buttons as $hi_button ) :
						?>
						<a href="<?php echo esc_url( $hi_button['link'] ); ?>" 
											<?php
											if ( isset( $hi_button['target'] ) ) {
												echo 'target="_blank"';
											}
											?>
																				 class="btn btn-primary">
							<?php echo esc_html( $hi_button['label'] ); ?>
						</a>
						<?php
					endforeach;
				endif;
				?>
			</div>
		</div>

	</div>
</section>
<!-- .type-one -->
