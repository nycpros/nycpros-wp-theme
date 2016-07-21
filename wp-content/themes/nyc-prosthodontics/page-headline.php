<?php
/*
Template Name: Page (Headline)
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="headline-main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<h1><?php the_title(); ?></h1>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<section class="entry-content cf" itemprop="articleBody">


									<?php ########### HEADING REPEATER ############### ?>
									
									<?php 

									if( have_rows('heading_repeater') ): ?>
									
									 <?php	// loop through the rows of data
									    while ( have_rows('heading_repeater') ) : the_row(); ?>
									    
									    	<div class="heading-block cf">
									    		
										    	<div class="m-all t-3of5 d-3of7 last-col cf" >
			
													<h2><?php the_sub_field('title'); ?></h2>
											        
											        <?php the_sub_field('description'); ?>
											        
			
												</div>
												
												<?php 
												$image = get_sub_field('image');
												if ($image['url'] != '') { ?>
										    	
										    	<div class="m-all t-2of5 d-4of7 first-col cf" >
	
													<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											        
										        </div>	
										        
										        <?php } ?>
	

											</div>
											
									    <?php endwhile; ?>
	
									
									<?php endif;  ?>
									
									<?php ########## SUBGALLERIES ############# ?>
									
									<?php if(get_field('subgalleries')) { 
									
									$subgalleries_array = get_field('subgalleries'); 
									
									?>
									
									<section id="subgallery-wrap" class="entry-content cf" itemprop="articleBody">

										<?php									
										// loop arguments
										$arr = array( 
											'post_type' => 'subgallery', 
											'post__in' => $subgalleries_array,
											'posts_per_page' => -1 
											); 
	
										$loop = new WP_Query( $arr ); 
										?>
	
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
										
										<div class="cf">
										
											<div class="m-all t-3of5 d-3of7 last-col cf">
											<h2><?php the_title(); ?></h2>
											<?php the_content(); ?>
											</div>									
										
	
											<?php 
										
											$images = get_field('subgallery_images');
	
											if( $images ): ?>
	
											   <div class="subgallery-block m-all t-2of5 d-4of7 first-col cf" style="visibility: hidden;">
											        <?php foreach( $images as $image ): ?>
											            <div>
											                <a href="<?php echo $image['url']; ?>" data-caption="<?php echo $image['caption']; ?>">
											                	<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"  />
											                </a>
											            </div>
											        <?php endforeach; ?>
											    </div>
											<?php endif; ?>
											
										</div>
	
										<?php endwhile; wp_reset_query(); ?>
	
									</section>
									
									<?php } // end if subgalleries check ?>

									<?php if (get_the_content()) { ?>
									<div class="headline-content-wrap">
									<?php the_content(); ?>
									</div>
									<?php } ?>

								</section>

							</article>

							<?php endwhile;  ?>

							<?php endif; ?>

						</div>

				</div>

			</div>


<?php get_footer(); ?>
