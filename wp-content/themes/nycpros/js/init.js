var J = jQuery.noConflict();

J(document).ready(function(){ 
							   
							   			
// apple check
			
if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod') {
	//alert('apple');

}

// handheld check

if ((screen.width<=960) && (screen.height<=480)) {
//alert('Small screen');

}

if ((screen.height<=960) && (screen.width<=480)) {
//alert('Small screen');

}
							      						   
        J(".sf-menu").supersubs({ 
            minWidth:    13,  
            maxWidth:    27,   
            extraWidth:  2   
                               
        }).superfish({
			autoArrows:    true, 
			dropShadows:   false
		});  
			 
	// add icons
					 
					 J("a[href$='.pdf']").addClass("pdf");
					 J("a[href$='.doc']").addClass("doc");
					 J("a[href$='.ppt']").addClass("ppt");
					 
		
		// FANCYBOX
		
		
		J.fn.getTitle = function() {
			var arr = J("a.fancybox");
			J.each(arr, function() {
				var title = J(this).children("img").attr("alt");
				if (title =="") {title = J(this).next().children("p").html()}; // create title from PWA + PHP captions
				if (title == "") {title = J(this).attr("title")}; // if nothing else, set title to that of the page
				J(this).attr('title',title);
			})
		}

		// Supported file extensions
		var thumbnails = 'a:has(img)[href$=".bmp"],a:has(img)[href$=".gif"],a:has(img)[href$=".jpg"],a:has(img)[href$=".jpeg"],a:has(img)[href$=".png"],a:has(img)[href$=".BMP"],a:has(img)[href$=".GIF"],a:has(img)[href$=".JPG"],a:has(img)[href$=".JPEG"],a:has(img)[href$=".PNG"]';

	
		J(thumbnails).addClass("fancybox").attr("rel","fancybox").getTitle();
		
		


		//J(thumbnails).addClass("fancybox").attr("rel","fancybox");

			J("a.fancybox").fancybox({
			'imageScale': true,
			'padding': 10,
			'zoomOpacity': true,
			'zoomSpeedIn': 500,
			'zoomSpeedOut': 500,
			'zoomSpeedChange': 300,
			'overlayShow': true,
			'overlayColor': "#666666",
			'overlayOpacity': 0.3,
			'enableEscapeButton': true,
			'showCloseButton': true,
			'hideOnOverlayClick': true,
			'hideOnContentClick': false,
			'frameWidth':  560,
			'frameHeight':  340,
			'callbackOnStart': null,
			'callbackOnShow': null,
			'callbackOnClose': null,
			'centerOnScroll': true,
			'title'			: this.title,
			'titlePosition'	:	'over'


		});
			
			
					J("a.map_iframe").fancybox({
		'hideOnContentClick': false,
		'width'				: 660,
		'height'			: '75%',
        'autoScale'     	: false,
        'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
		'titleShow'				: false
		});

		
		//sliders
		
			J('#gallery_main ul').bxSlider({
				infiniteLoop: true
			});
			
	
			// APPLY LAST STYLE
			
			//J('.subgallery:last').addClass('last');
			J('.biocontent:last').addClass('last');
			J('body.studio .headlinecontent:last').addClass('last');
			J('#sidebar .post:last').addClass('last');
			J('#content .post:last').addClass('last');				  
			
		

		// XHTML TARGET FIX
J('a.newwin').attr('target', '_blank');

}); // end doc ready
	



