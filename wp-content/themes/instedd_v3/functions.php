<?php
//update_option('siteurl','http://www.ilabsoutheastasia.org');
//update_option('home','http://www.ilabsoutheastasia.org');

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );

register_nav_menus( array(
	'main-menu'=>__('Main Menu'),
));

register_sidebar( array(
	'name' => 'General Sidebar',
	'id' => 'general-sidebar',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

/*register_sidebar(array(
	'name' => 'Default Sidebar',
	'id' => 'default-sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
));
*/register_sidebar( array(
	'name' => 'Secondary Menu',
	'id' => 'secondary-menu',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
));

register_sidebar( array(
	'name' => 'Tertiary Menu',
	'id' => 'tertiary-menu',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
));

register_sidebar( array(
	'name' => 'Home: Column 1',
	'id' => 'home-column1',
    'before_widget' => '<div id="%1$s" class="widget box %2$s home-column1">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
));

register_sidebar( array(
	'name' => 'Home: Column 2',
	'id' => 'home-column2',
    'before_widget' => '<div id="%1$s" class="widget box %2$s home-column2">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
));

register_sidebar( array(
	'name' => 'Home: Column 3',
	'id' => 'home-column3',
    'before_widget' => '<div id="%1$s" class="widget box %2$s home-column3">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
));

register_sidebar( array(
	'name' => 'Sidebar: Press',
	'id' => 'sidebar-press',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Blog',
	'id' => 'sidebar-blog',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Blog Post',
	'id' => 'sidebar-blog-post',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Publications',
	'id' => 'sidebar-publications',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Video',
	'id' => 'sidebar-video',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Photos',
	'id' => 'sidebar-photos',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Presentations',
	'id' => 'sidebar-presentations',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Team',
	'id' => 'sidebar-team',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: iLabs',
	'id' => 'sidebar-ilabs',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: iLabs | SE Asia',
	'id' => 'sidebar-ilabs-se-asia',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: iLabs | Latin Am',
	'id' => 'sidebar-ilabs-latin-am',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Technologies',
	'id' => 'sidebar-technologies',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: About Us',
	'id' => 'sidebar-about-us',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: About Us | Guiding',
	'id' => 'sidebar-about-us-guiding',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Our Work | Approach',
	'id' => 'sidebar-our-work-approach',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Our Work | Consulting',
	'id' => 'sidebar-our-work-consulting',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Our Work | Projects',
	'id' => 'sidebar-our-work-projects',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Contact Us',
	'id' => 'sidebar-contact-us',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="title-case">',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Donate',
	'id' => 'sidebar-donate',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar( array(
	'name' => 'Sidebar: Images',
	'id' => 'sidebar-images',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));



//include_once('lib/twitter/versions-proxy.php');
include_once('lib/hacks.php');
include_once('lib/video-functions.php');
include_once('lib/common.php');
include_once('lib/user-functions.php');
include_once('lib/custom-post-types.php');
include_once('lib/shortcodes.php');
include_once('lib/pps.php');

include_once('lib/enhanced-custom-fields/enhanced-custom-fields.php');
include_once('options/theme-custom-fields.php');

function attach_theme_options() {
	include_once('lib/theme-options/theme-options.php');
	include_once('options/theme-options.php');
	include_once('options/social-options.php');	
	
	include_once('lib/custom-widgets/widgets.php');
	include_once('options/theme-widgets.php');
}

attach_theme_options();

/**
 * Shortcut function for acheiving
 * $no_nav_pages = _get_page_by_name('no-nav-pages');
 * wp_list_pages('sort_column=menu_order&exclude_tree=' . $no_nav_pages->ID);
 * with:
 * wp_list_pages('sort_column=menu_order&' . exclude_no_nav());
 */
function exclude_no_nav($no_nav_pages_slug='no-nav-pages') {
    $no_nav_page = _get_page_id_by_name($no_nav_pages_slug);
    return "exclude_tree=$no_nav_page";
}

/**
 * Checks if particular page ID has parent with particular slug
 */
$__has_parent_depth = 0;
function has_parent($id, $parent_name) {
    global $__has_parent_depth;
    $__has_parent_depth++;
    if ($__has_parent_depth==100) {
    	exit('too much recursion');
    }
    $post = get_post($id);
    
    if ($post->post_name==$parent_name) {
    	return true;
    }
    if ($post->post_parent==0) {
    	return false;
    }
    $__has_parent_depth--;
    return has_parent($post->post_parent, $parent_name);
}

/**
 * Example function for printing comments
 */
function print_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
		    <div class="comment-author vcard">
		        <?php echo get_avatar($comment, 48); ?>
		        <?php comment_author_link() ?>
		        <span class="says">says:</span>
		    </div>
		    <?php if ($comment->comment_approved == '0') : ?>
		        <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
		    <?php endif; ?>
		
		    <div class="comment-meta commentmetadata">
		    	<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		    		<?php comment_date() ?> at <?php comment_time() ?>
		    	</a>
		    	<?php edit_comment_link(__('(Edit)'),'  ','') ?>
	    	</div>
	
		    <?php comment_text() ?>
	
		    <div class="reply">
		        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		    </div>
		</div>
	<?php
}

define('STR_WORD_COUNT_FORMAT_ADD_POSITIONS', 2);
/**
 * >>> shortalize('lorem ipsum dolor sit amet');
 * ... lorem ipsum dolor sit amet
 * >>> shortalize('lorem ipsum dolor sit amet', 5);
 * ... lorem ipsum dolor sit amet
 * >>> shortalize('lorem ipsum dolor sit amet', 4);
 * ... lorem ipsum dolor sit...
 * >>> shortalize('lorem ipsum dolor sit amet', -1);
 */
function shortalize($input, $words_limit=15, $strip_tags = true, $end = '...') {
	if ($strip_tags) {
		$input = strip_tags($input);
	}
    $words_limit = abs(intval($words_limit));
    if ($words_limit==0) {
        return $input;
    }
    $words = str_word_count($input, STR_WORD_COUNT_FORMAT_ADD_POSITIONS);
    if (count($words)<=$words_limit + 1) {
        return $input;
    }
    $loop_counter = 0;
    foreach ($words as $word_position => $word) {
        $loop_counter++;
        if ($loop_counter==$words_limit + 1) {
            return substr($input, 0, $word_position) . $end;
        }
    }
}

# crawls the pages tree up to top level page ancestor 
# and returns that page as object
function get_page_ancestor($page_id) {
    $page_obj = get_page($page_id);
    while($page_obj->post_parent!=0) {
        $page_obj = get_page($page_obj->post_parent);
    }
    return get_page($page_obj->ID);
}

# example function for filtering page template
function filter_template_name() {
    global $post;
    
	$page_tpl = get_post_meta($post->ID, '_wp_page_template', 1);
	
	if ($page_tpl!="default") {
		return TEMPLATEPATH . '/' . $page_tpl;
	}
    /*
	# example logic here ... 
    $page_ancestor = get_page_ancestor($post->ID);
    
    if ($page_ancestor->post_name!='pages-branch-name') {
    	return TEMPLATEPATH . "/my-branch-template.php";
    }
    
    return TEMPLATEPATH . "/page.php";
    */
}
// add_filter('page_template', 'filter_template_name');

# shortcut for get_post_meta. Returns the string value 
# of the custom field if it exist. 
# second arg is required if you're not in the loop
function get_meta($key, $id=null) {
	if (!isset($id)) {
	    global $post;
	    if (empty($post->ID)) {
	    	return null;
	    }
	    $id = $post->ID;
    }
    return get_post_meta($id, $key, true);
}

/**
 * Returns posts page as object (setuped from Settings > Reading > Posts Page).
 *
 * If the page for posts is not chosen null is returned
 */
function get_posts_page() {
    $posts_page_id = get_option('page_for_posts');
    if ($posts_page_id) {
    	return get_page($posts_page_id);
    }
    return null;
}

/**
 * Parses custom field values to hash array. Expected 
 * custom field value format:
 * {{{
 * title: my cool title
 * image: http://example.com/images/1.jpg
 * caption: my cool image
 * }}}
 * Returned array looks like:
 * array(
 *     'title'=>'my cool title',
 *     'image'=>'http://example.com/images/1.jpg',
 *     'caption'=>'my cool image',
 * )
 */
function parse_custom_field($details) {
    $lines = array_filter(preg_split('~\r|\n~', $details));
    $res = array();
    foreach ($lines as $line) {
        if(!preg_match('~(.*?):(.*)~', $line, $pieces)) {
            continue;
        }
        $label = trim($pieces[1]);
        $val = trim($pieces[2]);
        $res[$label] = $val;
    }
    return $res;
}

function get_page_id_by_path($page_path) {
    $p = get_page_by_path($page_path);
    if (empty($p)) {
    	return null;
    }
    return $p->ID;
}

function get_page_permalink_by_path($page_path) {
    $p = get_page_by_path($page_path);
    if (empty($p)) {
    	return '';
    }
    return get_permalink($p->ID);
}

/*
PHP 4.2.x Compatibility function
http://www.php.net/manual/en/function.file-get-contents.php#80707
*/
if (!function_exists('file_get_contents')) {
	function file_get_contents($filename, $incpath = false, $resource_context = null) {
		if (false === $fh = fopen($filename, 'rb', $incpath)) {
			trigger_error('file_get_contents() failed to open stream: No such file or directory', E_USER_WARNING);
			return false;
		}
		
		clearstatcache();
		if ($fsize = @filesize($filename)) {
			$data = fread($fh, $fsize);
		} else {
			$data = '';
			while (!feof($fh)) {
				$data .= fread($fh, 8192);
			}
		}
		
		fclose($fh);
		return $data;
	}
}


function _print_ie6_styles() {
    $ie_css_file = dirname(__FILE__) . '/ie6.css';
    
	if (!file_exists($ie_css_file)) {
    	return;
    }
    $ie6_hacks = file_get_contents($ie_css_file);
    if (empty($ie6_hacks)) {
    	return;
    }
    
    echo '
<!--[if IE 6]>
<style type="text/css" media="screen">';
    echo "\n\n" . str_replace(
    	'css/images/', 
    	get_bloginfo('stylesheet_directory') . '/images/', 
    	$ie6_hacks
    );
    echo '

</style>
<![endif]-->';
}
add_action('wp_head', '_print_ie6_styles');

function get_upload_dir() {
	$updir = wp_upload_dir();
	return $updir['basedir'];
}


function get_upload_url() {
	$updir = wp_upload_dir();
	return $updir['baseurl'];
}


/*
Return an array containing all images (obejcts) attached to a post.
	thumb_url = image thumbnail url
	full_url = full sized image url
*/
function get_post_images($post_id) {
    $images = get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post_id);
    foreach ($images as $index => $i) {
	    $images[$index]->thumb_url = wp_get_attachment_thumb_url($i->ID);
	    $images[$index]->full_url = wp_get_attachment_url($i->ID);
	    $src = wp_get_attachment_image_src($i->ID, 'medium');
	    $images[$index]->medium_url = $src[0];
	}
    return $images;
}


// Shortcut function for outputting page permalinks. Example: <?php permapath('about/our-company');
function permapath($path, $echo = true) {
	$permalink = get_permalink(get_page_id_by_path($path));
	if ($echo) {
		echo $permalink;
	}
	return $permalink;
}

// Main slideshow on homepage
function main_home_slider() {
	$posts = get_posts('post_type=slide&showposts=-1&orderby=menu_order&order=ASC');
	$filtered_posts = array();
	foreach ($posts as $p) {
		$img = get_meta('slide_home-slider_thumbnail_id', $p->ID);
		if ($img) {
			$filtered_posts[] = $p;
		}
	}
	if ($filtered_posts):
		$loopID = 0;
		?>
		<div class="image-slider">
		<?php foreach ($filtered_posts as $p): $img = get_meta('slide_home-slider_thumbnail_id', $p->ID); $url = get_meta('_slide_url', $p->ID); $loopID++;?>
			<a href="<?php echo $url;?>">
<img src="<?php echo wp_get_attachment_url( $img ); ?>" alt="" title="#htmlcaption<?php echo $loopID;?>" /></a>
		<?php endforeach; ?>
		</div>
		<?php 
			$loopID = 0;
			foreach ($filtered_posts as $p):  $url = get_meta('_slide_url', $p->ID); $loopID++;?>
			 <div id="htmlcaption<?php echo $loopID;?>" class="nivo-html-caption">
			 	<a href="<?php echo $url;?>"><?php echo apply_filters('the_content', $p->post_content); ?></a>
			</div>
		<?php endforeach;?>
	<?php endif;
}


function filter_excerpt_length($length) {
	return 16;
}
add_filter('excerpt_length', 'filter_excerpt_length', 999);


function filter_the_excerpt($excerpt) {
	global $post;
	$excerpt = str_replace('[...]', '...', $excerpt);
	if ( !is_search() ) {
		return $excerpt . ' <a href="' . get_permalink() . '">Read&nbsp;more&nbsp;&raquo;</a>';
	} else {
		// Don't add to search result pages
		return $excerpt;	
	}
}
add_filter('get_the_excerpt', 'filter_the_excerpt');


function get_posts_from_rss($rss_url, $count = 3) {
	$cache_lifetime = 60 * 60;
	$cache_key = md5("cache::rss::$rss_url");
	$cached = get_option($cache_key, -1);
	$has_cache = $cached!==-1;
	$cache_expired = $has_cache && $cached['expires'] < time();
	if (!$has_cache || $cache_expired) {
		$xml_response = wp_remote_get($rss_url);
		$xml_string = $xml_response['body'];
		update_option($cache_key, array(
			'expires'=>time() + $cache_lifetime, 
			'string'=>$xml_string
		));
	} else {
		$xml_string = $cached['string'];
	}
	
	$doc = new DOMDocument();
	$doc->loadXML($xml_string);
	
	$posts = array();
	
	$i = 0;
	$entries = $doc->getElementsByTagName('item');
	foreach ($entries as $node) {
		$i++;
		
		$media = $node->getElementsByTagNameNS('http://search.yahoo.com/mrss/', 'content');
		
		$item = array(
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
		    'media' => $media->item($media->length - 1)->getAttribute('url'),
			);
		$posts[] = $item;
		if ($i == $count) {
			break;
		}
	}
	
	return $posts;
}




// Register the 'map post' type and add custom meta boxes for latitude and longitude
add_action( 'init', 'MapPostsInit' );
function MapPostsInit() { global $map_posts; $map_posts = new MapPosts(); }

class MapPosts {

	function MapPosts() {
		
		//Map Posts
		$map_post_labels = array(
			'name' => 'Map Posts',
			'singular_name' => 'Map Post',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Map Post',
			'edit_item' => 'Edit Map Post',
			'new_item' => 'New Map Posts',
			'view_item' => 'View Map Posts',
			'search_items' => 'Search Map Posts',
			'not_found' => 'No Map Posts found',
			'not_found_in_trash' => 'No Map Posts found in Trash', 
			'parent_item_colon' => ''			
		);
		
		$map_post_args = array(
			'labels' => $map_post_labels,
			'public' => true,
			'publicly_queryable' => true,
			//'exclude_from_search' => true,
			'show_ui' => true, 
			'query_var' => true,
			'_edit_link' =>  'post.php?post=%d',
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor'),
			'rewrite' => array('slug'=>'map')
		); 
		
		register_post_type('map_post', $map_post_args);	
	//	register_taxonomy_for_object_type('post_tag', 'map_post');		
		register_taxonomy_for_object_type('category', 'map_post');		
		
		add_action("admin_init", array(&$this, "admin_init"));
		add_action('save_post', array(&$this, 'save_post_data'));
	}

	function admin_init(){
		add_meta_box("latitude-meta", "Latitude", array(&$this, "latitude_meta_box"), "map_post", "normal", "high");
		add_meta_box("longitude-meta", "Longitude", array(&$this, "longitude_meta_box"), "map_post", "normal", "high");		
		add_meta_box("map-date-meta", "Date", array(&$this, "map_date_meta_box"), "map_post", "normal", "high");		
	}

	function latitude_meta_box() {
		global $post;
		$meta = get_post_meta($post->ID, 'ch_latitude', true);

		// Verify
		echo'<input type="hidden" name="ch_latitude_noncename" id="ch_latitude_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

		// Fields for data entry
	  	echo '<label for="ch_latitude" style="margin-right: 10px;">Latitude:</label>';
	  	echo '<input type="text" name="ch_latitude" value="'.$meta.'" size="50" />';
	}
	
	function longitude_meta_box() {
		global $post;
		$meta = get_post_meta($post->ID, 'ch_longitude', true);

		// Verify
		echo'<input type="hidden" name="ch_longitude_noncename" id="ch_longitude_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

		// Fields for data entry
	  	echo '<label for="ch_longitude" style="margin-right: 10px;">Longitude:</label>';
	  	echo '<input type="text" name="ch_longitude" value="'.$meta.'" size="50" />';
	}

	function map_date_meta_box() {
		global $post;
		$meta = get_post_meta($post->ID, 'map_date', true);

		// Verify
		echo'<input type="hidden" name="map_date_noncename" id="map_date_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

		// Fields for data entry
	  	echo '<label for="map_date" style="margin-right: 10px;">Date/time frame:</label>';
	  	echo '<input type="text" name="map_date" value="'.$meta.'" size="50" />';
	}

	function save_post_data( $post_id ) {
		global $post;

		// Verify
		if ( !wp_verify_nonce( $_POST["ch_latitude_noncename"], plugin_basename(__FILE__) ) ||
			 !wp_verify_nonce( $_POST["ch_longitude_noncename"], plugin_basename(__FILE__) ) ||
			 !wp_verify_nonce( $_POST["map_date_noncename"], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ))
				return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ))
				return $post_id;
		}

		$data_lat = $_POST['ch_latitude'];

		// New, Update, and Delete
		if(get_post_meta($post_id, 'ch_latitude') == "") 
			add_post_meta($post_id, 'ch_latitude', $data_lat, true);
		elseif($data_lat != get_post_meta($post_id, 'ch_latitude', true))
			update_post_meta($post_id, 'ch_latitude', $data_lat); 
		elseif($data_lat == "")
			delete_post_meta($post_id, 'ch_latitude', get_post_meta($post_id, 'ch_latitude', true));
		
		$data_long = $_POST['ch_longitude'];

		// New, Update, and Delete
		if(get_post_meta($post_id, 'ch_longitude') == "") 
			add_post_meta($post_id, 'ch_longitude', $data_long, true);
		elseif($data_long != get_post_meta($post_id, 'ch_longitude', true))
			update_post_meta($post_id, 'ch_longitude', $data_long); 
		elseif($data_long == "")
			delete_post_meta($post_id, 'ch_longitude', get_post_meta($post_id, 'ch_longitude', true));	

		$data_map_date = $_POST['map_date'];

		// New, Update, and Delete
		if(get_post_meta($post_id, 'map_date') == "") 
			add_post_meta($post_id, 'map_date', $data_map_date, true);
		elseif($data_map_date != get_post_meta($post_id, 'map_date', true))
			update_post_meta($post_id, 'map_date', $data_map_date); 
		elseif($data_map_date == "")
			delete_post_meta($post_id, 'map_date', get_post_meta($post_id, 'map_date', true));	

	}
}


function open_first_photo_essay() {
	$photo_essays_page = get_page_by_path('multimedia/photo-essays');
	if (is_page($photo_essays_page->ID)) {
		$children = get_pages('sort_column=menu_order&parent=' . $photo_essays_page->ID . '&child_of=' . $photo_essays_page->ID);
		if ($children) {
			header('Location: ' . get_permalink($children[0]->ID));
			exit;
		}
	}
}
//add_action('template_redirect', 'open_first_photo_essay');


function addthis_share_button() {
	?>
	<!-- AddThis Button BEGIN -->
	<a class="addthis_button btn-share" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4d4ab876661ad989">Share This</a>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4d4ab876661ad989"></script>
	<!-- AddThis Button END -->
	<?php
}

function the_featured_blog_posts() {
	query_posts('showposts=-1&cat=10');
		if (have_posts()): $loopID = 0; ?>
			<?php while(have_posts()): the_post(); $loopID++; ?>
				<div class="blog-container">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="publication-author"><?php the_time('F j, Y'); ?></p>
					<?php $featured_image = get_meta('_post_featured_image'); ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo ecf_get_image_url($featured_image); ?>" alt="" style="width: 510px;"/></a>
					<?php the_excerpt(); ?>
				</div>
			<?php endwhile;
		endif;
	wp_reset_query();
}

function sort_categories_cmp($x, $y) {
	return strcmp($x->description, $y->description);
}

function sort_categories($cats) {
	usort($cats, 'sort_categories_cmp');
	return $cats;
}


// Set multiple post thumbnails
if ( class_exists('MultiPostThumbnails') ) {
	new MultiPostThumbnails(array(
		'label' => 'Home Slider',
		'id' => 'home-slider',
		'post_type' => 'slide'
		)
	);
	add_image_size('home-slider-large', 633, 320);
	
	new MultiPostThumbnails(array(
		'label' => 'Tech Thumbnail',
		'id' => 'technology-thumbnail',
		'post_type' => 'page'
		)
	);
	add_image_size('technology-thumbnail', 280, 54);
}

// Remove default featured image box from custom post types
function remove_image_box() {
	remove_meta_box( 'postimagediv', 'slide', 'side' );
}
add_action('do_meta_boxes', 'remove_image_box');

// Register JavaScripts
function js_head_load(){
	if (is_admin()) return;

	//get_bloginfo("template_url")
	$template_url = "http://instedd.org/wp-content/themes/instedd_v3";

/*	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
	wp_enqueue_script('jquery');
*/
	if ( is_front_page() ) {
		// Add Nivo Slider script and CSS
		wp_register_script('nivo-slider', $template_url.'/js/nivo-slider/jquery.nivo.slider.pack.js');
		wp_enqueue_script('nivo-slider');
		wp_register_style('nivo-slider', $template_url.'/js/nivo-slider/nivo-slider.css');
		wp_enqueue_style('nivo-slider');
		wp_register_script('nivo-slider-load', $template_url.'/js/nivo-slider/load.js');
		wp_enqueue_script('nivo-slider-load');
	}

	if ( is_page("history") ) {
		wp_register_script('timeline', $template_url.'/js/timeline.js');
		wp_enqueue_script('timeline');
		wp_register_style('timeline', $template_url.'//timeline-css.css');
		wp_enqueue_style('timeline');	
	}
	
	if ( is_page("enews-signup") ) {
		wp_register_script('mailchimp', $template_url.'/js/mailchimp.js');
		wp_enqueue_script('mailchimp');
	}

	wp_register_script('jquery-validate', $template_url.'/js/jquery.validate.js');
	wp_enqueue_script('jquery-validate');

	wp_register_script('jquery-form', $template_url.'/js/jquery.form.js');
	wp_enqueue_script('jquery-form');

	wp_register_script('func', $template_url.'/js/func.js');
	wp_enqueue_script('func');

/*	wp_register_script('cufon-yui', get_bloginfo("template_url").'/js/cufon-yui.js');
	wp_enqueue_script('cufon-yui');

	wp_register_script('helvetica-neue-roman', get_bloginfo("template_url").'/js/helvetica-neue-roman_500.font.js');
	wp_enqueue_script('helvetica-neue-roman');	
*/		
}
add_action('template_redirect', 'js_head_load');	

// Remove the anchor tag in the "More" link
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');


// Since some custom post types live beneath pages, use jQuery to highlight current page parent in menu
function highlight_page_parent( $menu_item ) {?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("#navigation ul li#menu-item-"+<?php echo $menu_item;?>).addClass("current_page_parent");
		});
	</script><?php
}


// Since some custom post types live beneath pages, use jQuery to highlight current page parent in submenu
function highlight_page_parent_submenu( $submenu_item ) {?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("#sidebar li.page-item-9").removeClass("current_page_parent");
			$("#sidebar li.page-item-9").removeClass("current_page_item");
			$("#sidebar li.page-item-"+<?php echo $submenu_item;?>).addClass("current_page_parent");
		});
	</script><?php
}

// Special case for Network & Projects submenus
function highlight_page_parent_submenu_cats( $submenu_item ) {?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("#sidebar li.menu-item-"+<?php echo $submenu_item;?>).addClass("current_page_parent");
		});
	</script><?php
}


// Remove unnecessary widgets
function remove_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');	
    unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Tag_Cloud');	
    unregister_widget('WP_Widget_RSS');
}
add_action('widgets_init', 'remove_widgets', 20);

/*$items = get_posts("post_type=video&hierarchical=0" );
print_r( $items );
*/
function get_excerpt_outside_loop($post_id){
	global $wpdb;
	$query = 'SELECT post_excerpt FROM '. $wpdb->posts .' WHERE ID = '. $post_id .' LIMIT 1';
	$result = $wpdb->get_results($query, ARRAY_A);
	$post_excerpt=$result[0]['post_excerpt'];
	return $post_excerpt;
}

//remove_action(get_option("cufon_replacement_position"), 'wp_cufon_replacement');
?>