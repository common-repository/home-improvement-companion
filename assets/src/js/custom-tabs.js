/**
 * avaScript file for recommended plugin install.
 */

jQuery(document).ready(function ($) {
	if (!$('.home-improvement-dashboard .nav').length) {
		return;
	}
	// Get the fragment identifier from the URL
	const fragment = window.location.hash;
	// Initial tab to display
	showTab(fragment ? fragment : '#tabs-1');

	// Click event for tab buttons
	$('.home-improvement-dashboard .nav a, .hi-dashboard-tab').click(
		function () {
			const tabId = $(this).attr('href');
			showTab(tabId);
		}
	);

	// Function to show a specific tab
	function showTab(tabId) {
		// Hide all tab contents
		$('.main-content > section').hide();

		// Deactivate all tab buttons
		$('.home-improvement-dashboard .nav li').removeClass('active');

		// Show the selected tab content
		$(tabId).show();

		// Activate the selected tab button
		$(".home-improvement-dashboard .nav a[href='" + tabId + "']")
			.closest('li')
			.addClass('active');

		// Scroll to the selected section with a top offset of 20 pixels
		$('html, body').animate(
			{
				scrollTop: $(tabId).offset().top - 500,
			},
			500
		); // You can adjust the duration (500 milliseconds in this example) as needed
	}
});
