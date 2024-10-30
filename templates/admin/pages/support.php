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
<section class="support tab-content" id="tabs-5">
	<h2>Support</h2>
	<div class="support-item-wrap">
		<div class="support-item">
			<div class="image">
				<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/online-documentation.svg' ); ?>" />
			</div>
			<div class="support-content">
				<h3><?php esc_html_e( 'Discover Guides', 'home-improvement' ); ?></h3>
				<p>
				<?php
				esc_html_e(
					'Need help with using the Home Improvement WordPress as quickly as possible? Visit our well-organized Knowledge Base!',
					'home-improvement'
				);
				?>
				</p>
				<div class="extra-btn">
					<a href="https://alleythemes.com/documentation/home-improvement/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+documentation+card" target="_blank"><?php esc_html_e( 'Learn More', 'home-improvement' ); ?></a>
				</div>
			</div>
		</div>

		<div class="support-item">
			<div class="image">
				<img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/submit-ticket.svg' ); ?>" />
			</div>
			<div class="support-content">
				<h3><?php esc_html_e( 'Get Help Now', 'home-improvement' ); ?></h3>
				<p>
				<?php
				esc_html_e(
					'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually
					is less than a business day, except on the weekends.',
					'home-improvement'
				);
				?>
				</p>
				<div class="extra-btn">
					<a href="https://alleythemes.com/support/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+submit+ticket" target="_blank"><?php esc_html_e( 'Learn More', 'home-improvement' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
