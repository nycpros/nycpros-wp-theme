<?php
/*
Template Name: Home
*/
?>

<?php 

	get_header(); 

	$video_embed = getCustomField('Video Embed');
	$home_image_img = get_post_meta($post->ID, 'Home Image', true);
	$home_image_url = wp_get_attachment_image_src($home_image_img, 'medium');

?>

<div id="contentfull">

<?php echo $video_embed; ?>

	<div id="homecontent" class="clearfix">
    
    	<div id="homeleft">
        
        <img src="<?php echo $home_image_url[0]; ?>" alt="NYC Prosthodontics" width="600" height="400" />
        
        </div><!-- end homeleft -->
        
        <div id="homeright">
        
        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
				<?php the_content(); ?>

				<?php endwhile; endif; ?>
        
        </div><!-- end homeright -->
    
    </div><!-- end homewrap -->

</div>

<?php # get_sidebar(); ?>

<?php get_footer(); ?>