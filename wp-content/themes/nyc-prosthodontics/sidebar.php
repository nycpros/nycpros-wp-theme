				<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

					<?php if ( !is_single() && is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php elseif ( is_single() ) : ?>
					
					<?php ########### POSTS LOOP ############# ?>
					
					<?php
					// First let's get the current post ID to exclude it!
					$post = $wp_query->post;
					$not_in[0] = $post->ID;
					$args=array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 6,
						'cat' => -7,
						'caller_get_posts'=> 1,
						'post__not_in' => $not_in
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					
					if( $my_query->have_posts() ) { 
					
						while ($my_query->have_posts()) : $my_query->the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" class="post-listing">
					
						<?php if ( has_post_thumbnail() ) { ?>
						
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?></a>
						
						<?php } // end post thumb check ?>
						
						<h3 class="news-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="news-date"><?php the_time('F jS, Y') ?></div>
						
						<div class="news-content">
							<?php the_excerpt(); ?>
						</div>
					
					</div>

					<?php endwhile; 
					
					} // end if have posts ?>
					
					<div id="archive">
						<a class="btn btn-primary" href="/archive">View News Archive &raquo;</a>
					</div>
					
					<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>					

					<?php endif; ?>

				</div>
