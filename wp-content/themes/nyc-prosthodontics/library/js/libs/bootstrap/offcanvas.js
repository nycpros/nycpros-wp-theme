(function($) {

    'use strict';

    // these need per-project adjustments (or maybe a calculation rework);
    var widthLarge = '1024';
    var widthMedium = '768';

    var headerHeightTablet = 130;
    var headerHeightPhone = 130;

    // JS-based dropdown hover solution (vs. current CSS-based) //

    // function addHover() {

    //     // fire bootstrap collapse on hover
    //     $('ul.nav li.dropdown').hover(function() {
    //         $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    //     }, function() {
    //         $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    //     });
    //     // make parent level anchor clickable
    //     $('ul.nav li.dropdown > a').click(function() {
    //         location.href = this.href;
    //     });

    // } // end function

    // function removeHover() {

    //     $('ul.nav li.dropdown').off('hover').find('ul.dropdown-menu').removeAttr('style');

    // }

    // if (viewport.width >= widthLarge) {
    //     addHover();
    // }

    // Let's add some tappy.js support to remove the 300ms delay on click
	$(".touch .navbar-toggle").bind("tap", function(e) {
		$('#navbar-oc').collapse('toggle');
		$(".touch #inner-container").bind("tap", function(e) {
			$('#navbar-oc').collapse('hide');
			$(".touch #inner-container").unbind("tap");
			// console.log ('unbind it');
		});
	});

    function offCanvas() {

        var offCanvasHeight = $("#inner-nav").height();
		// set the viewport using the function in scripts.js
		viewport = updateViewportDimensions();
		
		$("#inner-nav").removeAttr('style');

        // if the offcanvas menu is small, it will be shorter than the viewport....need to stretch it out height-wise (subtract 1px for top border)
        if (offCanvasHeight < viewport.height ) {
            $("#inner-nav").height(viewport.height);
            offCanvasHeight = viewport.height;
        }

        // if we're below widthLarge fire this off
        if (viewport.width < widthLarge) {
            $('#inner-container').css('height', offCanvasHeight - headerHeightTablet);
        }
        // if we're below widthMedium fire this off
        if (viewport.width < widthMedium) {
            $('#inner-container').css('height', offCanvasHeight - headerHeightPhone);
        }

        console.log(viewport.width)

    }

    // Toggle classes in body for syncing sliding animation with other elements
    $('#navbar-oc')
        .on('show.bs.collapse', function(e) {
            $('body').addClass('menu-slider in');
            $('.navbar-toggle').addClass('open');
            // $('#navbar-oc .dropdown-toggle').removeAttr('data-toggle','dropdown');
        })
        .on('shown.bs.collapse', function(e) {
            offCanvas();
        })
        .on('hide.bs.collapse', function(e) {
            $('body').removeClass('menu-slider in');
            $('.navbar-toggle').removeClass('open');
            $('#inner-container').css('height', 'auto');
            // $('#navbar-oc .dropdown-toggle').attr('data-toggle','dropdown');
        });
        // .on('hidden.bs.collapse', function(e) {
        //     $('body').removeClass('in');
        // });

    // undeclared variables defined in scripts.js
    $(window).resize(function() {
        waitForFinalEvent(function() {

        // reset the viewport width after resize using the function in scripts.js
        viewport = updateViewportDimensions();

        $("#inner-nav").removeAttr('style');

        var offCanvasHeight = $("#inner-nav").height();

        // if the offcanvas menu is small, it will be shorter than the viewport....need to stretch it out height-wise (subtract 1px for top border)
        if (offCanvasHeight < viewport.height ) {
            $("#inner-nav").height(viewport.height);
            offCanvasHeight = viewport.height;
        }

        // if we're above or equal to widthLarge fire this off
        if (viewport.width >= widthLarge) {
            $('#inner-container').css('height', 'auto');
        }

        // if we're below widthLarge fire this off
        if (viewport.width < widthLarge) {
            if ( $('body').hasClass('in') ) {
                $('#inner-container').css('height', offCanvasHeight - headerHeightTablet);
            }
        }

         // if we're above or equal to widthMedium fire this off
        if (viewport.width >= widthMedium) {
            $("#inner-nav").removeAttr('style');
        }

        // if we're below widthMedium fire this off
        if (viewport.width < widthMedium) {
            if ( $('body').hasClass('in') ) {
                $('#inner-container').css('height', offCanvasHeight - headerHeightPhone);
            }
        }

        }, timeToWaitForLast, "offcanvas-resizer");
    });

    // in case we ever want to toggle nav parent elements in off canvas //

    // // undeclared variables defined in scripts.js
    // $(window).resize(function() {
    //     waitForFinalEvent(function() {
    // 		// reset the viewport width after resize
    //     	var viewport = updateViewportDimensions();
    //         // if we're above or equal to widthMedium fire this off
    //         if (viewport.width >= widthLarge) {
    //             // enable dropdowns
    //             $('#navbar-oc .dropdown-toggle').attr('data-toggle','dropdown');
    //             //console.log('window sized to widthLarge width or more.');
    //         	addHover();
    //         } else {
    //             // disable dropdowns
    //             $('#navbar-oc .dropdown-toggle').removeAttr('data-toggle','dropdown');
    //             //console.log('window sized to less than widthLarge.');
    //             removeHover();
    //         }
    //     }, timeToWaitForLast, "dropdown-toggle");
    // });

})(jQuery);
