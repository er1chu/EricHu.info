
// = require vendor/debounce.js
// = require vendor/widow.js
// = require vendor/lazyload.js

$(function () {
	var app = {
		init: function () {

			this._initScroll();
			this._initTameWidows();
			this._initClickCarousel2();
			this._initTop();
			this._initBack();

		},

		_initScroll: function () {

			var headerOffset = $(window).height(),
				previousScroll = 0,
				$scrollMenu = $('.scroll-badge'),
				$menuHeight = $scrollMenu.height() + 20,
				menuOn = {'opacity':'1', 'transform':'translateY(0)'},
				menuOff = {'opacity':'0', 'transform':'translateY(-100%)'},
				$siteHeaderHeight = $('.site-header').height(),
				$project = $('.project'),
				scrollExecuted = false;


			function checkProjects () {
				$project.each(function (index, elem) {
					if ($(elem).offset().top - document.body.scrollTop <= 100 && $(elem).offset().top - document.body.scrollTop > 0) {
						window.history.replaceState('', '', '/#'+$(elem).attr('id'));
						console.log($(elem).attr('id'));
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
				    } else if (currentScroll > previousScroll) {
				      $scrollMenu.css(menuOff);
				    }
				    // If user scrolls to top of page hide menu
				    } if (currentScroll < $siteHeaderHeight) {
				      $scrollMenu.css(menuOff);
				      window.history.replaceState('', "", "/");
				      localStorage.clear();
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

				// function menuContext () {
				// 	// check if executed previously
				// 	if (!scrollExecuted) {
				// 		if (window.location.hash) {
				// 			 $('.scroll-badge').css({'opacity':'1', 'transform':'translateY(0)'});
				// 		}
				// 		scrollExecuted = true;
				// 	}
				// }

				// $(window).on('load',function () {
				// 	menuContext();
				// });

			
				// $(window).scroll($.throttle(250, function () {
				// 	checkProjects();}));

				$(window).scroll(function () {
					scrollBadge();
				});

				// $(window).resize(function () {
				// 	checkProjects();
				// });

		},

		_initTameWidows: function () {
			wt.fix({
				elements: '.caption',
				method: 'nbsp',
				event: 'resize'
			});
			wt.fix({
				elements: '.about-intro p',
				method: 'nbsp',
				event: 'resize'
			});
			wt.fix({
				elements: '.about-columns li',
				method: 'nbsp',
				event: 'resize'
			});
		},

		_initClickCarousel2: function () {


			// Project on Click

			$('.project-content img').on('click', function () {

				$('.gallery').addClass('seen');
				// Identify Current Project
				var thisProject = $(this);
				
				//Identify next project
				var nextProject = thisProject.closest('.project-content').parent().next().find('img');
				
				// Identify previous project
				var prevProject = thisProject.closest('.project-content').parent().prev().find('img');
				
				// Display Image into Gallery
				$('#galleryimg').attr('src',thisProject.attr('src'));

				// Next Button
				$('.gallery-next').on('click', function (){
					nextProject.trigger('click');

				});

				// Prev Button
				$('.gallery-prev').on('click', function (){
					prevProject.trigger('click');
				});

				$('.gallery-hide').on('click', function (){
					$('.gallery').removeClass('seen');
				});

				// Key Presses
				$("body").keydown(function(e){
				    // left arrow
				    if ((e.keyCode || e.which) == 37)
				    {   
				        prevProject.trigger('click');
				    }
				    // right arrow
				    if ((e.keyCode || e.which) == 39)
				    {
				        nextProject.trigger('click');
				    }
				});

			});

		},

		// _initClickCarousel: function () {
		// 	// Project on click
		// 	$('.project').on('click', function(){
		// 		// Identify next project
		// 		var ele = $(this).next('.project');
		// 		// Animate scroll to next project

		// 		$('html, body').animate({
		// 			scrollTop: $(ele).offset().top
		// 		}, 300);
		// 		return false;
				
		// 	});
		// },

		_initTop: function () {
			$('.top-of-page').click(function(){
				$('html, body').animate({
					scrollTop: 0},500);
			});
		},

		_initBack: function () {
			if (localStorage.getItem('position') != null) {
				$('#back-link').attr('href','/#'+localStorage.getItem('position'));
			}
		}

	};

	app.init();
});