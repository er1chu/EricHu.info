/* globals $:false */

$(function () {
	var app = {
		init: function () {

			this._initLazyLoad();
			this._initContentExpand();

      

		},

		_initLazyLoad: function () {

			$("img.lazy").lazyload({
			
			threshold : 200,
			effect: "fadeIn"

			});

		},

		_initContentExpand: function() {

			$("#more").click(function(){
				$(".extended").toggleClass('loaded')
				$('.stats').toggleClass('stats-loaded')
				$('#email').hide();
				$('.more').hide();
			});

			$(".extended").click(function(){
				$(this).removeClass('loaded')
				$('.stats').removeClass('stats-loaded')
				$("#more").show();
				$('.more').show();
			});


		}
	};

	app.init();
});