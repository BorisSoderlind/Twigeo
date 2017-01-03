<?php
/*
 * NEWS POSTS TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
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

									<h1 class="single-title"><?php the_title(); ?></h1>
									<h5><?php the_date() ?></h5>
									<br>

								</header>

								<section class="entry-content cf col-md-8">
									<?php
										// the content (pretty self explanatory huh)
										the_content();
										the_post_thumbnail('full');
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
