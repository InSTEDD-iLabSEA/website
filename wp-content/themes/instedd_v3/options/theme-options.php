<?php
function attach_main_options_page() {
	$title = "Theme Options";
	add_menu_page(
		$title,
		$title, 
		'edit_themes', 
	    basename(__FILE__),
		create_function('', '')
	);
}
add_action('admin_menu', 'attach_main_options_page');

$homepage_instedd_description = wp_option::factory('textarea', 'homepage_instedd_description', 'Homepage InSTEDD Description');
$homepage_instedd_description->set_default_value('At <strong>InSTEDD</strong>, we envision a world where communities everywhere design and use technology to continuously improve their health, safety and development.');

$homepage_column1_title = wp_option::factory('text', 'homepage_column1_title', 'Homepage Column 1 Title');
$homepage_column1_title->set_default_value('In Our Own Words');

$homepage_column2_title = wp_option::factory('text', 'homepage_column2_title', 'Homepage Column 2 Title');
$homepage_column2_title->set_default_value('iLabs');

$homepage_column3_title = wp_option::factory('text', 'homepage_column3_title', 'Homepage Column 3 Title');
$homepage_column3_title->set_default_value('What\'s Happening');

/*$donate_button_url = wp_option::factory('text', 'donate_button_url', 'Donate Button URL');
$donate_button_url->set_default_value('#');

*/$remote_blog_rss_url = wp_option::factory('text', 'remote_blog_rss_url', 'Tracker RSS URL');
$remote_blog_rss_url->set_default_value('http://trackerblog.trackernews.net/feed/');

$inner_options = new OptionsPage(array(
	$homepage_instedd_description,
	$homepage_column1_title,	
	$homepage_column2_title,	
	$homepage_column3_title,	
	//$donate_button_url,
	$remote_blog_rss_url,
    wp_option::factory('header_scripts', 'header_script'),
    wp_option::factory('footer_scripts', 'footer_script'),
));
$inner_options->title = 'General';
$inner_options->file = basename(__FILE__);
$inner_options->parent = "theme-options.php";
$inner_options->attach_to_wp();
?>