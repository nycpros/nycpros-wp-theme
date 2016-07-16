				<div id="navbar-offcanvas">
					<div class="navbar-header">

						<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
						<p id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

						<?php // if you'd like to use the site description you can un-comment it below ?>
						<?php // bloginfo('description'); ?>

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-oc">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="sr-only">Toggle navigation</span>
						</button>

					</div>

					<nav id="navbar-oc" class="navbar-collapse collapse" role="navigation">

						<div id="inner-nav">						
						<?php wp_nav_menu(array(
						'container' => false,                           		// container tag
						'menu' => __( 'The Main Menu', 'bonestheme' ),  		// nav name
						'menu_class' => 'nav navbar-nav',               		// adding custom nav class
						'theme_location' => 'main-nav',                 		// where it's located in the theme
						'before' => '',                                 		// before the menu
						'after' => '',                                  		// after the menu
						'link_before' => '',                            		// before each link
						'link_after' => '',                             		// after each link
						'depth' => 2,                                   		// limit the depth of the nav
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 	// fallback function (if there is one)
						'walker' => new wp_bootstrap_navwalker(),      			// trigger boostrap walker
						'items_wrap' => nav_search_form()						// hard code search form
						)); ?>
					</div>
					
					</nav>
				</div>
