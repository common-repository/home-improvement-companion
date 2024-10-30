<?php

/**
 * Home Improvement default header template
 *
 * @package 'home-improvement'
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php if ( true === get_theme_mod( 'mod_data_mobile_cta_enable', true ) ) : ?>
	<div class="header-cta-wrap cta-icon-wrap hide-on-desktop">
		<?php
		$hi_mobile_cta_type  = get_theme_mod( 'mod_data_mobile_cta_type', 'text' );
		$hi_mobile_cta_items = get_theme_mod( 'mod_data_mobile_cta_' . $hi_mobile_cta_type . '_items', array() );
		?>
		<?php
		foreach ( $hi_mobile_cta_items as $hi_mobile_cta_item ) {
			printf(
				'<a href="%s" %s class="%s">%s</a>',
				esc_url( $hi_mobile_cta_item['item_url'] ),
				( $hi_mobile_cta_item['item_target'] ? 'target="_blank"' : '' ),
				( $hi_mobile_cta_type === 'text' ? esc_attr( 'btn cta-btn ' ) . esc_attr( $hi_mobile_cta_item['item_buttonType'] ) : esc_attr( 'btn cta-icon' ) ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				( $hi_mobile_cta_type === 'text' ? esc_html( $hi_mobile_cta_item['item_text'] ) : '<i class="' . esc_attr( $hi_mobile_cta_item['item_icon'] ) . '"></i>' . esc_html( $hi_mobile_cta_item['item_text'] ) ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}
		?>
	</div><!-- .header-cta-wrap -->
<?php endif; ?>
