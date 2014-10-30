/* globals $:false */

$(function () {
	var app = {
		init: function () {

			// this._initLazyLoad();
			this._initContentExpand();
			this._initFluidVid();
			// this._initCheckPushState();
		},

		// _initLazyLoad: function () {

		// 	$("img.lazy").lazyload({
			
		// 		threshold : 300,
		// 		effect: "fadeIn"

		// 	});

		// },

		_initContentExpand: function () {

			var $stats = $('.stats'),
				$extended = $('.extended'),
				$more = $('.more');

			$("#more").click(function () {
				$extended.toggleClass('loaded')
				$stats.toggleClass('stats-loaded')
				$('#email').hide();
				$more.hide();
			});

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