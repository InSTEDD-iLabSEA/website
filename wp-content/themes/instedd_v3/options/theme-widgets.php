<?php
/*
* Register the new widget classes here so that they show up in the widget list
*/
function load_widgets() {
  //  register_widget('HomeGetConnected');
	register_widget('HomeSocialLinks');
   // register_widget('HomeLatestTweets');
    register_widget('BlogLatestPosts');
    register_widget('RemoteBlogLatestPosts');
	register_widget('BlogSelectedPosts');
    //register_widget('SidebarButton');
    //register_widget('GetEmailUpdates');
    register_widget('StartUsingRightNow');
   // register_widget('TechnologyWidget');
	register_widget('TechnologyCommunity');
	register_widget('TechnologyUsedBy');
    register_widget('PhotoEssays');
    register_widget('PhotoEssaysSelected');
    register_widget('VideoWidget');
	register_widget('VideoSelectedWidget');
	register_widget('PresentationSelectedWidget');
    register_widget('TechnologyScreenshots');
}
add_action('widgets_init', 'load_widgets');

class HomeGetConnected extends ThemeWidgetBase {

    function HomeGetConnected() {
        $widget_opts = array(
	        'classname' => 'footer-widget',
            'description' => __( 'Displays a home subscribe widget' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-get-connected', 'Home Widget - Subscribe Widget', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Get Connected'
        	),
        );
    }

    function front_end($args, $instance) {
        ?>
		<div class="box-mailing" id="homebox">
<!-- 			<h2><?php /* echo $instance['title'];  */?></h2> -->
<!--
			<form action="#" method="post" accept-charset="utf-8">
				<fieldset>
					<label>SIGN UP FOR OUR E-NEWSLETTER</label>
					<input type="text" class="field left" />
					<input type="submit" class="button notext right" value="SIGN UP" />
					<div class="cl">&nbsp;</div>
				</fieldset>
			</form>
		</div>
-->
<div id="mc_embed_signup">
	<div id="mce-responses" style="float: left;top: -1.4em;overflow: hidden;width:270px;clear: both;">
		<div class="response" id="mce-error-response"></div>
		<div class="response" id="mce-success-response" ></div>
	</div>

	<form action="http://instedd.us2.list-manage.com/subscribe/post?u=5c23ab2c1818bcaa77e1266cb&amp;id=25c7ea9400" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" style="font: normal 100% Arial, sans-serif;font-size: 10px;">
		<fieldset>
	
		<input type="text" name="EMAIL" class="required email field left" id="mce-EMAIL" value="Enter your email address">
		<input type="submit" value="E-News Signup" name="subscribe" id="mc-embedded-subscribe" class="button" >
	</fieldset>	
	<a href="#" id="mc_embed_close" class="mc_embed_close" style="display: none;">Close</a>
	</form>
</div>
		

        <?php
    }
}

class HomeSocialLinks extends ThemeWidgetBase {

    function HomeSocialLinks() {
        $widget_opts = array(
	        'classname' => 'footer-widget',
            'description' => __( 'Displays social media icons. You can set the links in Theme Options.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-social', 'Social Media', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Find Us Online'
        	),
        );
    }

    function front_end($args, $instance) {
        ?>
		<div class="box-socials">
<!-- 			<h2><?php /* echo $instance['title']; */ ?></h2> -->
			<ul>
			    <li><a target="_blank" href="<?php echo get_option('facebook_url'); ?>" title="Like InSTEDD iLab Southeast Asia on Facebook"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-facebook-v2.png" alt="Facebook icon" /></a></li>
			    <li><a target="_blank" href="http://twitter.com/<?php echo get_option('twitter_username'); ?>" title="Follow InSTEDD iLab Southeast Asia on Twitter"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-twitter-v2.png" alt="Twitter icon" /></a></li>
			    <li><a target="_blank" href="<?php echo get_option('youtube_url'); ?>" title="Visit InSTEDD's YouTube channel"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-youtube-v2.png" alt="YouTube icon" /></a></li>
			    <li><a target="_blank" href="<?php echo get_option('flickr_url'); ?>" title="See InSTEDD's Flickr stream"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-flickr-v2.png" alt="Flickr icon" /></a></li>
			    <li><a target="_blank" href="<?php echo get_option('slideshare_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-slideshare-v2.png" alt="Slideshare icon" title="Visit InSTEDD's Slideshare page" /></a></li>
				<li><a target="_blank" href="http://instedd.org/feed/rss/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-rss-v2.png" alt="RSS icon" title="Subscribe to InSTEDD's RSS feed" /></a></li>
			</ul>
			<div class="cl">&nbsp;</div>
		</div>
        <?php
    }
}

class HomeLatestTweets extends ThemeWidgetBase {
    function HomeLatestTweets() {
		
        $widget_opts = array(
	        'classname' => 'theme-widget',
            'description' => 'Displays your latest Tweets'
        );
        $this->WP_Widget('home-widget-latest-tweets', 'Latest Tweets', $widget_opts);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Latest Twitter'
        	),
        	array(
		        'name'=>'username',
        		'type'=>'text',
        		'title'=>'Username',
        		'default'=>get_option('twitter_username')
        	),
        	array(
		        'name'=>'count',
        		'type'=>'text',
        		'title'=>'Number of Tweets to show',
        		'default'=>'5'
        	),
        );
    }
	
    function front_end($args, $instance) {   
		$args = array(
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		);
		xmt($args, 'Sidebar');
	}
	
/*?>    function front_end($args, $instance) {
    	extract($args);
    	$tweets = TwitterHelper::get_tweets($instance['username'], $instance['count']);
        ?>
		<div class="box-twit">
			<h2><?php echo $instance['title']; ?> <span><a href="http://twitter.com/<? echo $instance['username']; ?>" target="_blank">Follow Us</a></span></h2>
			<?php if ($tweets): ?>
				<?php foreach ($tweets as $t): ?>
					<div class="item">
					<P><? echo preg_replace("/Instedd: /i", "", $t->tweet_text); ?></P>
						<p class="date">Posted: <?php echo $t->time_distance; ?> ago</p>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
        <?php
    }
*/}

class BlogLatestPosts extends ThemeWidgetBase {

    function BlogLatestPosts() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays latest posts from blog' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-blog-latest-posts', 'Blog Posts - Latest', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Latest From Blog'
        	),
        	array(
		        'name'=>'number',
        		'type'=>'integer',
        		'title'=>'Number of posts',
        		'default'=>3
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
        ?>
        <li class="widget latest-blog">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul>
            	<?php query_posts('showposts=' . $instance['number']); ?>
            	<?php if (have_posts()): ?>
            		<?php while(have_posts()): the_post(); ?>
		                <li>
		                	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		                	<?php the_excerpt();?>
		                </li>
            		<?php endwhile; ?>
            	<?php endif ?>
            	<?php wp_reset_query(); ?>
            </ul>
        </li>
        <?php
    }
}

class RemoteBlogLatestPosts extends ThemeWidgetBase {

    function RemoteBlogLatestPosts() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays a latest posts from the remote blog RSS URL, specified in Theme Options.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-blog-latest-rss-posts', 'Latest RSS Posts', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Tracker News Feed'
        	),
        	array(
		        'name'=>'number',
        		'type'=>'integer',
        		'title'=>'Number of posts',
        		'default'=>3
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
		$rss_posts = get_option('remote_blog_rss_url');
		include_once(ABSPATH.WPINC.'/rss.php'); // path to include script
		$feed = fetch_rss($rss_posts); // specify feed url
		$items = array_slice($feed->items, 0, $instance['number']); // specify first and last item ?>
        <li class="widget latest-news">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul>
            	<?php foreach ($items as $p): ?>
                <li>
                	<h4><a href="<?php echo $p['link']; ?>" target="_blank"><?php echo $p['title']; ?></a></h4>
                	<p><?php echo shortalize($p['description'], 15); ?> <?php /*?><a href="<?php echo $p['link']; ?>" target="_blank">Read more&nbsp;&raquo;</a><?php */?></p>
                </li>
            	<?php endforeach ?>
            </ul>
        </li><?php
    }
}

class PhotoEssays extends ThemeWidgetBase {

    function PhotoEssays() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays latest photo essays.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-photo-essays', 'Photo Essays - Latest', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Photo Essays'
        	),
        	array(
		        'name'=>'number',
        		'type'=>'integer',
        		'title'=>'Number of essays to show',
        		'default'=>2
        	),
        	array(
		        'name'=>'link_text',
        		'type'=>'text',
        		'title'=>'Link text',
        		'default'=>'View all photo essays'
        	),
        	array(
		        'name'=>'link_id',
        		'type'=>'text',
        		'title'=>'ID of Photos page',
        		'default'=>'91'
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
        ?>
        <li class="widget photo-essays">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul><?php
				$photo_essays = new WP_Query();
				$photo_essays->query( 'showposts='. $instance['number'] . '&post_parent=91&post_type=page&orderby=date&order=DESC' );
				$view_all_link = get_permalink( $instance['link_id'] );
				while ( $photo_essays->have_posts() ) : $photo_essays->the_post(); ?>
					<li>
						<a href="<?php echo the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'alignleft', 'style' => 'width: 75px; height: 62px' ) );?></a>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p class="publication-author"><?php the_time('F j, Y'); ?></p>
						<div class="cl">&nbsp;</div>
					</li>
				<?php endwhile; 
				wp_reset_query();?>
           </ul>
			<p class="widget-photo-essays-view-all"><a href="<?php echo $view_all_link; ?>"><?php echo $instance['link_text']; ?></a></p>
        </li>
        <?php
    }
}


class PhotoEssaysSelected extends ThemeWidgetBase {

    function PhotoEssaysSelected() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays selected photo essays.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-photo-essays-selected', 'Photo Essays - Selected', $widget_opts, $control_ops);
		
		$args = array( 	'post_type' 	=> 'page',
						'showposts' 	=> '-1',
						'order'			=> 'ASC',
						'orderby'		=> 'title',
						'post_parent'	=> 91
						 );
		$photoessays_dropdown = new WP_Query( $args );
		while( $photoessays_dropdown->have_posts() ) : $photoessays_dropdown->the_post();
			$item_id = get_the_ID();
			$item_dropdown[$item_id] = get_the_title();
		endwhile;
		wp_reset_query();
	
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Photo Essay'
        	),
        	array(
		        'name'=>'selected_item',
        		'type'=>'select_multiple',
        		'title'=>'Item(s)',
        		'options'=>$item_dropdown
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
        ?>
        <li class="widget photo-essay selected">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul>
				<?php foreach ( $instance['selected_item'] as $selected_item ) {?>
					<li>
						<a href="<?php echo get_permalink($selected_item);?>" title="View photo essay"><?php echo get_the_post_thumbnail($selected_item, 'thumbnail', array('class' => 'alignleft'));?></a>
						<h4><a href="<?php echo get_permalink($selected_item);?>"><?php echo get_the_title($selected_item);?></a></h4>					
						<p class="publication-author"><?php echo get_the_time('F j, Y', $selected_item); ?><br /><br /></p>
						<div class="cl"></div>
					</li>
				<?php }?>
           </ul>
        </li>
        <?php
    }
}


class VideoWidget extends ThemeWidgetBase {

    function VideoWidget() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays latest videos.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-videos', 'Video - Latest', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Video'
        	),
        	array(
		        'name'=>'number',
        		'type'=>'integer',
        		'title'=>'Number of videos to show',
        		'default'=>3
        	),
        	array(
		        'name'=>'link_text',
        		'type'=>'text',
        		'title'=>'Link text',
        		'default'=>'View all videos'
        	),
/*        	array(
		        'name'=>'link_id',
        		'type'=>'text',
        		'title'=>'ID of Videos page',
        		'default'=>'91'
        	),
*/        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
        ?>
        <li class="widget video">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul><?php
				$videos = new WP_Query();
				$videos->query( 'showposts='. $instance['number'] . '&post_type=video&orderby=date&order=DESC&post_status=publish' );
				while ( $videos->have_posts() ) : $videos->the_post(); ?>
					<li>
						<?php $video_url = get_meta('_video_url');?> 
						<div class="image left">
							<div class="video-overlay"><a href="<?php echo the_permalink(); ?>" title="Watch video"></a></div>
							<div class="video-image"><img src="<?php echo get_youtube_thumbnail($video_url);?>" class="alignleft" style="width: 75px; height: 62px;" /></div>
						</div>
						<div class="info left">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p class="publication-author"><?php the_time('F j, Y'); ?></p>
						</div>
						<div class="cl">&nbsp;</div>
				</li>
				<?php endwhile; 
				wp_reset_query();?>
           </ul>
			<p class="widget-photo-essays-view-all"><a href="/news-media/video/"><?php echo $instance['link_text']; ?></a></p>
        </li>
        <?php
    }
}


class VideoSelectedWidget extends ThemeWidgetBase {

    function VideoSelectedWidget() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays selected videos.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-videos-selected', 'Video - Selected', $widget_opts, $control_ops);
		
		$args = array( 	'post_type' 	=> 'video',
						'showposts' 	=> '-1',
						'order'			=> 'ASC',
						'orderby'		=> 'title'
						 );
		$videos_dropdown = new WP_Query( $args );
		while( $videos_dropdown->have_posts() ) : $videos_dropdown->the_post();
			$item_id = get_the_ID();
			$item_dropdown[$item_id] = get_the_title();
		endwhile;
		wp_reset_query();
	
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Video'
        	),
        	array(
		        'name'=>'selected_item',
        		'type'=>'select_multiple',
        		'title'=>'Item(s)',
        		'options'=>$item_dropdown
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
        ?>
        <li class="widget video selected">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul>
				<?php foreach ( $instance['selected_item'] as $selected_item ) {?>
					<li>
						<div class="image">
							<div class="video-overlay"><a href="<?php echo get_permalink($selected_item);?>" title="Watch video"></a></div>
							<div class="video-image">
							<?php if ( get_the_post_thumbnail( $selected_item ) ) {
								echo get_the_post_thumbnail( $selected_item );
							} else {?>
								<?php $video_url = get_post_meta( $selected_item, "_video_url", TRUE);?>
								<img src="<?php echo get_youtube_thumbnail( $video_url );?>" class="alignleft" style="width: 210px; height: 174px;" />
							<?php }?>
							</div>
						</div>
						<div class="cl">&nbsp;</div>
						<h4 style="line-height: 16px; margin-top: 1em;"><a href="<?php echo get_permalink($selected_item);?>"><?php echo get_the_title($selected_item);?></a></h4>					
				</li>
				<?php }?>
           </ul>
        </li>
        <?php
    }
}


class PresentationSelectedWidget extends ThemeWidgetBase {

    function PresentationSelectedWidget() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays selected presentations.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-presentations-selected', 'Presentations - Selected', $widget_opts, $control_ops);
		
		$args = array( 	'post_type' 	=> 'presentation',
						'showposts' 	=> '-1',
						'order'			=> 'ASC',
						'orderby'		=> 'title'
						 );
		$presentations_dropdown = new WP_Query( $args );
		while( $presentations_dropdown->have_posts() ) : $presentations_dropdown->the_post();
			$item_id = get_the_ID();
			$item_dropdown[$item_id] = get_the_title();
		endwhile;
		wp_reset_query();
	
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Presentation'
        	),
        	array(
		        'name'=>'selected_item',
        		'type'=>'select_multiple',
        		'title'=>'Item(s)',
        		'options'=>$item_dropdown
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
        ?>
        <li class="widget presentation selected">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul>
				<?php foreach ( $instance['selected_item'] as $selected_item ) {?>
					<li>
						<div class="image">
							<div class="video-overlay"><a href="<?php echo get_permalink($selected_item);?>" title="Watch video"></a></div>
							<div class="video-image"><? echo get_the_post_thumbnail($selected_item);?></div>
						</div>
						<div class="cl">&nbsp;</div>
						<h4 style="line-height: 16px; margin-top: 1em;"><a href="<?php echo get_permalink($selected_item);?>"><?php echo get_the_title($selected_item);?></a></h4>					
				</li>
				<?php }?>
           </ul>
        </li>
        <?php
    }
}


class BlogSelectedPosts extends ThemeWidgetBase {

    function BlogSelectedPosts() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays selected blog posts.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-posts-selected', 'Blog Posts - Selected', $widget_opts, $control_ops);
		
		$args = array( 	'post_type' 	=> 'post',
						'showposts' 	=> '-1',
						'order'			=> 'ASC',
						'orderby'		=> 'title'
						 );
		$posts_dropdown = new WP_Query( $args );
		while( $posts_dropdown->have_posts() ) : $posts_dropdown->the_post();
			$item_id = get_the_ID();
			$item_dropdown[$item_id] = get_the_title();
		endwhile;
		wp_reset_query();
	
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Blog Post'
        	),
        	array(
		        'name'=>'selected_item',
        		'type'=>'select_multiple',
        		'title'=>'Item(s)',
        		'options'=>$item_dropdown
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
        ?>
        <li class="widget blog selected">
            <h3 class="widgettitle"><?php echo $instance['title']; ?></h3>
            <ul>
				<?php foreach ( $instance['selected_item'] as $selected_item ) {?>
					<li>
						<div class="cl">&nbsp;</div>
						<?php $excerpt = get_excerpt_outside_loop( $selected_item );?>
						<h4><a href="<?php echo get_permalink($selected_item);?>"><?php echo get_the_title($selected_item);?></a></h4>					
						<p style="margin-bottom: 0.5em;" class="publication-author"><?php echo get_the_time( "F j, Y", $selected_item );?></p>
						
	                	<p><?php echo $excerpt;?> <a href="<?php echo get_permalink($selected_item);?>">Read more »</a></p>
	                </li>
				<?php }?>
           </ul>
        </li>
        <?php
    }
}


class SidebarButton extends ThemeWidgetBase {

    function SidebarButton() {
        $widget_opts = array(
	        'classname' => 'footer-widget', // class of the <li> holder
            'description' => __( 'Displays a sidebar button' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('widget-sidebar-button', 'Blog Widget - Button', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'text',
        		'type'=>'text',
        		'title'=>'Text',
        		'default'=>''
        	),
        	array(
		        'name'=>'link',
        		'type'=>'text',
        		'title'=>'Link',
        		'default'=>''
        	),
        	array(
		        'name'=>'color',
        		'type'=>'select',
        		'title'=>'Color',
        		'options'=>array(
        			'btn-donate' => 'Green',
        			'btn-tell' => 'Blue',
    			)
        	),
        );
    }

    function front_end($args, $instance) {
    	echo '<a href="' . $instance['link'] . '" class="btn ' . $instance['color'] . '">' . $instance['text'] . '</a>';
    }
}

class GetEmailUpdates extends ThemeWidgetBase {

    function GetEmailUpdates() {
        $widget_opts = array(
	        'classname' => 'footer-widget', // class of the <li> holder
            'description' => __( 'Displays a subscribe form' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('widget-subscribe-form', 'Blog Widget - Subscribe Form', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Get Email Updates'
        	),
        );
    }

    function front_end($args, $instance) {
    	?>
	   <!--
 <div class="box-updates">
	    	<form action="#" method="post" accept-charset="utf-8">
	    		<fieldset>
	    			<label>Get Email Updates</label>
	    			<input type="text" class="field" value="" />
	    			<input type="submit" class="button notext" value="Sign Up" />
	    		</fieldset>
	    	</form>
	    </div>
-->
 <div class="box-updates">



<div id="mc_embed_signup">
<form action="http://instedd.us2.list-manage1.com/subscribe/post?u=577a07b1cb0bdb44343d2cb1f&amp;id=1ff24cc1b3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" style="font: normal 100% Arial, sans-serif;font-size: 10px;">
	<fieldset>
	
<div class="mc-field-group">
	    			<label>Get Email Updates</label>
 
<input type="text" value="" name="EMAIL" class="required email field" id="mce-EMAIL">
</div>
		<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button notext" ></div>
	</fieldset>	
	<a href="#" id="mc_embed_close" class="mc_embed_close" style="display: none;">Close</a>
</form>


</div>
<div id="mce-responses" style="float: left;top: -1.4em;overflow: hidden;width:270px;clear: both;">
			<div class="response" id="mce-error-response" style="display: none;margin: 1em 0;padding: 10px;font-weight: bold;float: left;top: -1.5em;z-index: 1;width: 70%;background: FBE3E4;color: #D12F19;"></div>
			<div class="response" id="mce-success-response" style="display: none;margin: 1em 0;padding: 10px;font-weight: bold;float: left;top: -1.5em;z-index: 1;width: 70%;background: #E3FBE4;color: #529214;"></div>
		</div>
		<div>

    	<?php
    }
}

class StartUsingRightNow extends ThemeWidgetBase {

    function StartUsingRightNow() {
        $widget_opts = array(
	        'classname' => 'footer-widget', // class of the <li> holder
            'description' => __( 'Displays a "Start Using Right Now" block' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('widget-start-using-right-now', 'Technology - Sign In/Up', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Start using it now'
        	),
        	array(
		        'name'=>'sign_in',
        		'type'=>'text',
        		'title'=>'Sign In Link',
        		'default'=>''
        	),
        	array(
		        'name'=>'sign_up',
        		'type'=>'text',
        		'title'=>'Sign Up Link',
        		'default'=>''
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {?>
       
	   <ul> <li class="widget start-using">
 			<?php $technology_startusing_signup = get_meta('_technology_startusing_signup');?>
			<a class="btn-technology-start-using" href="<?php echo $technology_startusing_signup;?>"><?php echo $instance['title']; ?></a>

	<?php //if ($instance['sign_in']): ?>
	<?php $technology_startusing_signin = get_meta('_technology_startusing_signin');
	if ( $technology_startusing_signin ) {?>
    	<li><a href="<?php echo $technology_startusing_signin; ?>">Already a user? <span>Sign in »</span></a></li>
	<?php } ?>
<?php /*?>                <?php if ($instance['sign_up']): ?>
                	<li><a href="<?php echo $technology_startusing_signup; ?>">Not registered? <span>Sign up>></span></a></li>
                <?php endif ?><?php */?>
            </ul>
       </li>
    	<?php
    }
}


class TechnologyScreenshots extends ThemeWidgetBase {

    function TechnologyScreenshots() {
        $widget_opts = array(
	        'classname' => 'footer-widget', // class of the <li> holder
            'description' => __( 'Displays a "Screenshots" block' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('widget-tech-screenshots', 'Technology - Screenshots', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Screenshot'
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {?>
        <li class="widget screenshots">
 			<?php 
			$technology_screenshot_1 = get_meta('_technology_screenshot_1');
			$technology_screenshot_2 = get_meta('_technology_screenshot_2');
			$technology_screenshot_3 = get_meta('_technology_screenshot_3');
			$total = 0;
			if ( $technology_screenshot_1 ) $total++;
			if ( $technology_screenshot_2 ) $total++;
			if ( $technology_screenshot_3 ) $total++;
			$technology_screenshots_title = $instance['title'];//get_meta('_technology_screenshots_title');
			if ( $total > 1 ) $technology_screenshots_title .= 's';
			 ?>
			<h2 class="widgettitle"><?php echo $technology_screenshots_title; ?></h2><?php 
			if ( $technology_screenshot_1 ) {?>
				<div class="screenshot_image"><a class="cboxElement" rel="lightbox[]" href="<?php echo $technology_screenshot_1;?>"><img src="<?php echo $technology_screenshot_1;?>" /></a></div><?php
			};
			if ( $technology_screenshot_2 ) {?>
				<div class="screenshot_image"><a class="cboxElement" rel="lightbox[]" href="<?php echo $technology_screenshot_2;?>"><img src="<?php echo $technology_screenshot_2;?>" /></a></div><?php
			};
			if ( $technology_screenshot_3 ) {?>
				<div class="screenshot_image"><a class="cboxElement" rel="lightbox[]" href="<?php echo $technology_screenshot_3;?>"><img src="<?php echo $technology_screenshot_3;?>" /></a></div><?php
			};
			?>
        </li><?php
    }
}

class TechnologyCommunity extends ThemeWidgetBase {

    function TechnologyCommunity() {
        $widget_opts = array(
	        'classname' => 'sidebar-technology-community', // class of the <li> holder
            'description' => __( 'Displays a "Community" block' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('widget-technology-community', 'Technology - Community', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Community'
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
    	?>
        <li class="widget community">
            <h2 class="widgettitle"><?php echo $instance['title']; ?></h2>
           	<?php $technology_community = get_meta('_technology_community');
				echo $technology_community;?>
        </li>
    	<?php
    }
}


class TechnologyUsedBy extends ThemeWidgetBase {

    function TechnologyUsedBy() {
        $widget_opts = array(
	        'classname' => 'sidebar-technology-usedby', // class of the <li> holder
            'description' => __( 'Displays a "Who Is Using It?" block' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('widget-technology-usedby', 'Technology - Used By', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Who Is Using It?'
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
    	?>
        <li class="widget usedby">
            <h2 class="widgettitle"><?php echo $instance['title']; ?></h2>
           	<?php $technology_used_by = get_meta('_technology_used_by');
				echo $technology_used_by;?>
        </li>
    	<?php
    }
}


class TechnologyWidget extends ThemeWidgetBase {

    function TechnologyWidget() {
        $widget_opts = array(
	        'classname' => 'footer-widget', // class of the <li> holder
            'description' => __( 'Displays a gray technology widget' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('widget-technology-widget', 'Technology Widget', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>''
        	),
        	array(
		        'name'=>'text',
        		'type'=>'textarea',
        		'title'=>'Text',
        		'default'=>''
        	),
        	array(
		        'name'=>'image',
        		'type'=>'text',
        		'title'=>'Image',
        		'default'=>''
        	),
        	array(
		        'name'=>'link',
        		'type'=>'text',
        		'title'=>'Link',
        		'default'=>''
        	),
        	array(
		        'name'=>'link_text',
        		'type'=>'text',
        		'title'=>'Link Text',
        		'default'=>''
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
    	?>
        <li class="widget box">
            <h2 class="widgettitle"><?php echo $instance['title']; ?></h2>
            <ul>
                <li>
                	<?php if ($instance['image']): ?>
                		<img src="<?php echo $instance['image']; ?>" alt="" class="left" />
                	<?php endif ?>
                	<div class="info right">
                		<?php echo apply_filters('the_content', $instance['text']); ?>
                		<?php if ($instance['link'] && $instance['link_text']): ?>
                			<p class="take"><a href="<?php echo $instance['link']; ?>"><?php echo $instance['link_text']; ?></a></p>
                		<?php endif ?>
                	</div>
                	<div class="cl">&nbsp;</div>
                </li>
            </ul>
        </li>
    	<?php
    }
}

/*
* An example widget
*/
class ThemeWidgetExample extends ThemeWidgetBase {
	/*
	* Register widget function. Must have the same name as the class
	*/
    function ThemeWidgetExample() {
        $widget_opts = array(
	        'classname' => 'theme-widget', // class of the <li> holder
            'description' => __( 'Displays a block with title/text' ) // description shown in the widget list
        );
        // Additional control options. Width specifies to what width should the widget expand when opened
        $control_ops = array(
        	//'width' => 350,
        );
        // widget id, widget display title, widget options
        $this->WP_Widget('theme-widget-example', 'Theme Widget - Example', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title', // field name
        		'type'=>'text', // field type (text, textarea, integer etc.)
        		'title'=>'Title', // title displayed in the widget form
        		'default'=>'Hello World!' // default value
        	),
        	array(
        		'name'=>'text',
        		'type'=>'textarea',
        		'title'=>'Content', 
        		'default'=>'Lorem Ipsum dolor sit amet'
        	),
        );
    }
    
    /*
	* Called when rendering the widget in the front-end
	*/
    function front_end($args, $instance) {
    	extract($args);
    	if ($instance['title'] != '') {
    		echo $before_title . $instance['title'] . $after_title;
    	}
        ?>
		<p><?php echo $instance['text'];?></p>
        <?php
    }
}
?>