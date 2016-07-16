<?php
/*
 Template Name: Page (Home)
 *
*/
get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?>>
								
								<?php if (get_field('home_video_url_vimeo')) { ?>
								<?php echo vimeo_embed_from_url(get_field('home_video_url_vimeo')); ?>
								<?php } ?>

								<section class="home-content cf">
									
									<div class="m-all t-3of5 d-3of7 last-col cf" >
									<?php the_content(); ?>
									</div>										

									<div class="m-all t-2of5 d-4of7 first-col cf" >
									<?php 
									$image = get_field('home_image');
									
									if( !empty($image) ): ?>
									
										<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />
									
									<?php endif; ?>
									</div>
									
								
									
								</section> <?php // end article section ?>

							</article>

							<?php endwhile; endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
