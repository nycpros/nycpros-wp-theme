<?php
/*
Template Name: Search Results
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="search-main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<h1><?php the_title(); ?></h1>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<section class="cf" itemprop="articleBody">

									<gcse:searchresults-only></gcse:searchresults-only>
																				
								</section>

							</article>

							<?php endwhile;  ?>

							<?php endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
