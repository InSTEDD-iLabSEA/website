<?php
wp_enqueue_script('jquery');// Include jquery

add_theme_support('automatic-feed-links');
add_theme_support('menus');

register_nav_menus(array(
	'main-menu'=>__('Main Menu'),
));

register_sidebar(array(
	'name' => 'Default Sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
));
register_sidebar(array(
	'name' => 'Footer Widgets',
	'id' => 'footer-widgets',
    'before_widget' => '<div id="%1$s" class="col left %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => 'Home Sidebar',
	'id' => 'home-sidebar',
    'before_widget' => '<div id="%1$s" class="widget box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
));

include_once('lib/twitter/versions-proxy.php');
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

/*
* Shortcut function for outputting page permalinks. Example: <?php permapath('about/our-company'); ?>
*/
function permapath($path, $echo = true) {
	$permalink = get_permalink(get_page_id_by_path($path));
	if ($echo) {
		echo $permalink;
	}
	return $permalink;
}

function main_home_slider() {
	$posts = get_posts('post_type=slide&showposts=-1&orderby=menu_order&order=ASC');
	$filtered_posts = array();
	foreach ($posts as $p) {
		$img = get_meta('_slide_image', $p->ID);
		if ($img) {
			$filtered_posts[] = $p;
		}
	}
	if ($filtered_posts):
		$loopID = 0;
		?>
		<div class="image-slider">
			<div class="slider">
				<ul>
					<?php foreach ($filtered_posts as $p): $img = get_meta('_slide_image', $p->ID); $loopID++; ?>
					    <li>
					    	<img src="<?php echo ecf_get_image_url($img); ?>" alt="" />
							<div class="caption">
								<div class="info left">
									<h2><?php echo $p->post_title; ?></h2>
									<?php echo apply_filters('the_content', $p->post_content); ?>
								</div>
								<a href="#" class="btn-next right">Next >> <span><?php echo ($loopID == count($filtered_posts)) ? $filtered_posts[0]->post_title : $filtered_posts[$loopID]->post_title; ?></span></a>
								<div class="cl">&nbsp;</div>
							</div>
				    	</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif;
}



function box_home_slider() {
	query_posts('post_type=box-slide&showposts=-1&orderby=menu_order&order=ASC');
	if (have_posts()): ?>
	
		<div class="box-slider">
			<a href="#" class="btn btn-prev notext">&nbsp;</a>
			<a href="#" class="btn btn-next notext">&nbsp;</a>
			<div class="slider">
				<ul>
					<?php while(have_posts()): ?>
						<?php
							the_post(); 
							$img = get_meta('_box_slide_image');
							if (!$img) {
						 		continue;
							}
							$link = get_meta('_box_slide_link');
							$caption = get_meta('_box_slide_caption');
						?>
					    <li>
					    	<div class="box">
					    		<h3><?php echo ($link) ? '<a href="' . $link . '">' : ''; the_title(); echo ($link) ? '</a>' : ''; ?></h3>
					    		<?php echo ($link) ? '<a href="' . $link . '">' : ''; ?>
					    		<img src="<?php echo ecf_get_image_url($img); ?>" alt="" />
					    		<?php echo ($link) ? '</a>' : ''; ?>
			    	<?php echo $caption; ?>
			    	<br/>
			    		<?php echo ($link) ? '<a href="' . $link . '">' : ''; ?>
			    		Read More >>
			    		<?php echo ($link) ? '</a>' : ''; ?>

					    		
					    	</div>
					    </li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	<?php endif;
	wp_reset_query();
}

function filter_excerpt_length($length) {
	return 16;
}
add_filter('excerpt_length', 'filter_excerpt_length', 999);

function filter_the_excerpt($excerpt) {
	global $post;
	$excerpt = str_replace('[...]', '', $excerpt);
	return $excerpt . ' <a href="' . get_permalink() . '">Read more &gt;&gt;</a>';
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


// Add this to the end of the functions.php file of the wordpress theme
// to register the 'map post' type and add custom meta boxes for latitude and longitude

add_action( 'init', 'MapPostsInit' );
function MapPostsInit() { global $map_posts; $map_posts = new MapPosts(); }

class MapPosts {

	function MapPosts() {
		register_post_type( 'map_post',
			array(
				'label' => __( 'Map Posts' ),
				'singular_label' => __( 'Map Post' ),
				'public' => true,
				//'menu_position' => 5,
				'query_var' => true,
				'supports' => array('title', 'editor'),
				'rewrite' => array('slug'=>'map'),
			)
		);

		add_action("admin_init", array(&$this, "admin_init"));
		add_action('save_post', array(&$this, 'save_post_data'));
	}

	function admin_init(){
		add_meta_box("latitude-meta", "Latitude", array(&$this, "latitude_meta_box"), "map_post", "normal", "high");
		add_meta_box("longitude-meta", "Longitude", array(&$this, "longitude_meta_box"), "map_post", "normal", "high");		
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

	function save_post_data( $post_id ) {
		global $post;

		// Verify
		if ( !wp_verify_nonce( $_POST["ch_latitude_noncename"], plugin_basename(__FILE__) ) ||
			 !wp_verify_nonce( $_POST["ch_longitude_noncename"], plugin_basename(__FILE__) )) {
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
	}
}

?>