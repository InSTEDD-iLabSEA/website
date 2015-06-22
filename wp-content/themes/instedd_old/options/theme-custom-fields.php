<?php
//Main Slider
$main_slide_panel =& new ECF_Panel('main-slide-panel', 'Slide Settings', 'slide', 'normal', 'high');

$main_slide_image = ECF_Field::factory('image', 'slide_image', 'Image');
$main_slide_image->help_text('Size must be 959 x 405px.');
$main_slide_image->set_size(959, 405);

$main_slide_panel->add_fields(array(
	$main_slide_image,
));

//Box Slider
$box_slide_panel =& new ECF_Panel('box-slide-panel', 'Slide Settings', 'box-slide', 'normal', 'high');

$box_slide_image = ECF_Field::factory('image', 'box_slide_image', 'Image');
$box_slide_image->help_text('Size must be 280x161.');
$box_slide_image->set_size(280, 161);

$box_slide_link = ECF_Field::factory('text', 'box_slide_link', 'Link');
$box_slide_caption = ECF_Field::factory('textarea', 'box_slide_caption', 'Caption');
$box_slide_caption->help_text('No HTML.  Limit to  15-20 words (about 2 sentences)');
$box_slide_panel->add_fields(array(
$box_slide_caption,
$box_slide_link,
$box_slide_image,
));

//Posts
$post_settings_panel =& new ECF_Panel('post-settings-panel', 'Post Settings', 'post', 'normal', 'high');

/*
$post_thumb = ECF_Field::factory('image', 'post_thumb', 'Thumbnail');
$post_thumb->set_size(72, 96);
$post_thumb->help_text('Used on the home page post listing. SIze should be 72 x 96');

*/

$post_blog_image = ECF_Field::factory('image', 'post_blog_image', 'Blog Image');
$post_blog_image->set_size(234, 130); 
$post_blog_image->help_text('Used on the blog page. Size should be 234 x 130');

$post_settings_panel->add_fields(array(
/* 	$post_thumb, */
 	$post_blog_image, 
));

//Pages
$page_settings_panel =& new ECF_Panel('page-settings-panel', 'Page Settings', 'page', 'normal', 'high');

$page_preview_image = ECF_Field::factory('image', 'page_thumbnail', 'Thumbnail');
$page_preview_image->help_text('Size should be 128 x 128');
$page_preview_image->set_size(128, 128);

$page_description = ECF_Field::factory('textarea', 'page_description', 'Description');

$page_settings_panel->add_fields(array(
	$page_preview_image,
	$page_description,
));

//Press Releases
$press_releases_panel =& new ECF_Panel('press-releases-panel', 'Press Release Settings', 'press-release', 'normal', 'high');

$press_release_image = ECF_Field::factory('image', 'press_release_image', 'Image');
$press_release_image->help_text('Size should be 124 x 79.');
$press_release_image->set_size(124, 79);

$press_release_link = ECF_Field::factory('text', 'press_release_link', 'Link');

$press_releases_panel->add_fields(array(
	$press_release_image,
	$press_release_link,
));

// error starts after here

//Technology Page
$technology_page =& new ECF_Panel('technology-panel', 'Technology Settings', 'page', 'normal', 'high');
$technology_page->show_on_template('page-technology.php');

$technology_image = ECF_Field::factory('image', 'technology_image', 'Image');
$technology_startusing_signup = ECF_Field::factory('text', 'technology_startusing_signup', 'Sign Up Link');
$technology_startusing_signup->help_text('Enter the signup link for this specific technology. The signup link will appear on the sidebar for this technology page');
$technology_startusing_signin = ECF_Field::factory('text', 'technology_startusing_signin', 'Sign In Link');
$technology_startusing_signin->help_text('Enter the signin link for this specific technology. The signup link will appear on the sidebar for this technology page');

$technology_description = ECF_Field::factory('textarea', 'technology_description', 'Description');
$technology_description->help_text('The description or image for the top part of the technology page');

$technology_used_by = ECF_Field::factory('textarea', 'technology_used_by', 'Used By');
$technology_used_by->help_text('Edit the bottom widgets, displaying who has used the technology.  To set an image, type image:<url> and for the text use text:<text>');
$technology_used_by->multiply();

$technology_page->add_fields(array(
	$technology_image,
	$technology_description,
	$technology_startusing_signup,
	$technology_startusing_signin,
	$technology_used_by,
));

//Videos
$video_settings_panel =& new ECF_Panel('video-panel', 'Video Settings', 'video', 'normal', 'high');

$video_url = ECF_Field::factory('text', 'video_url', 'Youtube Video URL');
/* $video_topics = ECF_Field::factory('textarea', 'video_topics', 'Topics'); */

$video_settings_panel->add_fields(array(
	$video_url,
/* 	$video_topics, */
));

//Presentations
$presentation_settings_panel =& new ECF_Panel('presentation-panel', 'Presentation Settings', 'presentation', 'normal', 'high');

$presentation_embed = ECF_Field::factory('textarea', 'presentation_embed', 'Embedcode');
$presentation_embed->help_text('Make sure to change the width and height in the embed code so it is 327x269px.  You will have to change this in a few different places');
$presentation_topics = ECF_Field::factory('textarea', 'presentation_topics', 'Topics');
$presentation_thumb = ECF_Field::factory('image', 'presentation_thumb', 'Thumbnail');
$presentation_thumb->set_size(115, 95);

$presentation_settings_panel->add_fields(array(
	$presentation_embed,
	$presentation_topics,
	$presentation_thumb,
));

//Network
$network_settings_panel =& new ECF_Panel('network-panel', 'Image & Link', 'Network', 'normal', 'high');

$network_link = ECF_Field::factory('text', 'network_link', 'Link');
$network_image = ECF_Field::factory('image', 'network_image', 'Network Item Image');
$network_image->set_size(150, 0);
$network_image->help_text('Size should be  150px wide.');
$network_settings_panel->add_fields(array(
	$network_link,
	$network_image,
));

/* add_action( 'init', 'build_taxonomies', 0 );   */
register_taxonomy(
	'Network Type',
	'Network',
	array(
		'hierarchical' => true,
		'label' => 'Network Item Category',
		'query_var' => true,
		'rewrite' => true
	)
);

//Events
$event_settings_panel =& new ECF_Panel('event-panel', 'Event Settings', 'event', 'normal', 'high');
$event_years= array();
for($i = 2000; $i <= date('Y'); $i++) {
	$event_years[$i] = $i;
}
/*
$event_month = array(
                    'January' => 'January',
                    'February' => 'February',
                    'March' => 'March',
                    'April' => 'April',
                    'May' => 'May',
                    'June' => 'June',
                    'July' => 'July',
                    'August' => 'August',
                    'September' => 'September',
                    'October' => 'October',
                    'November' => 'November',
                    'December' => 'December' );
/*
$event_month= array();
for($i = 'January'; $i <= date('F'); $i++) {
       $event_month[$i] = $i;
}
*/

$event_year = ECF_Field::factory('select', 'event_year', 'Year');
$event_year->add_options($event_years);
$event_month = ECF_Field::factory('select', 'event_month', 'Month');
$event_month->add_options($event_month);


$event_icon = ECF_Field::factory('image', 'event_icon', 'Icon');
$event_icon->set_size(140, 0);

$event_settings_panel->add_fields(array(
	$event_year,
	$event_icon,
//	$event_month,
));
?>