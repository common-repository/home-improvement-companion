<?php
/**
 * Home Improvement header site branding template
 *
 * @package 'home-improvement'
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php if ( true === get_theme_mod( 'mod_data_header_enable_topbar', true ) ) : ?>
	<div class="header-top">
		<div class="container">
			<?php if ( get_theme_mod( 'mod_data_header_enable_social_link', true ) ) : ?>
				<div class="top-social top-left">
					<ul>
						<?php
						$hi_header_social_link = get_theme_mod( 'mod_data_header_social_link', array() );
						foreach ( $hi_header_social_link as $hi_link ) :
							?>
							<li class="<?php echo esc_attr( $hi_link['social_icon'] ); ?>"><a href="<?php echo esc_url( $hi_link['social_link'] ); ?>" target="_blank" title="<?php echo esc_attr( $hi_link['social_icon'] ); ?>"><?php echo esc_attr( $hi_link['social_icon'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<!-- . top-left -->
			<?php endif; ?>

			<div class="top-right col">
				<?php $hi_top_info = get_theme_mod( 'mod_data_header_topbar_text', '' ); ?>
				<?php if ( ! empty( $hi_top_info ) ) : ?>
					<div class="top-info">
						<?php echo esc_html( $hi_top_info ); ?>
					</div><!-- .top-info -->
				<?php endif; ?>

				<?php $hi_top_phone = get_theme_mod( 'mod_data_header_topbar_phone', '' ); ?>
				<?php if ( ! empty( $hi_top_phone ) ) : ?>
					<div class="top-phone">
						<a href="tel:<?php echo esc_attr( $hi_top_phone ); ?>"><?php echo esc_html( $hi_top_phone ); ?></a>
					</div><!-- .top-phone -->
				<?php endif; ?>

				<?php $hi_top_email = get_theme_mod( 'mod_data_header_topbar_email', '' ); ?>
				<?php if ( ! empty( $hi_top_email ) ) : ?>
					<div class="top-email">
						<a href="mailto:<?php echo esc_attr( $hi_top_email ); ?>"><?php echo esc_html( $hi_top_email ); ?></a>
					</div><!-- .top-email -->
				<?php endif; ?>

				<?php if ( get_theme_mod( 'mod_data_headerSearch_enable', true ) ) : ?>
					<div class="search-form-wrap">
						<div class="search-trigger">
							<i class="fas fa-search"></i>
						</div>
						<div class="form-modal">
							<div class="content">
								<i class="fas fa-times"></i>
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div><!-- .top-right -->
		</div><!-- .container -->
	</div><!-- .header-top -->
<?php endif; ?>
