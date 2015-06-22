<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> tech">
			<h1><?php wptouch_the_title();?></h1>
				
				<!--start map -->
				<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
				<script type="text/javascript">
					var map, selectControl, selectedFeature, vectorLayer, previousFeature;
				
					OpenLayers.IMAGE_RELOAD_ATTEMPTS = 3;
					OpenLayers.ImgPath = "http://js.mapbox.com/theme/dark/";
				
					function updateLayers() {
						vectorLayer.removeAllFeatures();
						addAllFeatures();
					}
				
					function addAllFeatures(){
						for ( var i in toExecute ){
							eval(toExecute[i]);
						}
					}
				
					function setPosition(post_id) {
						window.location.hash = post_id;
					}
				
					function onPopupClose(evt) {
						//selectControl.unselect(selectedFeature);
						map.removePopup(selectedFeature.popup);
						selectedFeature.popup.destroy();
						selectedFeature.popup = null;
					}
				
					function onFeatureSelect(feature) {
						// clean previous selected feature
						if (previousFeature) {
							map.removePopup(previousFeature.popup);
							previousFeature.popup.destroy();
							previousFeature.popup = null;
						}
						
						selectedFeature = feature;
						id = feature.attributes['post_id'];
						title = feature.attributes['post_title'];
						permalink = feature.attributes['post_permalink'];
						excerpt = feature.attributes['post_excerpt'];
						
						var width = 250;
						var height = 90;
						var url_link = "<?php echo WP_SITEURL;?>/" + id;
				
						popup = new OpenLayers.Popup.Anchored(		
							"info-popup",
							feature.geometry.getBounds().getCenterLonLat(),
							new OpenLayers.Size( width,height ),
							"<div class='popup' onClick='window.location=\"" + permalink + "\"'>" + 
							"<div class='popup_title'>" +
							title + 
							"</div><p>" +
							excerpt,
							null, 
							false,
							onPopupClose);
				
						popup.autoSize = true;
						popup.setBackgroundColor('#CFE9BB');
				
						feature.popup = popup;
						map.addPopup(popup);
				
						popup.setSize(new OpenLayers.Size( width,height ))
					}
				
					function onFeatureUnselect(feature) {
						previousFeature	= feature;
					}
				
					function init(){
				
						// Customize the values below to change the tileset.
						// This information is available on each tileset page.
						var layername = 'world-light';
						var file_extension = 'png';
				
						// Build the map
						var options = {
							projection: new OpenLayers.Projection("EPSG:900913"),
							displayProjection: new OpenLayers.Projection("EPSG:4326"),
							units: "m",
							numZoomLevels: 12,
							maxResolution: 156543.0339,
							maxExtent: new OpenLayers.Bounds(
								-20037500,
								-20037500,
								20037500,
								20037500
							)
						};
						
						map = new OpenLayers.Map('map', options);
				
						// Layer definitions
						var layer = new OpenLayers.Layer.TMS(
							"MapBox Layer",
							[ "http://a.tile.mapbox.com/","http://b.tile.mapbox.com/",
							"http://c.tile.mapbox.com/","http://d.tile.mapbox.com/" ],
							{ 'layername': layername, 'type': file_extension }
						);
				
						// Add layers to the map
						map.addLayers([ layer ]);
				
						// Set the map's initial center point
						map.setCenter(new OpenLayers.LonLat(0, 0), 1);
				
						var styleMap = new OpenLayers.StyleMap(OpenLayers.Util.applyDefaults(
							{fillColor: "#669933", fillOpacity: 1, strokeColor: "#a1d8eb", strokeOpacity: 0.8, strokeWidth: 0, cursor: "pointer"},
							OpenLayers.Feature.Vector.style["default"]));
						
						vectorLayer = new OpenLayers.Layer.Vector("vector-layer", {styleMap: styleMap});
				
						map.addLayer(vectorLayer);
						
						selectControl = new OpenLayers.Control.SelectFeature(vectorLayer,
							{hover: true, onSelect: onFeatureSelect, onUnselect: onFeatureUnselect});
				
						map.addControl(selectControl);
						
						selectControl.activate();
						
						map.events.register("zoomend", map, updateLayers);
					}
				
					var toExecute = [
						<?php
							$args = array('post_type' => 'map_post', 'showposts' => '-1'); 
							$posts = get_posts($args);
							if ( $posts ) {
								foreach ($posts as $post) : setup_postdata($post);
									$post_id = $post->ID;
									$post_permalink = get_permalink( $post->ID );
									$permalink = "'$post_permalink'";
									$title = "'$post->post_title'";
									$title = addslashes($title);
									$the_excerpt = addslashes( get_the_excerpt() );
									$excerpt = "'$the_excerpt'";
									$latitude = get_post_meta( $post_id, 'ch_latitude', 'true' );
									$longitude = get_post_meta( $post_id, 'ch_longitude', 'true' );
									if ( $latitude AND $longitude ) {
										$values = array( $latitude, $longitude, $post_id, $title, $permalink, $excerpt );
										$valueList = implode( ', ', $values );
										$func = "\"addCircleToMap($valueList)\", ";
										echo $func;
									}
								endforeach;
							}
							wp_reset_query();
						?>
					];
				
					function addCircleToMap(latitude, longitude, post_id, post_title, post_permalink, post_excerpt) {
						var epsg4326 = new OpenLayers.Projection("EPSG:4326");
						var centre = new OpenLayers.Geometry.Point(longitude, latitude);
						centre.transform(epsg4326, map.getProjectionObject());
						
						var zoom = map.getZoom();
						var size = 500000 / (zoom * 1.5);
						
						var circle = OpenLayers.Geometry.Polygon.createRegularPolygon(centre, size, 50);
						
						var properties =  {post_id: post_id, post_title: post_title, post_permalink: post_permalink, post_excerpt : post_excerpt};
						
						vectorLayer.addFeatures(new OpenLayers.Feature.Vector(circle, properties));
					}
				
					jQuery(document).ready(function() {
						init();
						
						addAllFeatures();
					});
					
				</script>
						
			<?php /*?><div id="map" name="map" style="width: 538px; height: 324px; margin-bottom: 25px;"></div>		<?php */?>							
			<?php wptouch_the_content(); ?>
		</div>
		
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>" style="padding-bottom: 0;">
			<?php get_sidebar('left-projects'); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("projects"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>