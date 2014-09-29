/* globals $:false */

$(function () {
	var app = {
		init: function () {

		$("img.lazy").lazyload({
			
			threshold : 200,
			effect: "fadeIn"

		});

		$("#test").click(function(){

			$("#rapper").toggleClass("shove");

		});

		$(".extended").hide();
		//toggle the componenet with class msg_body
		$(".more").click(function(){
			$(this).next(".extended").fadeIn(200);
			$('.stats').css('display','block');
			$(this).hide();
		});
		$(".extended").click(function(){
			$(this).fadeOut(200);
			$('.stats').css('display','none');
			$(".more").show();
		});

      

		}
	};

	app.init();
});