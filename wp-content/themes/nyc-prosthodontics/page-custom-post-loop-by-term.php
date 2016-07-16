<?php
/*
 Template Name: Custom Post Loop by Term
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
									
									// Set the post type
									$post_type = 'yourposttypehere';
									
									// Get all the taxonomies for this post type
									$taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );

									foreach( $taxonomies as $taxonomy ) : 
									
									    // Gets every "category" (term) in this taxonomy to get the respective posts
									    $terms = get_terms( $taxonomy );
									    
									    foreach( $terms as $term ) : ?>
									    	
									    <?php 	//echo $taxonomy; //print_r($term); ?>
									
									    <h2><?php echo $term->name; ?></h2>
									
									        <?php $term_posts = new WP_Query( "taxonomy=$taxonomy&term=$term->slug&posts_per_page=-1" );
									        
									        if( $term_posts->have_posts() ) : ?> 
							
											        <?php while( $term_posts->have_posts() ) : $term_posts->the_post(); ?>
											        
											        <?php the_title(); ?>
											
											        <?php endwhile; wp_reset_query(); ?>
											        
											        
									        <?php endif; // end if have posts ?>
									    <?php endforeach; // each term  ?>
									<?php endforeach; // each taxonomy ?>


									<? // CONTENT STILL HERE ?>
									<?php the_content(); ?>
								
								</section>

							</article>

							<?php endwhile; ?>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
