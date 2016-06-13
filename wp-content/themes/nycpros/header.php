<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> 
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        
        <link rel="shortcut icon" type="image/x-icon" href="" />
		    
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/reset.css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		
        <!--[if lt IE 7]>
        
            <script type="text/javascript" src="<?php  bloginfo ( 'template_url' ); ?>/js/DD_belatedPNG.js"></script>
            <script type="text/javascript">DD_belatedPNG.fix('.trans');</script>
    
		<![endif]-->

        	<!--[if lte IE 7]>
        
        	<![endif]-->    

<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/style/superfish.css" /> 
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/style/fancybox.css" /> 
 
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.js"></script> 

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hoverIntent.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/supersubs.js"></script> 

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.bxSlider.min.js"></script> 


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/init.js"></script> 

<script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAA5Ui9QUEZfxCwNiPRSvjiLBRyHg-2gMkqDBhHgQ_4aBl648fWXRSUxq12XsljLFyD3EfonWfQGLO5BA"></script>


<script type="text/javascript"> 

		var J = jQuery.noConflict();
 
    J(document).ready(function(){ 
							      
							   

    }); 
	
</script>

		<?php if(is_search() || is_category() || is_tag() || is_archive()) : ?>
			<meta name="robots" content="noindex, nofollow" /> 
	    <?php else : ?>
			<meta name="robots" content="index, follow" />
		<?php endif; ?>
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	</head>
    
    <?php 
	if ( is_front_page ()) { $bodyclass="home"; } 
	if ( is_page ('2')) { $bodyclass="prosthodontics"; }
	if ( is_page ('6')) { $bodyclass="solutions"; }
	if ( is_page ('10')) { $bodyclass="biographies"; }
	if ( is_page ('13')) { $bodyclass="studio"; }
	if ( is_page ('15')) { $bodyclass="gallery"; }
	if ( is_page ('17') || is_home() || is_archive() || is_page('379')) { $bodyclass="news"; }
	if ( is_single() ) { $bodyclass="news single"; }
	if ( is_page ('19')) { $bodyclass="contact"; }
	if ( is_search ()) {$bodyclass="search"; }
	
	
	?>

	<body class="<?=$bodyclass?>">

		<div id="page">

			
<div id="header">
             
<a id="logo" href="/">NYCPROS</a>

</div> <!-- end header -->
    
<div id="nav" class="clearfix">
            		<?php # UNCOMMENT THE NEXT LINE IF you need a "Home" link and you're using the default WP install (where the home page is the blog page). ?>
            		<?php /* <li class="page_item<?php if (is_home()) echo " current_page_item"; ?>"><a href="<?php bloginfo( 'home' ); ?>">HOME</a></li> */ ?>                
                    <?php # wp_list_pages( 'title_li=&sort_column=menu_order' ); ?> 
					<?php wp_nav_menu( array(  
											 'menu' => 'Global Navigation',
											 'container'       => '', 
											 'menu_class' => 'sf-menu clearfix', 
											 'theme_location' => 'primary' 
											 ) ); ?>
<!--                                             
<form action="<?php bloginfo('wpurl'); ?>" id="searchform" method="post">
        
                <input type="text" id="s" name="s" class="field trans">
                <input type="image" src="<?php bloginfo('template_directory'); ?>/images/search_button.gif" name="submit" class="submit">
            
</form>-->

            <form action="http://www.nycpros.com/search" id="cse-search-box" class="clearfix">
            
                <input type="text" class="q field trans" name="q" id="q" value="<?php echo $_GET["q"]; ?>" />
                <input type="image" src="<?php bloginfo('template_directory'); ?>/images/search_button.gif" name="submit" class="submit">              
            </form>
            
</div><!-- end nav -->            
                                                         
        
 <div id="contentwrap" class="clearfix">
