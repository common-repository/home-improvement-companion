/**
 * SASS
 */
import '../sass/frontend.scss';

/**
 * JavaScript
 */

/**
 * Add here your JavasScript code
 */

jQuery(document).ready(function ($) {
	let page = 2; // The initial page number to load additional posts
	let isLoading = false; // Flag to track if the AJAX request is in progress
	let reachedEnd = false; // Flag to track if all posts have been loaded
	const canLoadPosts = true;

	const $postContainer = $('#post-container');
	const $loadingMessage = $('.loading-wrap');
	const $loadingMessageDefaulText = $('.loading-wrap').find('.text').text();

	$('#loading-message').on('click', function (e) {
		e.preventDefault();
		loadPosts();
	});

	if (ajaxObj.isBlog.activeInfiniteScroll) {
		$(window).scroll(function () {
			const windowHeight = $(window).height();
			//const documentHeight = $(document).height();
			const scrollPosition = $(window).scrollTop();

			const scrollBottomPosition = scrollPosition + windowHeight;
			const postContainerOffset =
				$postContainer.offset().top + $postContainer.outerHeight();

			if (scrollBottomPosition >= postContainerOffset && canLoadPosts) {
				loadPosts();
			}
		});
	}

	function loadPosts() {
		if (isLoading || reachedEnd) {
			return;
		}

		isLoading = true;

		$.ajax({
			url: ajaxObj.ajaxUrl,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'load_more_posts',
				page,
				security: ajaxObj.security,
				postsPerPage: ajaxObj.postsPerPage,
				plugin_wp_query_vars: ajaxObj.plugin_wp_query_vars,
				plugin_wp_query: ajaxObj.plugin_wp_query,
				plugin_wp_post_type: ajaxObj.plugin_wp_post_type,
			},
			beforeSend() {
				$loadingMessage.show();
				$loadingMessage.find('.text').text(ajaxObj.loadingText);
			},
			complete() {
				$loadingMessage.find('.text').text($loadingMessageDefaulText);
			},
			success(response) {
				if (response.success) {
					const posts = response.data.posts; // Convert the response into a jQuery object

					posts.forEach(function (value) {
						$postContainer.append(value);
						if (ajaxObj.isBlog.activeMasonry) {
							$('#post-container').masonry('reload');
						}
					});

					page++;
					isLoading = false;

					if (!response.data.has_more) {
						reachedEnd = true;
						$loadingMessage.hide();
					}
				} else {
					// eslint-disable-next-line no-console
					console.log('Error:', response.data);
				}
			},
		});
	}
});
