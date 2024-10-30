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

use HomeImprovementCompanion\App\Frontend\Templates;

$hi_template = new Templates();

?>
<section class="home-improvement-dashboard">
  <h1><?php esc_html_e( 'Home Improvement: Theme Settings', 'home-improvement' ); ?></h1>
  <div class="container" id="tabs">
	<div class="nav">
	  <ul>
		<li><a href="#tabs-1"><?php esc_html_e( 'Getting Started', 'home-improvement' ); ?></a></li>
		<li><a href="#tabs-2"><?php esc_html_e( 'Home', 'home-improvement' ); ?></a></li>
		<li id="demo"><a href="#tabs-3"><?php esc_html_e( 'Demo Import', 'home-improvement' ); ?></a></li>
		<li><a href="#tabs-4"><?php esc_html_e( 'License Activation', 'home-improvement' ); ?></a></li>
		<li><a href="#tabs-5"><?php esc_html_e( 'Support', 'home-improvement' ); ?></a></li>
		<li><a href="#tabs-6"><?php esc_html_e( 'Extra Services', 'home-improvement' ); ?></a></li>
		<li><a href="#tabs-7"><?php esc_html_e( 'Recommended Plugins', 'home-improvement' ); ?></a></li>
	  </ul>
	</div>

	<div class="main-content">
	  <?php
			$hi_template->get( 'admin/pages/getting-started' );
			$hi_template->get( 'admin/pages/home' );
			$hi_template->get( 'admin/pages/demo-import' );
			$hi_template->get( 'admin/pages/license-activation' );
			$hi_template->get( 'admin/pages/support' );
			$hi_template->get( 'admin/pages/extra-services' );
			$hi_template->get( 'admin/pages/recommended-plugins' );
		?>
	</div>

  </div>
</section>
