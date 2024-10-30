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
use HomeImprovementCompanion\Config\Requirements;

$hi_requirement = new Requirements();

?>
<section class="demo-import tab-content" id="tabs-3">
	<h2><?php esc_html_e( 'Templates to Get Started', 'home-improvement' ); ?></h2>
	<p>
	<?php
	esc_html_e(
		'Home Improvement Theme includes variety of starter templates suited for different home service, maintenance, and
		renovation businesses’ websites. New designs are added frequently to the collection. Visit here to see all the
		templates.',
		'home-improvement'
	);
	?>
	</p>
	<div class="box-wrap">
		<div class="box"><img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/thumb-pro.png' ); ?>" /></div>
		<div class="box"><img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/thumb-pro.png' ); ?>" /></div>
		<div class="box"><img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/thumb-pro.png' ); ?>" /></div>
		<div class="box"><img src="<?php echo esc_url( plugin_dir_url( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'assets/public/images/dashboard/thumb-pro.png' ); ?>" /></div>
	</div>
	<p><strong><?php esc_html_e( 'Note:', 'home-improvement' ); ?></strong> 
								 <?php
									esc_html_e(
										'The included required plugins need to be installed and activated before you import demo.
		Demo importer can vary in time.',
										'home-improvement'
									);
									?>
	</p>
	<?php if ( ! $hi_requirement->isPluginActivated() ) { ?>
			<div class="large-btn">
				<a class="btn-plugin-get-started" href="<?php echo esc_url( admin_url( '/themes.php?page=one-click-demo-import' ) ); ?>"><?php echo esc_html__( 'First Install & Activate all Plugins', 'home-improvement' ); ?></a>
			</div>
		<?php } else { ?>
			<div class="large-btn">
				<a href="<?php echo esc_url( admin_url( '/themes.php?page=one-click-demo-import' ) ); ?>"><?php esc_html_e( 'Import Website Demos', 'home-improvement' ); ?></a>
			</div>
	<?php }; ?>
</section>
