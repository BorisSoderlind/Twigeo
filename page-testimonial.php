<?php
/*
 Template Name: Testimonial Page
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

    <div class="content">
        <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">

<?php

$args = array(
        'post_type' => 'testimonial_posts',
        'posts_per_page' => 3,
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
                            <div class="col-xs-12"><div class="thumbnail adjust1">
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <img class="media-object img-circle img-responsive" src="' . $image_url . '" />
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <div class="caption">
                                            <h2 class="text-info lead adjust2">' . $quote . '</h2>
                                            <p>' . $theTestimonial->post_title . '</p>
                                            <small>
                                                <cite title="Source Title">'
                                                    . $title . ', ' . $company .
                                                '</cite>
                                            </small>

                                    </div>
                                </div>
                            </div>
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

<?php get_footer(); ?>