<?php

/**
 * Home Improvement default header template
 *
 * @package 'home-improvement'
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use HomeImprovementCompanion\App\Frontend\Templates;

$hi_template = new Templates();

?>
<header id="masthead" class="site-header">
	<div class="header-one">
		<?php $hi_template->get( 'headers/header-topbar' ); ?>

		<div class="header-mid">
			<div class="container">
				<?php $hi_template->get( 'headers/header-site-branding' ); ?>

				<?php if ( true === get_theme_mod( 'mod_data_header_enable_button', true ) ) : ?>
					<?php
					$hi_header_buttons = get_theme_mod(
						'mod_data_header_button_items',
						array(
							array(
								'item_text'       => esc_html__( 'Book Now', 'home-improvement' ),
								'item_url'        => '#',
								'item_target'     => '_self',
								'item_buttonType' => 'btn-primary',
							),
						)
					);
					?>
					<div class="header-cta-wrap hide-on-mobile">
						<?php foreach ( $hi_header_buttons as $hi_header_button ) : ?>
							<a href="<?php echo esc_url( $hi_header_button['item_url'] ); ?>" 
												<?php
												if ( isset( $hi_header_button['item_target'] ) ) {
													echo 'target="_blank"';
												}
												?>
																								 class="btn cta-btn <?php echo esc_attr( $hi_header_button['item_buttonType'] ); ?>">
								<?php echo esc_html( $hi_header_button['item_text'] ); ?>
							</a>
						<?php endforeach; ?>
					</div>
					<!-- .header-cta-wrap -->
				<?php endif; ?>
			</div><!-- .container -->
		</div><!-- .header-mid -->

		<div class="header-bottom 
		<?php
		if ( true === get_theme_mod( 'mod_data_header_menu_on_banner', true ) ) {
			echo esc_attr( 'menu-on-banner' );
		}
		?>
									">
			<div class="container">
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php esc_html_e( 'Primary Menu', 'home-improvement' ); ?>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav>
				<!-- #site-navigation -->

			</div>
		</div><!-- .header-bottom -->
	</div><!-- .header-one -->
</header><!-- #masthead -->
