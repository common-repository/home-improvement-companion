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

?>
<section class="home-settings tab-content" id="tabs-2">
	<h2 class="appearance-settings-head setting-head"><?php esc_html_e( 'Appearance Settings', 'home-improvement' ); ?></h2>
	<div class="row">
		<div class="col-8">
			<div class="row appearance-settings settings-wrap">

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/color-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[panel]=colors"><?php esc_html_e( 'Color Settings', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/button-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[panel]=buttons"><?php esc_html_e( 'Button Settings', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/typography.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=typography_section"><?php esc_html_e( 'Typography', 'home-improvement' ); ?></a>
					</div>
				</div>
			</div>

			<h2 class="layout-settings-head setting-head"><?php esc_html_e( 'Layout Settings', 'home-improvement' ); ?></h2>
			<div class="row layout-settings settings-wrap">

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/setup-homepage.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[panel]=homepage">
											<?php
											esc_html_e(
												'Setup
							Homepage',
												'home-improvement'
											);
											?>
						</a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/header-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=header_section">
											<?php
											esc_html_e(
												'Header
							Settings',
												'home-improvement'
											);
											?>
						</a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/footer-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[panel]=footer"><?php esc_html_e( 'Footer Settings', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/sidebar-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[panel]=sidebar">
											<?php
											esc_html_e(
												'Sidebar
							Settings',
												'home-improvement'
											);
											?>
						</a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/mobile-cta-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=mobile_cta_section">
											<?php
											esc_html_e(
												'Mobile
							CTA Settings',
												'home-improvement'
											);
											?>
						</a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/blog-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[panel]=blog"><?php esc_html_e( 'Blog Settings', 'home-improvement' ); ?></a>
					</div>
				</div>
			</div>

			<h2 class="theme-settings-head setting-head"><?php esc_html_e( 'Theme Power Options', 'home-improvement' ); ?></h2>
			<div class="theme-options-wrap">
				<div class="theme-options-item">
					<div class="item-head">
						<h3><?php esc_html_e( 'Team', 'home-improvement' ); ?></h3>
						<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/team.svg' ); ?>" />
					</div>
					<p><?php esc_html_e( 'Effortlessly highlight team expertise and roles with \'TEAM CPT.\'', 'home-improvement' ); ?></p>
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=team' ) ); ?>"><?php esc_html_e( 'Add Member', 'home-improvement' ); ?></a>
						<a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=team_section' ) ); ?>"><?php esc_html_e( 'Edit Team Section', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="theme-options-item">
					<div class="item-head">
						<h3><?php esc_html_e( 'Promotion', 'home-improvement' ); ?></h3>
						<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/promotion.svg' ); ?>" />
					</div>
					<p><?php esc_html_e( 'Showcase enticing promotions and offers effortlessly with \'Promotion CPT.\'', 'home-improvement' ); ?> </p>
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=promotion' ) ); ?>"><?php esc_html_e( 'Add Promotion', 'home-improvement' ); ?></a>
						<a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=promotion_section' ) ); ?>"><?php esc_html_e( 'Edit Promotion Section', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="theme-options-item">
					<div class="item-head">
						<h3><?php esc_html_e( 'Testimonial ', 'home-improvement' ); ?></h3>
						<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/testimonial.svg	' ); ?>" />
					</div>
					<p><?php esc_html_e( 'Display client testimonials with ease and build trust using \'Testimonial CPT.\’', 'home-improvement' ); ?></p>
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=testimonial' ) ); ?>"><?php esc_html_e( 'Add Testimonial', 'home-improvement' ); ?></a>
						<a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=testimonial_section' ) ); ?>"><?php esc_html_e( 'Edit Testimonial Section', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="theme-options-item">
					<div class="item-head">
						<h3><?php esc_html_e( 'Portfolio', 'home-improvement' ); ?></h3>
						<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/portfolio.svg' ); ?>" />
					</div>
					<p><?php esc_html_e( 'Highlight your business projects elegantly with \'Portfolio CPT.\'', 'home-improvement' ); ?></p>
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=portfolio' ) ); ?>"><?php esc_html_e( 'Add Portfolio', 'home-improvement' ); ?></a>
						<a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=portfolio_section' ) ); ?>"><?php esc_html_e( 'Edit Portfolio Section', 'home-improvement' ); ?></a>
					</div>
				</div>
			</div>

			<h2 class="other-settings-head setting-head"><?php esc_html_e( 'Others', 'home-improvement' ); ?></h2>
			<div class="row other-settings settings-wrap">
				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/banner-settings.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=hero_section' ) ); ?>">
											<?php
											esc_html_e(
												'Edit
							Banner',
												'home-improvement'
											);
											?>
						</a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/menu-edit.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[panel]=nav_menus"><?php esc_html_e( 'Edit Menu', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/widget-setting.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( '/widgets.php' ) ); ?>"><?php esc_html_e( 'Widgets', 'home-improvement' ); ?></a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/social-media.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=header_section">
											<?php
											esc_html_e(
												'Social
							Links',
												'home-improvement'
											);
											?>
						</a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/site-identity.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[control]=blogname">
											<?php
											esc_html_e(
												'Site
							Identity',
												'home-improvement'
											);
											?>
						</a>
					</div>
				</div>

				<div class="setting-item">
					<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/conversion-page-setting.svg' ); ?>" />
					<div class="btn">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=cpt_section"><?php esc_html_e( 'Conversion Pages', 'home-improvement' ); ?></a>
					</div>
				</div>
			</div>

		</div>

		<div class="col-4">
			<div class="right-sidebar">
				<h2><?php esc_html_e( 'Documentation', 'home-improvement' ); ?></h2>
				<p><?php esc_html_e( 'Find answers to your questions, step-by-step guides, and more in our comprehensive documentation.', 'home-improvement' ); ?></p>
				<div class="btn">
					<a href="https://alleythemes.com/documentation/home-improvement/?utm_source=hi+plugin+dashboard&utm_medium=dhome+to+documentation" target="_blank"><?php esc_html_e( 'Documentation', 'home-improvement' ); ?> &#10230;</a>
				</div>
			</div>

			<div class="right-sidebar">
				<h2><?php esc_html_e( 'Support', 'home-improvement' ); ?></h2>
				<p>
				<?php
				esc_html_e(
					'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually
					is less than a business day, except on the weekends.',
					'home-improvement'
				);
				?>
				</p>
				<div class="btn">
					<a href="https://alleythemes.com/support/?utm_source=hi+plugin+dashboard&utm_medium=dhome+to+support" target="_blank"><?php esc_html_e( 'Submit a Ticket', 'home-improvement' ); ?> &#10230;</a>
				</div>
			</div>

			<div class="right-sidebar">
				<h2><?php esc_html_e( 'Save 30% on Pro Version', 'home-improvement' ); ?></h2>
				<p><?php esc_html_e( 'Your feedback, our discount - let\'s make your website even better!', 'home-improvement' ); ?></p>
				<div class="btn">
					<a href="https://alleythemes.com/discount-on-pro-versions/?utm_source=hi+plugin+dashboard&utm_medium=dhome+to+discount+page" target="_blank"><?php esc_html_e( 'Take Survey & Save 30%', 'home-improvement' ); ?> &#10230;</a>
				</div>
			</div>

		</div>
	</div>

	<div class="home-improvement-pro">
		<div class="col-8">
			<h2><?php esc_html_e( 'Upgrade to Home Improvement Pro', 'home-improvement' ); ?></h2>
			<p>
			<?php
			esc_html_e(
				'Upgrade to the Pro Version now to extend the features and functionalities of Business Services Theme and
				Companion Plugin for a business-boosting website.',
				'home-improvement'
			);
			?>
			</p>
			<div class="services-item-wrap">
				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Access Mobile CTA', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'CTA Section', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Footer Copyright', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Location Section', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Pro Demo Layouts', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Add More than 3 CPT Posts', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Extra Service Section', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Form Customization', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Scroll to Top Button', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Button Customization', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Footer Customization', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Menu Bar Customization', 'home-improvement' ); ?></p>
				</div>
				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'More Header Layouts', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Newsletter Section', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Banner with Form Layout', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Contact Section', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Priority Support', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'CPT Archive Pages', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Additional Blog Layouts', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Sticky Header', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'More Social Links', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Form Customization', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Open in New Tab Link Option', 'home-improvement' ); ?></p>
				</div>

				<div class="services-item">
					<p><span>&#10003;</span><?php esc_html_e( 'Header Customization', 'home-improvement' ); ?></p>
				</div>
			</div>
		</div>
		<div class="col-4">
			<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/thumb-pro.png' ); ?>" />
			<div class="service-btn large-btn"><a href="#"><?php esc_html_e( 'Upgrade Now', 'home-improvement' ); ?></a></div>
		</div>
	</div>

	<div class="changelog">
		<h2><?php esc_html_e( 'Changelog', 'home-improvement' ); ?></h2>
		<p>
		<?php
		esc_html_e(
			'We are always keep adding new features to our theme. This is why we highly recommend to stay up to date with each
			new theme version and all required plugins. You can view all theme changelog here!',
			'home-improvement'
		);
		?>
		</p>
	</div>
</section>
