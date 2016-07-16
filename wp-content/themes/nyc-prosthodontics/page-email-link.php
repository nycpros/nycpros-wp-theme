<?php
/*
 Template Name: Page (Email Link)
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header id="page-header">

							<h1 class="page-title"><?php the_title(); ?></h1>

						</header>

							<section class="entry-content cf" itemprop="articleBody">

								<?php

								$reflink = $_GET['link'];
								$reflink = urldecode($reflink);
								$reflink = preg_replace('/[^-a-zA-Z0-9_]/', '', $reflink); // sanitizing

								$reflinkid = $_GET['linkid'];
								$reflinkid = urldecode($reflinkid);
								$reflinkid = preg_replace('/[^-a-zA-Z0-9_]/', '', $reflinkid); // sanitizing

								if ($reflink != '' && $reflinkid != '') {

										$linked_url = get_permalink($reflinkid);
										$linked_title = get_the_title($reflinkid);
										?>

										<?php if ($linked_title != '') : ?>

											<p>It looks like you want to share this page via Email:</p>
											<p><a href="<?php echo $linked_url; ?>" target="_blank"><?php echo $linked_title; ?> (Opens in a new Tab)</a></p>
											<p>Please verify that this is correct and fill out the following form so we can forward it on.</p>

											<?php the_content(); ?>

										<?php else : ?>

											<p><i>Your link doesn't appear to be connected to an article.</i></p>
											<p>Please <a href="/contact/">contact us</a> to help figure out what went wrong.</p>

										<?php endif; ?>

								<?php } else { ?>

										<p><i>Bugger....it looks like we're missing some necessary information in order to email this link.  Please <a href="/contact/">contact us</a> to see if there's anything we can do to help.</i></p>

								<?php } ?>

							</section>


							<footer class="article-footer">


							</footer>

						</article>

						<?php endwhile; endif; ?>

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
