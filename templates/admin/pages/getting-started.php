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
<section class="inner-content tab-content" id="tabs-1">
	<h2 class="inner-content-head"><?php esc_html_e( 'Getting Started', 'home-improvement' ); ?></h2>
	<div class="row">

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '1', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Install Recommended Plugins', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'To build your website with the same layouts you saw on our demo site, the theme requires certain plugins.
							We strongly suggest installing the recommended plugins to ensure optimal performance and functionality.',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a class="hi-dashboard-tab" href="#tabs-7">
							<?php
							esc_html_e(
								'Install
								Plugins',
								'home-improvement'
							);
							?>
							</a>
							<a href="https://alleythemes.com/docs/install-recommended-plugins/ ?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+recommended+plugins" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '2', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Import the Website Demo', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'Here you can import the demo data to your site. Doing this will make your site look like the demo site.
							It helps you to understand better the theme and build something similar to our demo quicker.',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/themes.php?page=one-click-demo-import&browse=all&hide-notice=welcome' ) ); ?>">
												<?php
												esc_html_e(
													'Import
								Demo',
													'home-improvement'
												);
												?>
							</a>
							<a href="https://alleythemes.com/docs/importing-starter-site/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+demo+import" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '3', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Customize Theme Options', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'Start customize theme\'s layouts, typography, elements colors using WordPress customize and see your
							changes in live preview instantly.',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[panel]=theme' ) ); ?>">
												<?php
												esc_html_e(
													'Go to
								Customization',
													'home-improvement'
												);
												?>
							</a>
							<a href="https://alleythemes.com/docs/customizing-theme-options/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+customization+option" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '4', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Setup Homepage', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'To build your website with the same layouts you saw on our demo site, the theme requires certain plugins.
							We strongly suggest installing the recommended plugins to ensure optimal performance and functionality.',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[panel]=homepage' ) ); ?>">
												<?php
												esc_html_e(
													'Setup
								Homepage',
													'home-improvement'
												);
												?>
							</a>
							<a href="https://alleythemes.com/documentation/home-improvement/5-setup-homepage/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+homepage+setup" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '5', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Set Navigation Menu', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'Once you imported demo or created your own pages. You can setup navigation menu and assign to your
							website main header or any other places.',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/nav-menus.php?action=edit&menu=0' ) ); ?>">
												<?php
												esc_html_e(
													'Create
								Menu',
													'home-improvement'
												);
												?>
							</a>
							<a href="https://alleythemes.com/docs/how-to-create-edit-navigation-menu-2/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+navigation+menu" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '6', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Permalinks Structures', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'You can change your website permalink structure to better SEO result. Click here to setup WordPress
							permalink options.',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/options-permalink.php' ) ); ?>">
												<?php
												esc_html_e(
													'Setup
								Permalink',
													'home-improvement'
												);
												?>
							</a>
							<a href="https://alleythemes.com/docs/setting-up-permalinks/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+permalinks" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '7', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Setup Teams', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'Showcasing your team\'s expertise and talent on the homepage, individual pages, and archive pages
							effortlessly with our Team feature!',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=team' ) ); ?>">
												<?php
												esc_html_e(
													'Add
								Member',
													'home-improvement'
												);
												?>
							</a>
							<a href="https://alleythemes.com/docs/how-to-add-a-team-member/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+add+team+member" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '8', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Setup Portfolios', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'Showcase your work effectively by utilizing our versatile portfolio feature on the homepage, individual
							pages, and archive section - captivate your audience with stunning visuals!',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=portfolio' ) ); ?>"><?php esc_html_e( 'Add Portfolios', 'home-improvement' ); ?></a>
							<a href="https://alleythemes.com/docs/how-to-add-a-portfolio-project/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+add+portfolio" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '9', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Setup Testimonials', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'Boost your site\'s credibility and engage your visitors by utilizing our testimonial section on the
							homepage, individual pages, and archive page to build customer trust.',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=testimonial' ) ); ?>"><?php esc_html_e( 'Add Reviews', 'home-improvement' ); ?></a>
							<a href="https://alleythemes.com/docs/how-to-add-a-new-testimonial/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+add+testimonial" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 inner-content-item step-item-box">
			<div class="row">
				<div class="col step-item-box__title">
					<div class="step">
						<p><?php esc_html_e( 'STEP', 'home-improvement' ); ?></p>
						<h3><?php esc_html_e( '10', 'home-improvement' ); ?></h3>
					</div>
				</div>
				<div class="col  step-item-box__desc">
					<div class="left-content">
						<h3 class="content-title"><?php esc_html_e( 'Setup Promotions', 'home-improvement' ); ?></h3>
						<p>
						<?php
						esc_html_e(
							'Showcase enticing promotions and offers on your homepage, individual pages, and archive pages
							effortlessly with our built-in Promotions Section - captivate your visitors and drive conversions!',
							'home-improvement'
						);
						?>
						</p>
						<div class="btn">
							<a href="<?php echo esc_url( admin_url( '/post-new.php?post_type=promotion' ) ); ?>">
												<?php
												esc_html_e(
													'Add
								Offers & Promotion',
													'home-improvement'
												);
												?>
							</a>
							<a href="https://alleythemes.com/docs/how-to-add-a-new-promotion-offer/?utm_source=hi+plugin+dashboard&utm_medium=hi+pd+add+promotion" target="_blank"><?php esc_html_e( 'Learn How', 'home-improvement' ); ?></a>
						</div>
					</div>
				</div>
			</div>
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
