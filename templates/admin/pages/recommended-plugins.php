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
<section class="recommended-plugins tab-content" id="tabs-7">
	<h2><?php esc_html_e( 'Recommended Plugins', 'home-improvement' ); ?></h2>
	<div class="plugins-items-wrap">
		<div class="plugins-item">
			<h3><?php esc_html_e( 'Demo Importer', 'home-improvement' ); ?></h3>
			<p><?php esc_html_e( 'Enable this plugin to import the demo you saw in our website.', 'home-improvement' ); ?></p>
			<div class="plugin-btn extra-btn">
				<?php $hi_requirement->pluginButton( 'One Click Demo Import' ); ?>
			</div>
		</div>
		<?php if ( ! $hi_requirement->isPluginActivated() ) : ?>
			<div class="extra-btn">
				<a class="btn-plugin-get-started" href="#"><?php echo esc_html__( 'Install & Activate all plugins', 'home-improvement' ); ?></a>
			</div>
		<?php endif; ?>
	</div>

</section>
