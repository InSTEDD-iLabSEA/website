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

$donate_button_url = wp_option::factory('text', 'donate_button_url', 'Donate Button URL');
$donate_button_url->set_default_value('#');

$remote_blog_rss_url = wp_option::factory('text', 'remote_blog_rss_url', 'Blog RSS URL');
$remote_blog_rss_url->set_default_value('http://trackerblog.trackernews.net/feed/');

$inner_options = new OptionsPage(array(
	$donate_button_url,
	$remote_blog_rss_url,
    wp_option::factory('header_scripts', 'header_script'),
    wp_option::factory('footer_scripts', 'footer_script'),
));
$inner_options->title = 'General';
$inner_options->file = basename(__FILE__);
$inner_options->parent = "theme-options.php";
$inner_options->attach_to_wp();

?>