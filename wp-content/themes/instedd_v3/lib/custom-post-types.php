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
		'supports' => array('title', 'editor')
	); 
	
	register_post_type('slide', $slider_args);
	
	//Press Releases
	$press_releases_labels = array(
		'name' => 'Press',
		'singular_name' => 'Press',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Press Link',
		'edit_item' => 'Edit Press Link',
		'new_item' => 'New Press Link',
		'view_item' => 'View Press Link',
		'search_items' => 'Search Press Links',
		'not_found' => 'No press links found',
		'not_found_in_trash' => 'No press links found in Trash', 
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
		'exclude_from_search' => true,
		'menu_position' => null,
		'supports' => array('title'),
		'taxonomies' => 'post_tag'		
	); 
	
	register_post_type('press-release', $press_releases_args);
	register_taxonomy_for_object_type('post_tag', 'press-release');	
	
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
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'rewrite' => array( 'slug' => 'news-media/video' ),
		'taxonomies' => array('post_tag')
	); 
	
	register_post_type('video', $video_args);
	register_taxonomy_for_object_type('post_tag', 'video');	
	
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
		'supports' => array('title', 'thumbnail', 'excerpt' ),
		'rewrite' => array( 'slug' => 'news-media/presentations' ),
		'taxonomies' => 'post_tag'				
	); 
	
	register_post_type('presentation', $presentation_args);
	register_taxonomy_for_object_type('post_tag', 'presentation');		

	//Publication
	$publication_labels = array(
		'name' => 'Publications',
		'singular_name' => 'Publication',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Publication',
		'edit_item' => 'Edit Publication',
		'new_item' => 'New Publication',
		'view_item' => 'View Publication',
		'search_items' => 'Search Publications',
		'not_found' => 'No publications found',
		'not_found_in_trash' => 'No publications found in Trash', 
		'parent_item_colon' => '',
		'taxonomies' => 'post_tag'			
	);
	
	$publication_args = array(
		'labels' => $publication_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'excerpt'),
		'rewrite' => array( 'slug' => 'news-media/publications' )		
	); 
	
	register_post_type('publication', $publication_args);
	register_taxonomy_for_object_type('post_tag', 'publication');		

	//Network
	$network_labels = array(
		'name' => 'Network',
		'singular_name' => 'Network',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Network Item',
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
		//'exclude_from_search' => true,
		'show_ui' => true, 
		'query_var' => true,
		'_edit_link' =>  'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor')
	); 
	
	register_post_type('network', $Network_args);	
	register_taxonomy_for_object_type( 'network_group', 'network');		

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
		'parent_item_colon' => '',
		'taxonomies' => 'post_tag'				
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
		'supports' => array('title','editor'),
		'can_export' => true,
	); 
	
	register_post_type('event', $event_args);
	register_taxonomy_for_object_type('post_tag', 'event');		

	// Enable tags on pages
	register_taxonomy_for_object_type('post_tag', 'page');	
}

add_action('init', 'create_custom_types', 0);

?>