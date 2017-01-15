<?php
/**
* Template Name: Start
*/
?>

<?php get_header(); ?>
<section>
	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="hero" id="hero-box">
		<div class="container">
			<div class="row">

				<div class="col-md-8">
					<!-- <h1 style="font-weight:400;">Hello</h1> -->
					<h1 class="fade"><?php the_field('hero_text'); ?></h1>
				</div>
			</div>
		</div>

	</div>

	<div class="container">
		<div id="about"></div>
		<div class="row white-container">
			<div class="col-md-7">
				<h2><?php the_field('about_text'); ?></h2>
			</div>
			<div class="col-md-3 col-md-offset-2 news">

			<?php

			$args = array(
			        'post_type' => 'news_posts',
			        'orderby' => 'date',
			        'order' => 'DESC',
			        'posts_per_page' => 3
			    );

			// Get the posts
		    $news = get_posts($args);

		    if( get_field('show_news_section') ) {

		    	echo '<h3>Updates:</h3>';
		    	echo '<ul>';

			// Loop through all of the results
		    foreach ($news as $theNews)
		    {
		    	// Since we're doing this outside the loop,
		        // Build the apply the filters to the post's content
		    	$content = $theNews->post_content;
		        $content = str_replace(']]>', ']]&gt;', $content);
		        $content = apply_filters('the_content', $content);

		        echo '<a href="' . get_permalink( $theNews->ID ) . '">';
		    	echo '<li>' . $theNews->post_title . '</li>';
		    	echo '</a>';
		    }
		    	echo '</ul>';
			}

			else {


			}

		    ?>

			</div>
		</div>


		<div id="what_we_do"></div>
		<hr>

		
		<div class="row empty-space"></div>


		<!-- FEATURES -->
		<div class="row white-container is-flex" id="what_we_do" style="padding-top: 0;">

			<?php

			// check if the repeater field has rows of data
			if( have_rows('features') ):

			 	// loop through the rows of data
			    while ( have_rows('features') ) : the_row();
				
				// display a sub field value ?>
				<div class="col-sm-4" style="margin-bottom: 20px;">
					<div class="icon-box">
						<h3><?php the_sub_field('font_awesome_icon'); ?></h3>
					</div>
					<div class="feature-text">
				        <h3><?php the_sub_field('feature_title'); ?></h3>
						<p><?php the_sub_field('feature_text'); ?></p>
					</div>
				</div>

			<?php
			    endwhile;

			else :

			    // no rows found

			endif;

			?>
		</div>

	</div>


		<!-- PROMO -->
		<div style="background-image: url(<?php echo get_field('promo_image'); ?>) ; background-size: cover; background-position: center center; padding: 140px 0 140px 0; display: flex; height: 500px;">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
<!-- 						<h2>Hey there!</h2>
						<p>We are a modern user growth company, lorem ipsum dolor sit amet. We are a modern user growth company, lorem ipsum dolor sit amet.</p>
						<p><a class="btn btn-default" href="<?php echo get_site_url();?>/contact-us" role="button">Contact</a></p> -->
					</div>
				</div>
			</div>
		</div>
		<!-- /PROMO -->
<div class="container">

	<div id="work"></div>
		<!-- LOGO SLIDER -->
		<div class="white-container">

			<div id="logo-container" class="row">
				<div class="col-md-12" style="margin-bottom: 15px;">
					<h3>A selection of our clients</h3>
				</div>
			</div>

			<div class="row" style="margin-left: 0; margin-right: 0;">

			<div class="col-md-12">
			    <!-- Each image is 350px by 233px -->
			    <div class="photobanner">
			    <span class="border-override"></span>

				<?php 

				$images = get_field('logos');
				// $isFirst = true;

				if( $images ): ?>

				        <?php foreach( $images as $image ):

				        if ( ! empty($image['alt']) ) { // if so, show content
							echo '<a href="http://' . $image['alt'] . '" target="_blank">';
						}
				        	
				        	echo '<div>';
							echo '<img';
							// echo $isFirst ? 'class="first-logo"' : '';
							echo ' src="';
							echo $image['url'];
							echo '" alt="';
							echo $image['alt']; 
							echo '"/>'; 
							echo '</div>';

						if ( ! empty($image['alt']) ) { // if so, show content
							echo '</a>';
						}
							
							

							// $isFirst = false;


						endforeach; ?>


				<?php endif; ?>
			    </div>
			</div>
		</div>
		<!-- /LOGO SLIDER -->
	</div>
	</div>

	<div id="cases"></div>
	<div class="container-fluid">
		<!-- Carousel -->
		<div></div>
			<div class="row t-blue">
				<div id="myCarousel" class="carousel cases slide" data-ride="carousel" data-interval="false">

			<!-- Indicators -->
			<ol class="carousel-indicators">

		<?php

		$args = array(
		        'post_type' => 'case_posts',
		        'orderby' => 'date',
		        'order' => 'DESC'
		    );

			// Get the posts
		    $slide = get_posts($args);
		    $isActive = true;
		    $isFirst = true;

		    foreach($slide as $key=>$value) {

			    echo '<li data-target="#myCarousel" data-slide-to="';
			    echo $key;
			    echo '" class="';
			    echo $isFirst ? 'active' : '';
			    echo '"></li>';
			    $isFirst = false;
			} 

			echo '</ol>';
			echo '<div class="carousel-inner" role="listbox">';

		// Loop through all of the results
		    foreach ($slide as $theSlide)
		    {
		    	// Since we're doing this outside the loop,
		        // Build the apply the filters to the post's content
		    	$content = $theSlide->case_summary;
		        $content = str_replace(']]>', ']]&gt;', $content);
		        $content = apply_filters('the_content', $content);
		        // $image = get_the_post_thumbnail_url($theSlide->ID, 'full'); // Featured Image
		        $caseImage = get_field('case_image', $theSlide->ID);

		    	echo '<div class="item';
		    	echo $isActive ? ' active' : '' ;
		    	echo '">';
		    	echo '<div class="col-md-6"><h2>';
		    	echo $theSlide->post_title;
		    	echo '</h2>';
		    	echo $content;
		    	echo '<a class="" href="' . get_permalink( $theSlide->ID ) . '" role="button">Read full case study</a>';
		    	echo '</div><br>';
		    	echo '<div class="col-md-6">';

		    	// echo '<img class="img-responsive" src="' . $image . '" />'; // Featured Image

		    	echo '<img class="img-responsive" src="' . $caseImage . '" />';
		    	echo '</div></div>';

		    	$isActive = false;

		}
		?>
			</div>

			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

			</div>
		</div>
		<!-- /.carousel -->

	</div>
	<div class="container-fluid">

		<!-- TESTIMONIALS -->
		<div class="row">

	        <div id="carousel-testimonial" class="carousel testimonials slide" data-ride="carousel" data-interval="false">

	            <!-- Indicators -->
	            <ol class="carousel-indicators">

				<?php

				$args = array(
				        'post_type' => 'testimonial_posts',
				        'orderby' => 'date',
				        'order' => 'DESC'
				    );

				    // Get the posts
				    $testimonials = get_posts($args);
				    $isFirst = true;
				    $isActive = true;

			            foreach($testimonials as $key=>$value) {

			                echo '<li data-target="#testimonial-carousel" data-slide-to="';
			                echo $key;
			                echo '" class="';
			                echo $isFirst ? 'active' : ' ';
			                echo '"></li>';
			                $isFirst = false;
			            } 
			            echo '</ol>';
			            echo '<div class="carousel-inner">';
			            echo '<h2>' . get_field('case_slider_header') . '</h2>';
			            foreach ($testimonials as $theTestimonial)
			            {
			                $title = get_field('testimonial_title', $theTestimonial->ID);
			                $company = get_field('testimonial_company', $theTestimonial->ID);
			                $quote = get_field('testimonial_quote', $theTestimonial->ID);
			                $testimonialImage = get_field('testimonial_image', $theTestimonial->ID);
			                $image_size = 'medium';
			                $image_array = wp_get_attachment_image_src($testimonialImage, $image_size);
			                $image_url = $image_array[0];

			                echo '<div class="item';
			                echo $isActive ? ' active' : '' ;
			                echo '">
		                            <div class="row">
		                                <div class="col-md-8 col-md-offset-2">
		                                    <div class="caption">
		                                            <h3 style="color:#500778;">' . $quote . '</h3><br>
		                                    </div>
				                        </div>
				                    </div>
				                     <div class="row">
		                                <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-4">
		                                    <img class="media-object img-circle img-responsive" src="' . $image_url . '" style="float: left; margin-right: 20px;"/>
		                                    <p style="text-align:left; margin-top:20px;">' . $theTestimonial->post_title . '
	                                        <br>
	                                            <small>
	                                                <cite title="Source Title">'
	                                                    . $title . ', ' . $company .
	                                                '</cite>
	                                            </small>
	                                        </p>
		                                </div>
			                                
                                        
		                            </div>
				            	</div>';
			                $isActive = false;
			            } ?>

			</div>
			<!-- Controls --> 
			<a class="left carousel-control" data-slide="prev" href="#carousel-testimonial"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" data-slide="next" href="#carousel-testimonial">
			<span class="glyphicon glyphicon-chevron-right"></span></a>

		</div>
	</div>
	</div>
	<!-- /TESTIMONIALS -->
	
	<div class="container">
		<div id="team"></div>
		<hr>
		<!-- TEAM -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="text-align: center; padding-top: 40px;">
				<h2><?php the_field('team_title') ?></h2>
				<p><?php the_field('team_text') ?></p>
			</div>
			
		</div>

		<div class="row white-container is-flex">
			<?php

			$args = array(
			        'post_type' => 'team_posts',
			        'orderby' => 'date',
			        'order' => 'DESC',
			        'posts_per_page' => 20
		    );

		    // Get the posts
		    $team = get_posts($args);

            foreach($team as $team_member) {

            	$info = get_field('team_information', $team_member->ID);

            	$team_image = get_field('team_image', $team_member->ID);
                $image_size = 'large';
                $image_array = wp_get_attachment_image_src($team_image, $image_size);
                $image_url = $image_array[0];
                $link = get_field('team_link', $team_member->ID);
                $link_text = get_field('team_link_text', $team_member->ID);
                
            	echo '<div class="col-md-3 col-sm-4 col-xs-6 team-box">';
            	echo '<img class="img-responsive team-img" src="' . $image_url . '" />';
            	echo '<h3>' . $team_member->post_title . '</h3><p>';
                echo $info;
                echo '<br><a href="' . $link . '" target="_blank">';
                echo $link_text . '</a></p>';
                echo '</div>';
            } 
			?>

		</div>

		</div>
	</div>
	
<?php get_footer('start'); ?>