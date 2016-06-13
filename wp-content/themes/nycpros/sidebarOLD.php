	<?php dynamic_sidebar(); ?>
    
    
    <?php if (is_page('379')) { ?>
    
<?php /*?>    <p>News Archive Page</p><?php */?>
    
    <?php } else { ?>
    
     <?php ########### POSTS LOOP ############# ?>
    
    <?php
	$args=array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'cat' => -7,
  'caller_get_posts'=> 1
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) { 

while ($my_query->have_posts()) : $my_query->the_post(); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    
    <?php if ( has_post_thumbnail() ) { ?>
    	
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?></a>
        
        <?php } // end post thumb check ?>
    
		<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        	<div class="date"><?php the_time('F jS, Y') ?></div>

		<div class="entry">
		<?php the_excerpt('MORE'); ?>
		</div>
        
	</div>


<?php endwhile; 

	} // end if have posts?>

<a id="archive" href="/archive">View News Archive &raquo;</a>


<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

<?php } // end page check ?>
		
	</div>

