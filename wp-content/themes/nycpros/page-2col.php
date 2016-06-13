<?php
/*
Template Name: 2 Column
*/
?>

<?php 

	get_header(); 

	$col_1_title = getCustomField('Col 1 Title');
	$col_1_body = getCustomField('Col 1 Body');
	$col_1_url = getCustomField('Col 1 Image URL');
	$col_1_img = get_post_meta($post->ID, 'Col 1 Image', true);
	$col_1_img_url = wp_get_attachment_image_src($col_1_img, 'full');
	
	$col_2_title = getCustomField('Col 2 Title');
	$col_2_body = getCustomField('Col 2 Body');
	$col_2_url = getCustomField('Col 2 Image URL');	
	$col_2_img = get_post_meta($post->ID, 'Col 2 Image', true);
	$col_2_img_url = wp_get_attachment_image_src($col_2_img, 'full');

?>

<!-- bio 1 -->

<div class="col1 clearfix">

<?php if ($col_1_img != "") { ?>

    <div class="col1_image">
    <?php if ($col_1_url != "" ) { ?><a href="<?php echo $col_1_url; ?>" class="iframe"><?php } ?>
    	<img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $col_1_img_url[0]; ?>&h=313&w=469" alt="<?php echo $col_1_title; ?>" width="469" height="313" />
    <?php if ($col_1_img_url != "" ) { ?></a><?php } ?>
    </div>
    
<? } ?>
    
    <div class="col1_content">
    <h2><?php echo $col_1_title; ?></h2>
    <div><?php echo $col_1_body; ?></div>
    
    
    <?php if (is_page('19'))  {  // if it is the contact page...run this shortcode to show the contact form
	
	echo do_shortcode('[gravityform id=1 name=ContactForm title=false description=false ajax=true]');
	
	} ?>
    
<?php /*?>        		
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				
<?php */?>
	
    </div>

</div>

<div class="col2 clearfix">

<?php if ($col_2_img != "") { ?>

    <div class="col2_image">
    <?php if ($col_2_url != "" ) { ?><a href="<?php echo $col_2_url; ?>" class="map_iframe"><?php } ?>
    	<img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $col_2_img_url[0]; ?>&h=313&w=469" alt="<?php echo $col_2_title; ?>" width="469" height="313" />
    <?php if ($col_2_img_url != "" ) { ?></a><?php } ?>
    </div>

<? } ?>
    
    <div class="col2_content">
    <h2><?php echo $col_2_title; ?></h2>    
    <div><?php echo $col_2_body; ?></div>
    </div>

</div>


<?php get_footer(); ?>