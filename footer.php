
	<footer class="footer t-blue" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<div class="container">

			<div class="row">

				<div class="col-md-6">
				<?php if( have_rows('social_links', 313) ): ?>

				    <?php while( have_rows('social_links', 313) ): the_row(); ?>
				        <div class="social-icon"><a href="<?php the_sub_field('social-link'); ?>" target="_blank"><?php the_sub_field('social-icon'); ?></a></div>
				    <?php endwhile; ?>

				<?php endif; ?>
					
				</div>

				<div class="col-md-6">
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> AB</p>
				</div>

		</div>
	</footer>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
</section>

<div id="contact"></div>

</body>

</html> <!-- end of site. what a ride! -->
