/**
 * avaScript file for recommended plugin install.
 */

jQuery(document).ready(function ($) {
	$('body')
		.on(
			'click',
			'#accordion-section-install-demo-importer a, .btn-plugin-get-started',
			function (e) {
				e.preventDefault();

				// Show updating gif icon and update button text.
				$(this)
					.addClass('updating-message')
					.text(adminAjaxObj.btn_text);

				const btnData = {
					action: 'required_plugins',
					security: adminAjaxObj.security_nonce,
				};

				$.ajax({
					type: 'POST',
					url: ajaxurl, // URL to "wp-admin/admin-ajax.php"
					data: btnData,
					success(response) {
						let dismissNonce,
							extraUri = '';
						const btnDismiss = $(
							'.home-improvement-notice-dismiss'
						);

						if (btnDismiss.length) {
							dismissNonce = btnDismiss
								.attr('href')
								.split('notice_security_nonce=')[1];
							extraUri = '&notice_security_nonce=' + dismissNonce;
						}

						window.location.href =
							response.data.redirect + extraUri;
					},
					error(xhr, ajaxOptions, thrownError) {
						// eslint-disable-next-line no-console
						console.log(thrownError);
					},
				});
			}
		)
		.on('click', '.btn-plugin', function (e) {
			e.preventDefault();

			const btn = $(this);
			const btnType = $(this).attr('data-type');
			const pluginName = $(this).attr('data-plugin');
			const btnData = {
				action: 'check_plugin',
				type: btnType,
				pluginName,
				security: adminAjaxObj.security_nonce,
			};

			// Show updating gif icon and update button text.
			btn.text(adminAjaxObj.btn_text_activating);

			$.ajax({
				type: 'POST',
				url: ajaxurl, // URL to "wp-admin/admin-ajax.php"
				data: btnData,
				success(response) {
					if (response.success) {
						btn.text(adminAjaxObj.btn_text_activated);
					} else {
						// eslint-disable-next-line no-alert
						alert(response.data.errorMessage);
					}
				},
				error(xhr, ajaxOptions, thrownError) {
					// eslint-disable-next-line no-console
					console.log(thrownError);
				},
			});
		});
});
