<?php
/*
Template Name: Page (Gallery)
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="gallery-main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<h1><?php the_title(); ?></h1>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
								
							<?php
							// get galleries array
							$selected_galleries = get_field('selected_galleries'); 
							?>

								<?php									
								// loop arguments
								$arr = array( 
									'post_type' => 'galleryitem', 
									'post__in' => $selected_galleries,
									'orderby' => 'post__in',
									'posts_per_page' => -1
									); 

								$loop = new WP_Query( $arr ); 
								?>

								<?php 
								
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									
								<section class="gallery-block-wrap cf" itemprop="articleBody">

									    <?php if ($loop->found_posts > 1) { ?><h2><?php the_title(); ?></h2><?php } ?>
										
										<?php 
									
										$images = get_field('gallery_images');

										if( $images ): ?>

										   <div class="gallery-block" style="visibility: hidden;">
										        <?php foreach( $images as $image ):
										        	
										        	$title = $image['title'];
										        	$caption = $image['caption'];
											        // print_r ( $image ); 
											        
											        ?>
										            <div>
									                	<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"  />
									                	<h3 class="h4 img-title"><?php echo $title; ?></h3>
									                	<?php if ( $caption ) : ?><p class="img-caption"><?php echo $caption ?></p><?php endif; ?>
										            </div>
										        <?php endforeach; ?>
										    </div>
										<?php endif; ?>
										
								</section>
								
								<?php endwhile; wp_reset_query(); ?>

							</article>

							<?php endwhile;  ?>

							<?php endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
