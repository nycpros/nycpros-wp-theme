jQuery(document).ready(function($) {

	/* ======= SLICK BANNER SLIDER ======= */

	var bs = $('#banner-slider');

	function bs_text() {

		// set the viewport using the function in scripts.js
		viewport = updateViewportDimensions();

		bs_images = bs.find('.slick-track');
		bs_btext  = bs.find('.banner-text-container');
		bs_credit = bs.find('.image-credit');

		if (viewport.width < 481) {
			bs_btext.animate({
				},300, function(){

				$(this).html('').append(bs_images.find('.slick-active .banner-text').html());

				var bs_btext_height = $('.banner-text-container header').innerHeight();
				bs_btext.animate({
					height:bs_btext_height,
				},300);
			});
		}

		bs_credit.animate({
			},300, function(){

			$(this).html('').append(bs_images.find('.slick-active .credit').html());

		});

	}

	// onresize reset style values for active banner text
	// $(window).resizeComplete(function(){ bs_text(); },300);
	$(window).resize(function () {
		waitForFinalEvent( function() {
			bs_text();
		}, timeToWaitForLast, "slick-resizer");
	});

	$('.banner-slider')
		.on('init', function(event, slick){
			// let's do this after we init the banner slider
			setTimeout( function() {  bs_text(); }, 300);
			$('body').removeClass('page-loading');
			$('.banner-text').removeAttr('style');
			// console.log('slider was initialized');
		})
		.on('beforeChange', function(event, slick, currentSlide, nextSlide){
			// then let's do this before changing slides
			if (viewport.width < 481) {
			$('.banner-text-container header').animate({ opacity:0 }, 200);
			} else {
			$('.banner-text header').animate({ opacity:0 }, 200);
			}
			$('.image-credit').animate({ opacity:0 }, 200);
			// console.log('before change');
		})
		.on('afterChange', function(event, slick, currentSlide, nextSlide){
			// finally let's do this after changing slides
			bs_text();
			if (viewport.width < 481) {
			$('.banner-text-container header').animate({ opacity:1 }, 200);
			} else {
			$('.banner-text header').animate({ opacity:1 }, 200);
			}
			$('.image-credit').animate({ opacity:1 }, 200);
			// console.log('after change');
		})
		.slick({
			autoplay: true,
			autoplaySpeed: 5000,
			dots: true,
		});


	/* ======= SLICK GALLERY  ======= */
	
	$('.subgallery-block').slick({
		
		  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 2
		
	  });
		



}); /* end of as page load scripts */
