<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : ?>
    
    <?php query_posts( 'posts_per_page=2&cat=7' ); ?>

		<?php while (have_posts()) : the_post(); ?>
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    
         <?php # echo get_the_post_thumbnail($page->ID, 'medium'); ?>
    
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<div class="date"><?php the_time('F jS, Y') ?></div>
		<div class="entry">
        
        <?php echo get_the_post_thumbnail($page->ID, 'medium'); ?>
		<?php the_content('MORE'); ?>
        
		</div>

	</div>

		<?php endwhile; ?>
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

	<?php else : ?>
	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- end post -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
