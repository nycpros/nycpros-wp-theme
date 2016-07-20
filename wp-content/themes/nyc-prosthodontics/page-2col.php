<?php
/*
Template Name: Page (2 Column)
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="twocol-main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<h1><?php the_title(); ?></h1>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<section class="entry-content cf" itemprop="articleBody">

									<?php ########### TWO COLUMNS ############### ?>
						
									    	<div class="twocol-block cf">
									    		
										    	<div class="m-all col-1of2 cf" >
			
											        <?php if(get_field('col1_image')) { 
											        	$image = get_field('col1_image');
											        ?>
											        <div class="twocol-img">
											       		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
											        </div>
											        <?php } ?>												        

													<?php if(get_field('col1_title')) { ?>
													<h2><?php the_field('col1_title'); ?></h2>
											        <?php } ?>
											        
											        <?php if(get_field('col1_wysiwyg')) { ?>
											        <?php the_field('col1_wysiwyg'); ?>
											        <?php } ?>
											        
												</div>
												
										    	<div class="m-all col-1of2 cf" >
	
											        <?php if(get_field('col2_image')) { 
											        	$image = get_field('col2_image');
											        ?>
											        <div class="twocol-img">
												        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
											        </div>
											        <?php } ?>												        

													<?php if(get_field('col2_title')) { ?>
													<h2><?php the_field('col2_title'); ?></h2>
											        <?php } ?>
											        
											        <?php if(get_field('col2_wysiwyg')) { ?>
											        <?php the_field('col2_wysiwyg'); ?>
											        <?php } ?>

										        </div>	

											</div>
											
									<?php the_content(); ?>

								</section>

							</article>

							<?php endwhile;  ?>

							<?php endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
