/* globals $:false */

$(function () {
	var app = {
		init: function () {

			this._initLazyLoad();
			this._initContentExpand();
			this._initCheckPushState();
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

		_initCheckPushState: function () {

			var $project = $('project-wrapper');

			function pushURL() {

				$project.each(function (index, elem) {

					if ($(elem).offset().top - document.body.scrollTop <= 0) {
						window.history.pushState({}, '', $(this).data('link'));
					}
				
				});

			}

			$(window).scroll(pushURL);
			pushURL();




		}
	};

	app.init();
});