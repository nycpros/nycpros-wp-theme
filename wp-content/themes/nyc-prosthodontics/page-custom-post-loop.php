<?php
/*
 Template Name: Custom Post Loop
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

									<?php									
									// loop arguments
									$arr = array( 
										'post_type' => 'yourposttypehere', 
										'posts_per_page' => -1 
										); 

									$loop = new WP_Query( $arr ); 
									?>

									<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

									The stuff you want to loop goes in here

									<?php endwhile; wp_reset_query(); ?>


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
