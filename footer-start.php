
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

			<div class="row">
				<div class="col-md-3 col-xs-12">
					
					<p style="clear: both;"></p>
					<h4><?php the_field('address', 313); ?></h4>

					<!-- <p><a class="btn btn-default" href="<?php echo get_site_url();?>/contact-us; ?>" role="button">Or use the contact form &raquo;</a></p> -->
					<div class="visible-xs">
						<a href="https://www.google.se/maps/place/Twigeo/@59.3434192,18.0557529,17z/data=!3m1!4b1!4m5!3m4!1s0x465f9d6ed1a55555:0x26d7d4b03ee48f17!8m2!3d59.3434192!4d18.0579416" class="directions">
						<h1><i class="fa fa-map" aria-hidden="true"></i></h1>Get directions</a>
					</div>

				</div>

				<div id="map-container" class="col-md-9 hidden-xs">
					<style type="text/css">

					.acf-map {
						width: 100%;
						height: 300px;
						border: #ccc solid 1px;
						margin: 20px 0;
					}

					/* fixes potential theme css conflict */
					.acf-map img {
					   max-width: inherit !important;
					}

					</style>
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANTuaK2k80NnrEjvJv4hkbhwOc7iZIrbI"></script>
					<script type="text/javascript">
					(function($) {

					/*
					*  new_map
					*
					*  This function will render a Google Map onto the selected jQuery element
					*
					*  @type	function
					*  @date	8/11/2013
					*  @since	4.3.0
					*
					*  @param	$el (jQuery element)
					*  @return	n/a
					*/

					function new_map( $el ) {
						
						// var
						var $markers = $el.find('.marker');
						
						
						// vars
						var args = {
							zoom		: 16,
							center		: new google.maps.LatLng(0, 0),
							mapTypeId	: google.maps.MapTypeId.ROADMAP
						};
						
						
						// create map	        	
						var map = new google.maps.Map( $el[0], args);
						
						
						// add a markers reference
						map.markers = [];
						
						
						// add markers
						$markers.each(function(){
							
					    	add_marker( $(this), map );
							
						});
						
						
						// center map
						center_map( map );
						
						
						// return
						return map;
						
					}

					/*
					*  add_marker
					*
					*  This function will add a marker to the selected Google Map
					*
					*  @type	function
					*  @date	8/11/2013
					*  @since	4.3.0
					*
					*  @param	$marker (jQuery element)
					*  @param	map (Google Map object)
					*  @return	n/a
					*/

					function add_marker( $marker, map ) {

						// var
						var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

						// create marker
						var marker = new google.maps.Marker({
							position	: latlng,
							map			: map
						});

						// add to array
						map.markers.push( marker );

						// if marker contains HTML, add it to an infoWindow
						if( $marker.html() )
						{
							// create info window
							var infowindow = new google.maps.InfoWindow({
								content		: $marker.html()
							});

							// show info window when marker is clicked
							google.maps.event.addListener(marker, 'click', function() {

								infowindow.open( map, marker );

							});
						}

					}

					/*
					*  center_map
					*
					*  This function will center the map, showing all markers attached to this map
					*
					*  @type	function
					*  @date	8/11/2013
					*  @since	4.3.0
					*
					*  @param	map (Google Map object)
					*  @return	n/a
					*/

					function center_map( map ) {

						// vars
						var bounds = new google.maps.LatLngBounds();

						// loop through all markers and create bounds
						$.each( map.markers, function( i, marker ){

							var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

							bounds.extend( latlng );

						});

						// only 1 marker?
						if( map.markers.length == 1 )
						{
							// set center of map
						    map.setCenter( bounds.getCenter() );
						    map.setZoom( 16 );
						}
						else
						{
							// fit to bounds
							map.fitBounds( bounds );
						}

					}

					/*
					*  document ready
					*
					*  This function will render each map when the document is ready (page has loaded)
					*
					*  @type	function
					*  @date	8/11/2013
					*  @since	5.0.0
					*
					*  @param	n/a
					*  @return	n/a
					*/
					// global var
					var map = null;

					$(document).ready(function(){

						$('.acf-map').each(function(){

							// create map
							map = new_map( $(this) );

						});

					});

					})(jQuery);
					</script>

					<?php 

					$location = get_field('footer_map', 313);

					if( !empty($location) ):
					?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
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
