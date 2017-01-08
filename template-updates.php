<?php
/**
* Template Name: Updates
*/
?>

<?php get_header(); ?>


			<div class="container">

				<div class="row white-container">

						<main id="main"  role="main">

						<!-- <a href="">Back</a> -->

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header col-md-12">

									<!-- <h1 class="single-title"><?php the_title(); ?></h1> -->
									<br>

								</header>

								<section class="entry-content cf col-md-8">
								<?php

								$args = array( 'post_type' => 'news_posts', 'posts_per_page' => 1 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
								    echo '<h1>';
								    the_title();
								    echo '</h1>';
								    echo '<div class="entry-content">';
								    the_content();
								    echo '</div>';
								endwhile;

							    ?>
								</section> <!-- end article section -->

							</article>

							<?php endwhile; ?>

							<?php else : ?>

								<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-news_posts.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						<br>
						<p> </p>
						<br>
						<p> </p>
							<section class="col-md-3 col-md-offset-1 news">

					    		<h4>Latest</h4>

				    			<ul>
								<?php

								$args = array(
								        'post_type' => 'news_posts',
								        'orderby' => 'date',
								        'order' => 'DESC',
								        'posts_per_page' => 3,
								        'post__not_in'   => array( get_queried_object_id() ) // Exclude current post ID (works outside the loop)
								    );

								// Get the posts
							    $news = get_posts($args);

								// Loop through all of the results
							    foreach ($news as $theNews)
							    {
							    	// Since we're doing this outside the loop,
							        // Build the apply the filters to the post's content
							    	$content = $theNews->post_content;
							        $content = str_replace(']]>', ']]&gt;', $content);
							        $content = apply_filters('the_content', $content);
							        $post_type = get_permalink( $theNews->ID );

							        echo '<a href="' . get_permalink( $theNews->ID ) . '">';
							    	echo '<li>' . $theNews->post_title . '</li>';
							    	echo '</a>';

							    }

							    ?>
				    			</ul>

							</section>
						</main>				
				</div>
		</div>

<?php get_footer(); ?>