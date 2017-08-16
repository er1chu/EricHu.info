//= require vendor/lazyload.js

$(function () {
	var app = {
		init: function () {

			this._initloadFade();
			this._initScrollMenu(); 

		},

		_initloadFade: function () {
			$(window).on('load',function(){
			  $('body').addClass('loaded');
			});
		},

		_initScrollMenu: function () {

			var headerOffset = $(window).height(),
			previousScroll = 0,
			$scrollMenu = $('.scroll-badge'),
			$menuHeight = $scrollMenu.height() + 20;
			var menuOn = {'opacity':'1', 'transform':'translateY(0)'};
			var menuOff = {'opacity':'0', 'transform':'translateY(-100%)'}
			$siteHeaderHeight = $('.site-header').height();
			
			$( window ).scroll(function() {
			  var currentScroll = $(this).scrollTop();
			  if (currentScroll > headerOffset) {

			      // If user is scrolling up from previous position
			      if (currentScroll < previousScroll ) {
			        $scrollMenu.css(menuOn);
			      } else {
			        $scrollMenu.css(menuOff);
			      }
			     // If user scrolls to top of page hide menu
			      } else if (currentScroll < $siteHeaderHeight) {
			        $scrollMenu.css(menuOff);
			      }     
			      
			      // Record scroll position
			      previousScroll = currentScroll;
			      // Clear when scrolling stops, hide menu
			      // 3 seconds so user can have time to click on links
			      // Will need to test for potential performance degredations
			    clearTimeout( $.data( this, 'scrollCheck' ) );
			      $.data( this, "scrollCheck", setTimeout(function() {
			        $scrollMenu.css(menuOff);
			      }, 4000) );
			  });

		}
	};

	app.init();
});