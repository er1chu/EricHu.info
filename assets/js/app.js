/* globals $:false */

$(function () {
	var app = {
		init: function () {

			this._initContentExpand(); // Header content display
			this._initFluidVid(); // Responsive Vimeo iFrames
			this._initScrollMenu(); // When user scrolls up, menu appears
		},

		_initContentExpand: function () {

			var $stats = $('.stats'),
				$extended = $('.extended'),
				$more = $('.more');
			
			// Show extended content on click
			$("#more").click(function () {
				$extended.toggleClass('loaded')
				$stats.toggleClass('stats-loaded')
				$('#email').hide();
				$more.hide();
			});

			// Hide content on click again
			$extended.click(function () {
				$(this).removeClass('loaded')
				$stats.removeClass('stats-loaded')
				$("#more").show();
				$more.show();
			});


		},

		_initFluidVid: function () {
			fluidvids.init({
				selector: ['iframe', 'object'],
				players: ['player.vimeo.com']
			});
		},

		_initScrollMenu: function () {

			var headerOffset = $(window).height(),
				previousScroll = 0,
				$scrollMenu = $('.scroll-menu'),
				$menuHeight = $scrollMenu.height() + 20;


			$(window).scroll(function () {
				var currentScroll = $(this).scrollTop();
				
				// If user scrolls past the fold
				if (currentScroll > headerOffset) {

					// If user is scrolling up from previous position
					if (currentScroll < previousScroll ) {
						$scrollMenu.css('margin-top', '0');
					} else {
						$scrollMenu.css('margin-top', -$menuHeight + 'px');
					}
				
				// If user scrolls to top of page hide menu
				} else if (currentScroll === 0) {
					$scrollMenu.css('margin-top', -$menuHeight + 'px');
				}

				// Record scroll position
				previousScroll = currentScroll;

				// Clear when scrolling stops, hide menu
				// 3 seconds so user can have time to click on links
				// Will need to test for potential performance degredations
				clearTimeout( $.data( this, 'scrollCheck' ) );
    			$.data( this, "scrollCheck", setTimeout(function() {
    				$scrollMenu.css('margin-top', -$menuHeight + 'px');
    			}, 3000) );

			});

		}

		// _initCheckPushState: function () {

		// 	var $project = $('.project-wrapper');

		// 	function pushURL() {

		// 		$project.each(function (index, elem) {

		// 			if ($(elem).offset().top - document.body.scrollTop = 0) {
						
		// 				history.replaceState('#'+ $(this).data('link'), null, '#'+ $(this).data('link'));
		// 			}

		// 			if (document.bodyscrollTop < $project.first().offset.top) {

		// 				history.replaceState('#'+ $(this).data('link'), null, '');

		// 			}
				
		// 		});

		// 	}

		// 	var didScroll = false;

		// 	$(window).scroll(function () {
		// 	 	didScroll = true;
		// 	});

		// 	setInterval(function () {

		// 		if (didScroll) {
		// 			didScroll = false;
		// 			pushURL();
		// 		}

		// 	}, 250);

		// }
	};

	app.init();
});