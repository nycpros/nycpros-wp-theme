<?php
/*
Template Name: Bios
*/
?>

<?php 

	get_header(); 

	$bio_text_1 = getCustomField('Bio Text 1');
	$bio_image1_img = get_post_meta($post->ID, 'Bio Image 1', true);
	$bio_image1_url = wp_get_attachment_image_src($bio_image1_img, 'full');
	
	$bio_text_2 = getCustomField('Bio Text 2');
	$bio_image2_img = get_post_meta($post->ID, 'Bio Image 2', true);
	$bio_image2_url = wp_get_attachment_image_src($bio_image2_img, 'full');
	
	$bio_text_3 = getCustomField('Bio Text 3');
	$bio_image3_img = get_post_meta($post->ID, 'Bio Image 3', true);
	$bio_image3_url = wp_get_attachment_image_src($bio_image3_img, 'full');

?>

<?php if ($bio_image1_img != "") { ?>

<!-- bio 1 -->

<div class="biocontent clearfix">

    <div class="bioleft">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $bio_image1_url[0]; ?>&w=300" alt="Bio Image 1" width="300" />
    </div>
    
    <div class="bioright">
    <?php echo $bio_text_1; ?>
    </div>

</div>

<?php } ?>

<?php if ($bio_image2_img != "") { ?>

<!-- bio 2 -->

<div class="biocontent clearfix">

    <div class="bioleft">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $bio_image2_url[0]; ?>&w=300" alt="Bio Image 2" width="300" />
    </div>
    
    <div class="bioright">
    <?php echo $bio_text_2; ?>
    </div>

</div>

<?php } ?>

<?php if ($bio_image3_img != "") { ?>

<!-- bio 3 -->

<div class="biocontent clearfix">

    <div class="bioleft">
    <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php echo $bio_image3_url[0]; ?>&w=300" alt="Bio Image 3" />
    </div>
    
    <div class="bioright">
    <?php echo $bio_text_3; ?>
    </div>

</div>

<?php } ?>

<?php get_footer(); ?>