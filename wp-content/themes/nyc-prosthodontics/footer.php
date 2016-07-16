			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

					<?php /*
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
					*/ ?>
					
					<div class="source-org">

						<span><strong><?php the_field('footer_title', 'options'); ?></strong></span> <span><?php the_field('footer_address', 'options'); ?></span> <span>Phone: <a href="tel:<?php echo get_trimmed_phone(get_field('footer_phone', 'options')); ?>"><?php the_field('footer_phone', 'options'); ?></a></span> <span>Fax: <a href="fax:<?php echo get_trimmed_phone(get_field('footer_fax', 'options')); ?>"><?php the_field('footer_fax', 'options'); ?></a></span> <span><a href="/contact">Contact Us</a></span>
						
					</div>
					
				</div>

			</footer>

		</div> <!-- end #inner-container-->

	</div> <!-- end #container-->

	<?php // all js scripts are loaded in library/bones.php ?>
	<?php wp_footer(); ?>

</body>

</html> <!-- end of site. what a ride! -->
