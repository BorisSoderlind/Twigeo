<?php
/*
 Template Name: Carousel Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<h1 class="page-title"><?php the_title(); ?></h1>

<div id="myCarousel" class="carousel cases slide" data-ride="carousel">

	<!-- Indicators -->
	<ol class="carousel-indicators">

<?php

$args = array(
        'post_type' => 'case_posts',
        'posts_per_page' => 3,
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
    	$content = $theSlide->post_content;
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = apply_filters('the_content', $content);
        // $image = get_the_post_thumbnail_url($theSlide->ID, 'full'); // Featured Image
        $caseImage = get_field('case_image', $theSlide->ID);

    	echo '<div class="item';
    	echo $isActive ? ' active' : '' ;
    	echo '">';
    	echo '<div class="container"><div class="col-md-6"><h1>';
    	echo $theSlide->post_title;
    	echo '</h1>';
    	echo '<p>';
    	echo $content;
    	echo '</p>';
    	echo '</div>';
    	echo '<div class="col-md-6">';

    	// echo '<img class="img-responsive" src="' . $image . '" />'; // Featured Image

    	echo '<img class="img-responsive" src="' . $caseImage . '" />';

    	echo '</div></div></div>';

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


<?php get_footer(); ?>
