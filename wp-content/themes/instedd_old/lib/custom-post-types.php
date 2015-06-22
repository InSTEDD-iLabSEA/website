<?php

function create_custom_types() {
	//Main Slider
	$slider_labels = array(
		'name' => 'Main Slider',
		'singular_name' => 'Slide',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Slide',
		'edit_item' => 'Edit Slide',
		'new_item' => 'New Slide',
		'view_item' => 'View Slide',
		'search_items' => 'Search Slides',
		'not_found' => 'No slides found',
		'not_found_in_trash' => 'No slides found in Trash', 
		'parent_item_colon' => ''
	);
	
	$slider_args = array(
		'labels' => $slider_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'page-attributes', 'editor')
	); 
	
	register_post_type('slide', $slider_args);
	
	//Box Slider
	$box_slider_labels = array(
		'name' => 'Box Slider',
		'singular_name' => 'Slide',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Slide',
		'edit_item' => 'Edit Slide',
		'new_item' => 'New Slide',
		'view_item' => 'View Slide',
		'search_items' => 'Search Slides',
		'not_found' => 'No slides found',
		'not_found_in_trash' => 'No slides found in Trash', 
		'parent_item_colon' => ''
		
	);
	
	$box_slider_args = array(
		'labels' => $box_slider_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'page-attributes')
	); 
	
	register_post_type('box-slide', $box_slider_args);
	
	//Press Releases
	$press_releases_labels = array(
		'name' => 'Press',
		'singular_name' => 'Press',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Press Release',
		'edit_item' => 'Edit Press Release',
		'new_item' => 'New Press Release',
		'view_item' => 'View Press Release',
		'search_items' => 'Search Press Releases',
		'not_found' => 'No press releases found',
		'not_found_in_trash' => 'No press releases found in Trash', 
		'parent_item_colon' => ''
	);
	
	$press_releases_args = array(
		'labels' => $press_releases_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'page-attributes')
	); 
	
	register_post_type('press-release', $press_releases_args);
	
	//Videos
	$video_labels = array(
		'name' => 'Videos',
		'singular_name' => 'Video',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Video',
		'edit_item' => 'Edit Video',
		'new_item' => 'New Video',
		'view_item' => 'View Video',
		'search_items' => 'Search Videos',
		'not_found' => 'No videos found',
		'not_found_in_trash' => 'No videos found in Trash', 
		'parent_item_colon' => ''
	);
	
	$video_args = array(
		'labels' => $video_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor')
	); 
	
	register_post_type('video', $video_args);
	
	//Presentation
	$presentation_labels = array(
		'name' => 'Presentations',
		'singular_name' => 'Presentation',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Presentation',
		'edit_item' => 'Edit Presentation',
		'new_item' => 'New Presentation',
		'view_item' => 'View Presentation',
		'search_items' => 'Search Presentations',
		'not_found' => 'No presentations found',
		'not_found_in_trash' => 'No presentations found in Trash', 
		'parent_item_colon' => ''
	);
	
	$presentation_args = array(
		'labels' => $presentation_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor')
	); 
	
	register_post_type('presentation', $presentation_args);

//network
	$network_labels = array(
		'name' => 'Network',
		'singular_name' => 'Network',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Item',
		'edit_item' => 'Edit Network Item',
		'new_item' => 'New network',
		'view_item' => 'View network',
		'search_items' => 'Search the Network',
		'not_found' => 'No Items have been added to the network',
		'not_found_in_trash' => 'No network items found in Trash', 
		'parent_item_colon' => ''
	);
	
	$Network_args = array(
		'labels' => $network_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor')
	); 
	
	register_post_type('Network', $Network_args);	

	//Timeline Events
	$event_labels = array(
		'name' => 'Timeline',
		'singular_name' => 'Event',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Event',
		'edit_item' => 'Edit Event',
		'new_item' => 'New Events',
		'view_item' => 'View Event',
		'search_items' => 'Search Events',
		'not_found' => 'No Events found',
		'not_found_in_trash' => 'No Events found in Trash', 
		'parent_item_colon' => ''
	);
	
	$event_args = array(
		'labels' => $event_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'rewrite' => array(
			"slug" => "event",
			"with_front" => true,
		),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor', 'page-attributes'),
		'can_export' => true,
	); 
	
	register_post_type('event', $event_args);

}

add_action('init', 'create_custom_types', 0);

?>