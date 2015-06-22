<?php
/*
	Template Name: Projects Region Page
*/
get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left-projects'); ?>
				<div class="content press left">
					<h1><?php the_title();?></h1>
					<div class="item">
					
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
		
		var size = title.length * 7;
		var size = 300;
		var style = "background:#CFE9BB; padding: 0 5px 4px; font-family: Helvetica, Arial, sans-serif; font-size:11px; font-weight:bold; display:table-cell; overflow: hidden; text-align: center;"
		var url_link = "http://instedd.jeffbrockstudio.com/" + id;

		popup = new OpenLayers.Popup.AnchoredBubble(		
		//popup = new OpenLayers.Popup.FramedCloud(
								"info-popup",
								feature.geometry.getBounds().getCenterLonLat(),
								new OpenLayers.Size(size,20), // width, height
 								"<div style='" + style + "' onClick='window.location=\"" + permalink + "\"'>" + title + "</div>",
 								//"<div style='" + style + "' onClick='setPosition("+id+")'>" + title + "</div>",
								null, 
								false,
								onPopupClose);

		popup.autoSize = true;
		//popup.setBackgroundColor('#F5F5F5');
		popup.setBackgroundColor('#CFE9BB');

        feature.popup = popup;
        map.addPopup(popup);

		popup.setSize(new OpenLayers.Size(size,15))
    }

    function onFeatureUnselect(feature) {
		previousFeature	= feature;
        //map.removePopup(feature.popup);
        //feature.popup.destroy();
        //feature.popup = null;
    }

	function init(){

		// Customize the values below to change the tileset.
		// This information is available on each tileset page.
		var layername = 'world-light';
		var file_extension = 'png';
		var lat = 38.890000;
		var lon = -77.020000;
		var zoom = 3;		

		// Build the map
		var options = {
	//		projection: new OpenLayers.Projection("EPSG:900913"),
			projection: new OpenLayers.Projection("EPSG:900913"),
			displayProjection: new OpenLayers.Projection("EPSG:4326"),
	//		units: "m",
//			numZoomLevels: 12,
//			maxResolution: 156543.0339,
//			zoomTo: 5,
			minResolution: "auto",
			minExtent: new OpenLayers.Bounds(-1, -1, 1, 1),
			maxResolution: "auto",
			maxExtent: new OpenLayers.Bounds(-180, -90, 180, 90),
/*			maxExtent: new OpenLayers.Bounds(
				-20037500,
				-20037500,
				20037500,
				20037500
				-180, -90, 180, 90
			)*/
		};
		
		map = new OpenLayers.Map('map', options);

		var NASAwms = new OpenLayers.Layer.WMS( "NASA WMS",
					"http://wms.jpl.nasa.gov/wms.cgi?", {layers: 'BMNG',
						format: 'image/png'},
					{isBaseLayer: true});

				var USGSwms = new OpenLayers.Layer.WMS ("USGS WMS",
					"http://toposervices.cr.usgs.gov/wmsconnector/com.esri.wms.Esrimap/USGS_EDNA_geo?",
					{layers: 'States_Generalized', format: 'image/png', transparent: true},
					{isBaseLayer:false});

				map.addLayer(NASAwms);
				map.addLayer(USGSwms);

				map.setCenter(new OpenLayers.LonLat(lon, lat), zoom);

		// Layer definitions
/*		var layer = new OpenLayers.Layer.TMS(
			"MapBox Layer",
			[ "http://a.tile.mapbox.com/","http://b.tile.mapbox.com/",
			"http://c.tile.mapbox.com/","http://d.tile.mapbox.com/" ],
			{ 'layername': layername, 'type': file_extension }
		);
*/
		// Add layers to the map
		/*map.addLayers([ layer ]);*/

		// Set the map's initial center point


	//	map.setCenter(new OpenLayers.LonLat(0, 0), 1);
	/*	//map.setCenter(new OpenLayers.LonLat(10037500, 10037500), 1);
		map.setCenter(new OpenLayers.LonLat(lat, lon));
*/
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
				foreach ($posts as $post) {
					$post_id = $post->ID;
					$post_permalink = get_permalink( $post->ID );
					$permalink = "'$post_permalink'";
					$title = "'$post->post_title'";
					$title = addslashes($title);
					$latitude = get_post_meta( $post_id, 'ch_latitude', 'true' );
					$longitude = get_post_meta( $post_id, 'ch_longitude', 'true' );
					if ( $latitude AND $longitude ) {
						$values = array( $latitude, $longitude, $post_id, $title, $permalink );
						$valueList = implode( ', ', $values );
						$func = "\"addCircleToMap($valueList)\", ";
						echo $func;
					}
				}
			}
			wp_reset_query();
		?>
	];

	function addCircleToMap(latitude, longitude, post_id, post_title, post_permalink) {
		var epsg4326 = new OpenLayers.Projection("EPSG:4326");
		var centre = new OpenLayers.Geometry.Point(longitude, latitude);
		centre.transform(epsg4326, map.getProjectionObject());
		
		var zoom = map.getZoom();
		var size = 500000 / (zoom * 1.5);
		
		var circle = OpenLayers.Geometry.Polygon.createRegularPolygon(centre, size, 50);
		
		var properties =  {post_id: post_id, post_title: post_title, post_permalink: post_permalink};
		
		vectorLayer.addFeatures(new OpenLayers.Feature.Vector(circle, properties));
	}

	jQuery(document).ready(function() {
		init();
		
		addAllFeatures();
	});
	
</script>

<?php /*?><div id="map" name="map" style="width: 538px; height: 324px; margin-bottom: 25px;"></div>										
<?php */?>						<div class="entry-content" style="padding-top: 24px;">
							<?php the_content(); ?>
						</div>
						<?php
							$slug = basename(get_permalink());
							$loop = new WP_Query( array(
								'post_type'			=>	'map_post',
								'orderby'			=> 'menu_order',
								'order'				=> 'ASC',
								'category_name'		=>	$slug ) );
							while ( $loop->have_posts() ) : $loop->the_post(); ?> 
								<div class="project-item">			
									<h2 id="<?php the_id(); ?>" name="<?php the_id(); ?>" ><?php the_title(); ?></h2><?php
									$map_date = get_post_meta($post->ID, 'map_date', TRUE);
									if ( $map_date ) {
										echo '<div class="map_date"><strong>' .$map_date. '</strong></div>';
									}?>														
									<?php the_content(); ?>
								</div>
							<?php endwhile;	?>					
					</div>
				</div>
				<?php get_sidebar("projects"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>