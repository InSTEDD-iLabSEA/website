<?php

$facebook_url = wp_option::factory('text', 'facebook_url', 'Facebook URL');
$facebook_url->set_default_value('http://facebook.com');

$twitter_username = wp_option::factory('text', 'twitter_username');
$twitter_username->set_default_value('instedd');

$youtube_url = wp_option::factory('text', 'youtube_url', 'YouTube URL');
$youtube_url->set_default_value('http://youtube.com/');

$flickr_url = wp_option::factory('text', 'flickr_url', 'Flickr URL');
$flickr_url->set_default_value('http://flickr.com/');

$slideshare_url = wp_option::factory('text', 'slideshare_url', 'SlideShare URL');
$slideshare_url->set_default_value('http://slideshare.net/');

$opt = new OptionsPage(array(
    $facebook_url,
    $twitter_username,
    $youtube_url,
    $flickr_url,
    $slideshare_url,
));
$opt->title = 'Social';

$opt->file = basename(__FILE__);
$opt->parent = "theme-options.php";
$opt->attach_to_wp();
?>
