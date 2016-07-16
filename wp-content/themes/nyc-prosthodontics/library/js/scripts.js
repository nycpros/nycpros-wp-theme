/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/

/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;

/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// reset the viewport width after resize
 *     	var viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * DROPDOWN SELECT MODIFIED BY METRONIC
 * http://silviomoreto.github.io/bootstrap-select/
*/
// var ComponentsDropdowns = function () {

// 	var handleBootstrapSelect = function() {
// 		$('.bs-select').selectpicker({
// 			iconBase: 'fa',
// 			tickIcon: 'fa-check',
// 			dropupAuto: false,
// 		});
// 	}

// 	return {
// 		//main function to initiate the module
// 		init: function () {
// 			handleBootstrapSelect();
// 		}
// 	};

// }();

/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

	/* ======= INIT DROPDOWNS BY METRONIC ======= */
	// ComponentsDropdowns.init();

	/* ======= AJAX LOADING ======= */
	// $(document).ajaxStart(function(){
	// });
	// $(document).ajaxComplete(function(){
	// 	$('img', this).load(function() {
	// 	    $(".lazy-ajax").addClass("nope");
	// 	});
	// });

	/* ======= TOGGLE CAPTAIONS ======= */
	// $("#featured-image .caption-toggle").click(function(e){
	// 	e.preventDefault();
	// 	$('#featured-image').toggleClass('hidden-caption');
	// 	// $(this).text(function(i, text){
	// 	// 	return text === "SHOW CAPTION" ? "HIDE CAPTION" : "SHOW CAPTION";
	// 	// });
	// });

	// $("#banner-slider .caption-toggle").click(function(e){
	// 	e.preventDefault();
	// 	$('#banner-slider').toggleClass('hidden-caption');
	// });

	/* ======= MAGNIFIC POPUP ======= */
	// // Instigate Popups (GENERAL)
	// $('.open-popup-link').magnificPopup({
	//   type:'inline',
	//   midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
	//   callbacks: {
	// 	  open: function() {
	// 	    $('body').addClass('popup-open');
	// 	    //console.log('Popup Open');
	// 	  },
	// 	  close: function() {
	// 	  	$('body').removeClass('popup-open');
	// 	    //console.log('Popup Closed');
	// 	  }
	//   }
	// });

	/* ======= DETERMINE PAGE IN JS ======= */
	// setting some page vars for jQuery	
	//if( typeof is_menu === "undefined" ) var is_menu = $('body').hasClass('page-template-page-menu'); // menu page?

	/* ======= RETURN TO TOP ======= */
	var offset = 600;
	var duration = 500;
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('#return-to-top').fadeIn(duration);
			// if using slick pause it
			// $('.banner-slider').slick('slickPause');
		} else {
			jQuery('#return-to-top').fadeOut(duration);
			// if using slick start it
			// $('.banner-slider').slick('slickPlay');
		}
	});

	jQuery('#return-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({
			scrollTop: 0
		}, duration);
		return false;
	});

	/* ======= WINDOW LOAD  ======= */
	// LOAD FUNCTION THAT WAITS UNTIL ALL ELEMENTS ARE LOADED, NOT JUST THE DOM -- HERE FOR REFERENCE
	//$( window ).load(function() { });	

}); /* end of as page load scripts */
