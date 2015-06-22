<?php
/*
* Register the new widget classes here so that they show up in the widget list
*/
function load_widgets() {
    register_widget('FooterWidgetLogo');
    register_widget('FooterWidgetContact');
    register_widget('HomeGetConnected');
    register_widget('HomeSocialLinks');
    register_widget('HomeLatestTweets');
    register_widget('BlogLatestPosts');
    register_widget('RemoteBlogLatestPosts');
    register_widget('SidebarButton');
    register_widget('GetEmailUpdates');
    register_widget('StartUsingRightNow');
    register_widget('TechnologyWidget');
}
add_action('widgets_init', 'load_widgets');

class FooterWidgetLogo extends ThemeWidgetBase {

    function FooterWidgetLogo() {
        $widget_opts = array(
	        'classname' => 'footer-widget', // class of the <li> holder
            'description' => __( 'Displays a footer logo' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('footer-widget-logo', 'Footer Widget - Logo', $widget_opts, $control_ops);
        $this->custom_fields = array();
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
    	echo '<a href="' . get_option('home') . '" class="logo">&nbsp;</a>';
    }
}

class FooterWidgetContact extends ThemeWidgetBase {

    function FooterWidgetContact() {
        $widget_opts = array(
	        'classname' => 'footer-widget', // class of the <li> holder
            'description' => __( 'Displays a footer contacts/social widget' ) // description shown in the widget list
        );
        $control_ops = array();
        $this->WP_Widget('footer-widget-contact', 'Footer Widget - Contact & Social', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title', // field name
        		'type'=>'text', // field type (text, textarea, integer etc.)
        		'title'=>'Title', // title displayed in the widget form
        		'default'=>'Contact' // default value
        	),
        );
        $this->print_wrappers = false;
    }

    function front_end($args, $instance) {
    	$social_names = array('facebook_url', 'twitter_username', 'youtube_url', 'flickr_url', 'slideshare_url');
    	$social = array();
    	foreach ($social_names as $s) {
    		$social[$s] = get_option($s);
    	}
    	$path_to_images = get_bloginfo('stylesheet_directory') . '/images';
        ?>
		<div class="contacts left">
			<h4><?php echo $instance['title']; ?></h4>
<!--
			<form action="#" method="post" accept-charset="utf-8">
				<fieldset>
					<label>SIGN UP FOR Email Updates</label>
					<input type="text" class="field left" />
					<input type="submit" class="button notext right" value="SIGN UP" />
					<div class="cl">&nbsp;</div>
				</fieldset>
			</form>
-->
			<ul>
			    <li><a target="_blank" href="<?php echo $social['facebook_url']; ?>"><img src="<?php echo $path_to_images; ?>/icon-facebook.gif" alt="" /></a></li>
			    <li><a target="_blank" href="http://twitter.com/<?php echo $social['twitter_username']; ?>"><img src="<?php echo $path_to_images; ?>/icon-twitter.gif" alt="" /></a></li>
			    <li><a target="_blank" href="<?php echo $social['youtube_url']; ?>"><img src="<?php echo $path_to_images; ?>/icon-youtube.gif" alt="" /></a></li>
			    <li><a target="_blank" href="<?php echo $social['flickr_url']; ?>"><img src="<?php echo $path_to_images; ?>/icon-flickr.gif" alt="" /></a></li>
			    <li><a target="_blank" href="<?php echo $social['slideshare_url']; ?>"><img src="<?php echo $path_to_images; ?>/icon-slideshare.gif" alt="" /></a></li>
			    <li class="last"><a target="_blank" href="<?php bloginfo('rss_url'); ?>"><img src="<?php echo $path_to_images; ?>/icon-rss.gif" alt="" /></a></li>
			</ul>
		</div>
        <?php
    }
}

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
	
<div class="mc-field-group">
	    		<label>SIGN UP FOR OUR E-NEWSLETTER</label>

 
<input type="text" value="" name="EMAIL" class="required email field left" id="mce-EMAIL">
</div>
		<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button notext right" ></div>
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
            'description' => __( 'Displays a home social widget. You can set the links in Theme Options.' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-social', 'Home Widget - Social', $widget_opts, $control_ops);
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
			    <li><a target="_blank" href="<?php echo get_option('facebook_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-facebook-sq.png" width="45" alt="" /></a></li>
			    <li><a target="_blank" href="http://twitter.com/<?php echo get_option('twitter_username'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-twitter-sq.png" alt=""  width="45"/></a></li>
			    <li><a target="_blank" href="<?php echo get_option('youtube_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-youtube-sq.png" alt=""  width="45"/></a></li>
			    <li><a target="_blank" href="<?php echo get_option('flickr_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-flickr-sq.png" alt=""  width="45"/></a></li>
			    <li><a target="_blank" href="<?php echo get_option('slideshare_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-slideshare-sq.png" alt="" width="45" /></a></li>
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
            'description' => 'Displays a block with your latest tweets'
        );
        $this->WP_Widget('home-widget-latest-tweets', 'Home Widget - Latest Tweets', $widget_opts);
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
}

class BlogLatestPosts extends ThemeWidgetBase {

    function BlogLatestPosts() {
        $widget_opts = array(
	        'classname' => 'blog-widget',
            'description' => __( 'Displays a latest posts from blog' )
        );
        $control_ops = array();
        $this->WP_Widget('home-widget-blog-latest-posts', 'Blog Widget - Latest Posts', $widget_opts, $control_ops);
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
            <h2 class="widgettitle"><?php echo $instance['title']; ?></h2>
            <ul>
            	<?php query_posts('showposts=' . $instance['number']); ?>
            	<?php if (have_posts()): ?>
            		<?php while(have_posts()): the_post(); ?>
		                <li>
		                	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		                	<p><?php the_excerpt(); ?></p>
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
        $this->WP_Widget('home-widget-blog-latest-rss-posts', 'Blog Widget - Latest RSS Posts', $widget_opts, $control_ops);
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
    	$rss_posts = get_posts_from_rss(get_option('remote_blog_rss_url'));
        ?>
        <li class="widget latest-news">
            <h2 class="widgettitle"><?php echo $instance['title']; ?></h2>
            <ul>
            	<?php foreach ($rss_posts as $p): ?>
                <li>
                	<h4><a href="<?php echo $p['link']; ?>" target="_blank"><?php echo $p['title']; ?></a></h4>
                	<p><?php echo shortalize($p['desc'], 10); ?> <a href="<?php echo $p['link']; ?>" target="_blank">Read more&gt;&gt;</a></p>
                </li>
            	<?php endforeach ?>
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
        $this->WP_Widget('widget-start-using-right-now', 'Technology Widget - Sign In/Up', $widget_opts, $control_ops);
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

    function front_end($args, $instance) {
    	?>
        <li class="widget nav">
            <h2 class="widgettitle"><?php echo $instance['title']; ?></h2>
            <ul>
            	<?php //if ($instance['sign_in']): 
$technology_startusing_signin = get_meta('_technology_startusing_signin');
$technology_startusing_signup = get_meta('_technology_startusing_signup');?>
            		<li><a href="<?php echo  $technology_startusing_signin; ?>">Already a user? <span>Sign in>></span></a></li>
            	<?php //endif ?>
                <?php if ($instance['sign_up']): ?>
                	<li><a href="<?php echo $technology_startusing_signup; ?>">Not registered? <span>Sign up>></span></a></li>
                <?php endif ?>
            </ul>
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