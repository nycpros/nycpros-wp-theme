<?php
/*
Template Name: Gallery Page
*/
?>

<?php get_header(); ?>

<div id="gallery_main">

<?php ########### GALLERYITEM LOOP ############# ?>
    
<?php
$args=array(
  'post_type' => 'galleryitem',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) { ?>


<ul>

	<?php //print_r($args); ?>

    
	<?php   
	while ($my_query->have_posts()) : $my_query->the_post(); 

	$galitem_img = get_post_meta($post->ID, 'Galleryitem Image', true);
	$galitem_img_url = wp_get_attachment_image_src($galitem_img, 'full');
	$galitem_text = getCustomField('Galleryitem Text');

	?>

    <li>
        <img src="<?php echo $galitem_img_url[0]; ?>" alt="<?php the_title(); ?> Image" width="952" height="313" />
        <div>
            <h2><?php the_title(); ?></h2>
            <?php echo $galitem_text; ?>
        </div>
    </li>
     

    <?php endwhile;  // end if have posts?>
    
</ul> 
    
<?php } // end if have posts ?> 

<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
 
</div><!-- end gallery main -->

<?php get_footer(); ?>