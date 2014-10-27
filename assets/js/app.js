/* globals $:false */

$(function () {
	var app = {
		init: function () {

			this._initLazyLoad();
			this._initContentExpand();
			this._initVideoResize();
			// this._initCheckPushState();
		},

		_initLazyLoad: function () {

			$("img.lazy").lazyload({
			
				threshold : 300,
				effect: "fadeIn"

			});

		},

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

		_initVideoResize: function () {

			// Find all YouTube videos
			var $allVideos = $("iframe[src^='//player.vimeo.com]"),

			// The element that is fluid width
			    $fluidEl = $("body");

			// Figure out and save aspect ratio for each video
			$allVideos.each(function() {

			  $(this)
			    .data('aspectRatio', this.height / this.width)

			    // and remove the hard coded width/height
			    .removeAttr('height')
			    .removeAttr('width');

			});

			// When the window is resized
			$(window).resize(function() {

			  var newWidth = $fluidEl.width();

			  // Resize all videos according to their own aspect ratio
			  $allVideos.each(function() {

			    var $el = $(this);
			    $el
			      .width(newWidth)
			      .height(newWidth * $el.data('aspectRatio'));

			  });

			// Kick off one resize to fix all videos on page load
			}).resize();
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