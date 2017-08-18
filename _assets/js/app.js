//= require vendor/lazyload.js
// = require vendor/debounce.js

$(function () {
	var app = {
		init: function () {

			this._initScroll(); 
			this._initClickCarousel();
			this._initTop();

		},

		_initScroll: function () {

			var headerOffset = $(window).height(),
				previousScroll = 0,
				$scrollMenu = $('.scroll-badge'),
				$menuHeight = $scrollMenu.height() + 20,
				menuOn = {'opacity':'1', 'transform':'translateY(0)'},
				menuOff = {'opacity':'0', 'transform':'translateY(-100%)'},
				$siteHeaderHeight = $('.site-header').height(),
				$project = $('.project');


			function checkProjects () {
				$project.each(function (index, elem) {
					if ($(elem).offset().top - document.body.scrollTop <= 100 ) {
						window.history.pushState('', "", "/#"+$(elem).attr('id'));
						localStorage.setItem('position', $(elem).attr('id'));
						$('#back-link').attr('href','/#'+$(elem).attr('id'));

					}
				});
			}

			function scrollBadge () {
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
				}
			
				$( window ).scroll($.debounce(250, function () {
					checkProjects();}));

				$(window).scroll(function(){
					scrollBadge();
				});

				$(window).resize(function () {
					checkProjects();
				});

		},

		_initClickCarousel: function () {
			// Project on click
			$('.project').on('click', function(){
				// Identify next project
				var ele = $(this).next('.project');
				// Animate scroll to next project

				$('html, body').animate({
					scrollTop: $(ele).offset().top
				}, 300);
				return false;
				
			});
		},

		_initTop: function () {
			$('.top-of-page').click(function(){
				$('html, body').animate({
					scrollTop: 0},500);
			});
		}
	};

	app.init();
});