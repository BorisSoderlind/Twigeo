<?php
/**
* Template Name: Contact
*/
?>

<?php get_header(); ?>

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="container">
		<div class="container">
			<div class="row ">
				<div class="col-md-8 col-md-offset-2">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

				<?php endwhile; else : ?>

				<article id="post-not-found" class="hentry cf">
					<header class="article-header">
						<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
					</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
					</section>
					<footer class="article-footer">
							<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
					</footer>
				</article>

				<?php endif; ?>

					

			</div>
		</div>
	</div>

<?php get_footer(); ?>