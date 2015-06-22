<?php
/* template name: map */
 get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content press left">
					<h2><?php the_title(); ?></h2>
					<div class="item">
				<!--start map -->
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
		
		var size = title.length * 7;
		var style = "background:#F5F5F5; padding:4px 5px; font-family: Helvetica, Arial, sans-serif; font-size:11px; font-weight:bold; display:table-cell; overflow: hidden; text-align: center"

		popup = new OpenLayers.Popup.AnchoredBubble(		
		//popup = new OpenLayers.Popup.FramedCloud(
								"info-popup",
								feature.geometry.getBounds().getCenterLonLat(),
								new OpenLayers.Size(size,20), // width, height
 								"<div style='" + style + "' onClick='setPosition("+id+")'>" + title + "</div>",
								null, 
								false,
								onPopupClose);

		popup.autoSize = true;
		popup.setBackgroundColor('#F5F5F5');

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
			$args = array('post_type' => 'map_post'); 
			$posts = get_posts($args);
			if ($posts) {
				foreach ($posts as $post) {
					$post_id = $post->ID;
					$title = "'$post->post_title'";
					$latitude = get_post_meta( $post_id, 'ch_latitude', 'true' );
					$longitude = get_post_meta( $post_id, 'ch_longitude', 'true' );
					$values = array( $latitude, $longitude, $post_id, $title );
					$valueList = implode( ', ', $values );
					$func = "\"addCircleToMap($valueList)\", ";
					echo $func;
				}
			}
		?>
	];

	function addCircleToMap(latitude, longitude, post_id, post_title) {
		var epsg4326 = new OpenLayers.Projection("EPSG:4326");
		var centre = new OpenLayers.Geometry.Point(longitude, latitude);
		centre.transform(epsg4326, map.getProjectionObject());
		
		var zoom = map.getZoom();
		var size = 500000 / (zoom * 1.5);
		
		var circle = OpenLayers.Geometry.Polygon.createRegularPolygon(centre, size, 50);
		
		var properties =  {post_id: post_id, post_title: post_title};
		
		vectorLayer.addFeatures(new OpenLayers.Feature.Vector(circle, properties));
	}

	jQuery(document).ready(function() {
		init();
		
		addAllFeatures();
	});
	
</script>

  <!--   <div id="map" name="map" style="width: 500px; height: 300px"></div> -->
  <img src="/wp-content/uploads/2010/12/InSTEDD_Map.jpg" width="600">

<div>
	
<p></p>
<h1>Our Projects: </h1>
<?php
	$loop = new WP_Query( array('post_type'=>'map_post') );

	while ( $loop->have_posts() ) : $loop->the_post();
?>  <br/><br/>
	<h3 id="<?php the_id(); ?>" name="<?php the_id(); ?>" ><?php the_title(); ?></h3>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<a href="#" onClick="window.location.hash = 'map'">Back to Top</a>
<?php
	endwhile;
?>

</div>
					
					<!--end map --> 
					
					</div>
				</div>
				<?php get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>