<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>

		<?php // icons & favicons (http://realfavicongenerator.net/) ?>
	    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-57x57.png">
	    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-60x60.png">
	    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-72x72.png">
	    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-76x76.png">
	    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-114x114.png">
	    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-120x120.png">
	    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-144x144.png">
	    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-152x152.png">
	    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/library/favicons/apple-touch-icon-180x180.png">
	    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/favicons/favicon-32x32.png" sizes="32x32">
	    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/favicons/android-chrome-192x192.png" sizes="192x192">
	    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/favicons/favicon-96x96.png" sizes="96x96">
	    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/favicons/favicon-16x16.png" sizes="16x16">
	    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/library/favicons/manifest.json">
	    <meta name="msapplication-TileColor" content="#2b5797">
	    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/favicons/mstile-144x144.png">
	    <meta name="theme-color" content="#ffffff">

		<!--[if IE]>
			<link rel="shortcut icon" href="favicon.ico">
		<![endif]-->

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php /*
		<?php if (is_page_template('search-results.php')) { // if we're on the search results page, load the CSE script  ?>

		<script>

		// Custom CSE
		(function() {
		    var cx = 'customvaluegoeshere';
		    var gcse = document.createElement('script');
		    gcse.type = 'text/javascript';
		    gcse.async = true;
		    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		        '//www.google.com/cse/cse.js?cx=' + cx;
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(gcse, s);
		})();

		</script>

		<?php  } // end search results page check ?>
		*/ ?>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap cf">
					<?php get_template_part('partials/nav','bootstrap-offcanvas'); ?>
				</div>

			</header>

			<div id="inner-container">

