<?php
/*
Template Name: Page (Bios)
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="bios-main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<h1><?php the_title(); ?></h1>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<section class="bios-block-wrap cf" itemprop="articleBody">

									<?php									
									// loop arguments
									$arr = array( 
										'post_type' => 'biography', 
										'posts_per_page' => -1 
										); 

									$loop = new WP_Query( $arr ); 
									?>

									<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
									
									<div class="bios-block cf">
										
										<div class="m-all t-2of3 d-3of4 last-col cf">
										<h2><?php the_title(); ?></h2>
										<p class="bio-subtitle"><strong><?php the_field('subtitle'); ?></strong></p>
										<?php the_content(); ?>
										</div>
									
										<div class="m-all t-1of3 d-1of4 first-col cf">
										<?php if ( has_post_thumbnail() ) { ?>
										
										<?php echo get_the_post_thumbnail($page->ID, 'large', array( 'class' => 'img-responsive' )); ?>
										
										<?php } // end post thumb check ?>	
										</div>									

									</div>

									<?php endwhile; wp_reset_query(); ?>
																				
								</section>

							</article>

							<?php endwhile;  ?>

							<?php endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
