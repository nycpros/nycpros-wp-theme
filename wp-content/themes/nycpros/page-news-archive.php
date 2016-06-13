<?php
/*
Template Name: News Archive
*/
?>

<?php get_header(); ?>
<div id="content">

	  <?php
	$args=array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) { 

while ($my_query->have_posts()) : $my_query->the_post(); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    
		<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        	<div class="date"><?php the_time('F jS, Y') ?></div>

		<div class="entry">
		<?php the_excerpt('MORE'); ?>
		</div>
        
	</div>


<?php endwhile; 

	} // end if have posts?>
    
    
</div><!-- end content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
