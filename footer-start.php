
	<footer class="footer t-blue" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<div class="container">

			<?php if( have_rows('email_us', 313) ): ?>
			<div class="row">
			    <?php while( have_rows('email_us', 313) ): the_row(); ?>

			    <div class="col-sm-4">

			    	<h4><strong><?php the_sub_field('title'); ?> </strong>
			    	<a href="mailto:<?php the_sub_field('email_address'); ?>">
			    	<?php the_sub_field('email_link_text'); ?></a></h4>

			    </div>

			    <?php endwhile; ?>

			</div>
			<?php endif; ?>

			<br>

			<div class="row">
				<div class="col-md-12">

					<div class="footer-head">
						<h2><?php the_field('footer_header', 313); ?></h2>
					</div>

				</div>
			</div>

			<br>

			<div class="row">

				<?php if( have_rows('visit_us_row', 313) ): ?>

				    <?php while( have_rows('visit_us_row', 313) ): the_row(); ?>

				        <div class="col-md-4 col-xs-12">

					        <h4><b><?php the_sub_field('office_header'); ?></b><br>

					        <?php the_sub_field('office_address'); ?><br>

					        <span style="margin-top: 15px;">

					        <a href="https://www.google.se/maps/place/<?php the_sub_field('office_location'); ?>" style="font-size: 13px; color: #111;" target="_blank">

					        	<img height="15px" width="15px" style="margin-top: -3px;" src="<?php echo get_template_directory_uri() ?>/library/images/ic_place_black_24dp_1x.png"> View on map

					       	</a>

					       	</span></h4>

				        </div>

				    <?php endwhile; ?>

				<?php endif; ?>

				<div class="col-md-4 col-xs-12">

					<?php if( get_field('image') ): ?>

						<img src="<?php the_field('image'); ?>" />

					<?php endif; ?>

				</div>

			</div>

			<br>

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

<!-- 			<div class="row">
				<div class="col-sm-4">
					<h4><strong>New Bussines: </strong><a href="mailto:">Email address</a></h4>
				</div>
				<div class="col-sm-4">
					<h4><strong>Jobs: </strong><a href="mailto:">Email address</a></h4>
				</div>
				<div class="col-sm-4">
					<h4><strong>Media Network: </strong><a href="mailto:">Email address</a></h4>
				</div>
			</div> -->




		</div>
	</footer>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
</section>

<div id="contact"></div>

</body>

</html> <!-- end of site. what a ride! -->
