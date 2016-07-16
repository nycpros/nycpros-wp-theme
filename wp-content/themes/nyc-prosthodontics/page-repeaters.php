<?php
/*
 Template Name: Page (Repeaters)
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

									<p class="byline vcard">
										<?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf" itemprop="articleBody">


									<?php ########### BASIC REPEATER ############### ?>
									
									<?php // check if the repeater field has rows of data

									if( have_rows('repeater_field_name') ):

									 	// loop through the rows of data
									    while ( have_rows('repeater_field_name') ) : the_row();

									        // display a sub field value
									        the_sub_field('sub_field_name');

									    endwhile;

									else :

									    // no rows found

									endif;

									// end basic ?>

									

									<?php ########### FLEXIBLE CONTENT REPEATER ############### ?>

									<?php  // check if the flexible content field has rows of data

									if( have_rows('flexible_content_field_name') ):

									     // loop through the rows of data
									    while ( have_rows('flexible_content_field_name') ) : the_row();

									        if( get_row_layout() == 'paragraph' ):

									        	the_sub_field('text');

									        elseif( get_row_layout() == 'download' ): 

									        	$file = get_sub_field('file');

									        endif;

									    endwhile;

									else :

									    // no layouts found

									endif;

									// end flexible ?>									


									<? // CONTENT STILL HERE ?>
									<?php the_content(); ?>
								
								</section>

							</article>

							<?php endwhile;  ?>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
