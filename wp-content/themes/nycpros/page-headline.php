<?php
/*
Template Name: Headline Page
*/
?>

<?php 

	get_header(); 

	$headline_1_img = get_post_meta($post->ID, 'Headline 1 Image', true);
	$headline_1_img_url = wp_get_attachment_image_src($headline_1_img, 'full');
	$headline_1_title = getCustomField('Headline 1 Title');
	$headline_1_content = getCustomField('Headline 1 Content');
	
	$headline_2_img = get_post_meta($post->ID, 'Headline 2 Image', true);
	$headline_2_img_url = wp_get_attachment_image_src($headline_2_img, 'full');
	$headline_2_title = getCustomField('Headline 2 Title');
	$headline_2_content = getCustomField('Headline 2 Content');
	
	$headline_3_img = get_post_meta($post->ID, 'Headline 3 Image', true);
	$headline_3_img_url = wp_get_attachment_image_src($headline_3_img, 'full');
	$headline_3_title = getCustomField('Headline 3 Title');
	$headline_3_content = getCustomField('Headline 3 Content');
	
	$headline_4_img = get_post_meta($post->ID, 'Headline 4 Image', true);
	$headline_4_img_url = wp_get_attachment_image_src($headline_4_img, 'full');
	$headline_4_title = getCustomField('Headline 4 Title');
	$headline_4_content = getCustomField('Headline 4 Content');
	
	$headline_5_img = get_post_meta($post->ID, 'Headline 5 Image', true);
	$headline_5_img_url = wp_get_attachment_image_src($headline_5_img, 'full');
	$headline_5_title = getCustomField('Headline 5 Title');
	$headline_5_content = getCustomField('Headline 5 Content');
	
	$headline_6_img = get_post_meta($post->ID, 'Headline 6 Image', true);
	$headline_6_img_url = wp_get_attachment_image_src($headline_6_img, 'full');
	$headline_6_title = getCustomField('Headline 6 Title');
	$headline_6_content = getCustomField('Headline 6 Content');
	
	$headline_7_img = get_post_meta($post->ID, 'Headline 7 Image', true);
	$headline_7_img_url = wp_get_attachment_image_src($headline_7_img, 'full');
	$headline_7_title = getCustomField('Headline 7 Title');
	$headline_7_content = getCustomField('Headline 7 Content');
	
	$headline_8_img = get_post_meta($post->ID, 'Headline 8 Image', true);
	$headline_8_img_url = wp_get_attachment_image_src($headline_8_img, 'full');
	$headline_8_title = getCustomField('Headline 8 Title');
	$headline_8_content = getCustomField('Headline 8 Content');
	
	$disclaimer = getCustomField('Disclaimer');
	$subgal_category = getCustomField('Subgallery Category');

?>

<?php if ($headline_1_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_1_img_url[0]; ?>" alt="<?php echo $headline_1_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_1_title; ?></h2>
				<?php echo $headline_1_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>


<?php if ($headline_2_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_2_img_url[0]; ?>" alt="<?php echo $headline_2_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_2_title; ?></h2>
				<?php echo $headline_2_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>


<?php if ($headline_3_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_3_img_url[0]; ?>" alt="<?php echo $headline_3_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_3_title; ?></h2>
				<?php echo $headline_3_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>

<?php if ($headline_4_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_4_img_url[0]; ?>" alt="<?php echo $headline_4_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_4_title; ?></h2>
				<?php echo $headline_4_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>

<?php if ($headline_5_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_5_img_url[0]; ?>" alt="<?php echo $headline_5_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_5_title; ?></h2>
				<?php echo $headline_5_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>

<?php if ($headline_6_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_6_img_url[0]; ?>" alt="<?php echo $headline_6_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_6_title; ?></h2>
				<?php echo $headline_6_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>

<?php if ($headline_7_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_7_img_url[0]; ?>" alt="<?php echo $headline_7_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_7_title; ?></h2>
				<?php echo $headline_7_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>

<?php if ($headline_8_img != "") { ?>
<div class="headlinecontent clearfix">
    
    	<div class="headlineleft"><img src="<?php echo $headline_8_img_url[0]; ?>" alt="<?php echo $headline_8_title; ?>" width="600" height="400" /></div><!-- end headlineleft -->
        <div class="headlineright">
        		
                <h2><?php echo $headline_8_title; ?></h2>
				<?php echo $headline_8_content; ?>
        
        </div><!-- end headlineright -->
</div><!-- end headlinecontent  -->
<?php } ?>

<?php if ($subgal_category !="") { ?>

 <?php ########### SUBGALLERY LOOP ############# ?>
    
    <?php
	$args=array(
  'subgallery_category' => $subgal_category,
  'post_type' => 'subgallery',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) { ?>

<?php //print_r($args); ?>

    
<?php   
while ($my_query->have_posts()) : $my_query->the_post(); 

	$subgal_content = getCustomField('Subgallery Content');

	$subgal_1_title = getCustomField('Subgallery Image 1 Title');
	$subgal_1_img = get_post_meta($post->ID, 'Subgallery Image 1', true);
	$subgal_1_img_url = wp_get_attachment_image_src($subgal_1_img, 'full');
	
	$subgal_2_title = getCustomField('Subgallery Image 2 Title');
	$subgal_2_img = get_post_meta($post->ID, 'Subgallery Image 2', true);
	$subgal_2_img_url = wp_get_attachment_image_src($subgal_2_img, 'full');

	$subgal_3_title = getCustomField('Subgallery Image 3 Title');
	$subgal_3_img = get_post_meta($post->ID, 'Subgallery Image 3', true);
	$subgal_3_img_url = wp_get_attachment_image_src($subgal_3_img, 'full');
	
	$subgal_4_title = getCustomField('Subgallery Image 4 Title');
	$subgal_4_img = get_post_meta($post->ID, 'Subgallery Image 4', true);
	$subgal_4_img_url = wp_get_attachment_image_src($subgal_4_img, 'full');
	
	$subgal_5_title = getCustomField('Subgallery Image 5 Title');
	$subgal_5_img = get_post_meta($post->ID, 'Subgallery Image 5', true);
	$subgal_5_img_url = wp_get_attachment_image_src($subgal_5_img, 'full');
	
	$subgal_6_title = getCustomField('Subgallery Image 6 Title');
	$subgal_6_img = get_post_meta($post->ID, 'Subgallery Image 6', true);
	$subgal_6_img_url = wp_get_attachment_image_src($subgal_6_img, 'full');
	
	$subgal_7_title = getCustomField('Subgallery Image 7 Title');
	$subgal_7_img = get_post_meta($post->ID, 'Subgallery Image 7', true);
	$subgal_7_img_url = wp_get_attachment_image_src($subgal_7_img, 'full');
	
	$subgal_8_title = getCustomField('Subgallery Image 8 Title');
	$subgal_8_img = get_post_meta($post->ID, 'Subgallery Image 8', true);
	$subgal_8_img_url = wp_get_attachment_image_src($subgal_8_img, 'full');
	
	$subgal_9_title = getCustomField('Subgallery Image 9 Title');
	$subgal_9_img = get_post_meta($post->ID, 'Subgallery Image 9', true);
	$subgal_9_img_url = wp_get_attachment_image_src($subgal_9_img, 'full');
	
	$subgal_10_title = getCustomField('Subgallery Image 10 Title');
	$subgal_10_img = get_post_meta($post->ID, 'Subgallery Image 10', true);
	$subgal_10_img_url = wp_get_attachment_image_src($subgal_10_img, 'full');
	
	$subgal_11_title = getCustomField('Subgallery Image 11 Title');
	$subgal_11_img = get_post_meta($post->ID, 'Subgallery Image 11', true);
	$subgal_11_img_url = wp_get_attachment_image_src($subgal_11_img, 'full');
	
	$subgal_12_title = getCustomField('Subgallery Image 12 Title');
	$subgal_12_img = get_post_meta($post->ID, 'Subgallery Image 12', true);
	$subgal_12_img_url = wp_get_attachment_image_src($subgal_12_img, 'full');


?>

<?php if ($subgal_1_img != "" && $subgal_2_img != "" && $subgal_3_img != ""  ) { // checking to see if the first 3 images are blank, if they aren't....run the JS, if any of them are blank, no JS?>

 <script type="text/javascript">

J(document).ready(function(){ 
		J('#subgal-<?php echo $post->ID; ?> ul').bxSlider({
			displaySlideQty: 2,
			moveSlideQty: 2
		});
});// end ready		
</script>

<?php } ?>

   <div id="subgal-<?php echo $post->ID; ?>" class="subgallery clearfix">
    
    <ul> 
  
<?php if ($subgal_1_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_1_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_1_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_1_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>    

<?php if ($subgal_2_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_2_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_2_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_2_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>   

<?php if ($subgal_3_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_3_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_3_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_3_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>   

<?php if ($subgal_4_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_4_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_4_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_4_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?> 

<?php if ($subgal_5_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_5_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_5_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_5_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>    

<?php if ($subgal_6_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_6_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_6_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_6_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>   

<?php if ($subgal_7_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_7_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_7_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_7_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?> 

<?php if ($subgal_8_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_8_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_8_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_8_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>    

<?php if ($subgal_9_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_9_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_9_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_9_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>   

<?php if ($subgal_10_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_10_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_10_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_10_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>  

<?php if ($subgal_11_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_11_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_11_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_11_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>  

<?php if ($subgal_12_img != "") { ?>

    <li>
    <a href="<?php echo $subgal_12_img_url[0]; ?>">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $subgal_12_img_url[0]; ?>&h=195&w=293" alt="<?php echo $subgal_12_title; ?> Image" width="293" height="195" />
    </a>
    </li>
    
<?php } ?>   

  </ul>
    
    <div class="subgallery_content">
    <h3><?php the_title(); ?></h3>
    <?php echo $subgal_content; ?>
    </div>

</div><!-- end subgallery -->


    <?php endwhile; } // end if have posts?>

<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

<?php } // end if has subcategory ?>

    <?php if ($disclaimer != "") { ?>
    
        <div id="disclaimer">
        
        	<?php echo $disclaimer; ?>
        
        </div>
        
    <?php } ?>


<?php get_footer(); ?>