<?php
/*
	Template Name: Home Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div id="main" class="home">
				<div id="home-description-container">
					<div id="home-description">
						<p style="margin-bottom: 20px;">At <strong>InSTEDD</strong>, we envision a world where communities everywhere design and use technology to continuously improve their health, safety and development.</p>
						<p><a href="/about-us/">Read more&nbsp;&raquo;</a></p>
					</div>
				</div>
				<?php main_home_slider(); ?>
			
				<div id="home-boxes-container">
					<div id="home-ilab-container">
						<div id="home-ilab">
							<h2>ILABS</h2>
							<div class="home-boxes-text">
								<p>The communities we assist know best what their needs are. In order to support them in taking full ownership of the solutions, we are establishing local Innovation Labs or iLabs. <a href="/ilabs/">Read more&nbsp;&raquo;</a></p>
								<h3><a href="/ilabs/southeast-asia/">Southeast Asia</a></h3>
								<a href="/ilabs/southeast-asia/" class="no-border"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ilab-comp.jpg" style="width: 275px; height: 150px; margin-bottom: 4px;" /></a>
								<p>In 2007, InSTEDD launched the first iLab located in <a href="/ilabs/southeast-asia/">Phnom Penh, Cambodia</a>.</p>
								<h3><a href="/ilabs/latin-america/">Latin America</a></h3>
								<a href="/ilabs/latin-america/" class="no-border"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/blackboard-photo.jpg" style="width: 275px;  height: 150px; margin-bottom: 4px;" /></a>
								<p>In 2011, InSTEDD launched the second iLab located in <a href="/ilabs/latin-america/">Buenos Aires, Argentina</a>.</p>
							</div>
						</div>
					</div>
					<div id="home-video-container">
						<div id="home-video">
							<h2>IN OUR OWN WORDS</h2>
							<div class="home-boxes-text">
								<a href="/multimedia/video/what-is-instedd/" class="no-border"><img src="/wp-content/uploads/video_thumbnail_homepage.jpg" /></a>
								<p style="margin-top: 18px;">At InSTEDD we design and use open source technology tools to help partners enhance collaboration and improve information flow to better deliver critical services to vulnerable populations.</p>
								<?php //dynamic_sidebar("home-happening-sidebar"); ?>
								<?php
									$args = array(
										'before_widget' => '',
										'after_widget' => '',
										'before_title' => '<h3>',
										'after_title' => '</h3>',
									);
									xmt($args, 'Primary');
								?>
							</div>			
						</div>
					</div>
					<div id="home-happening-container">
						<div id="home-happening">
							<h2>WHAT'S HAPPENING</h2>
							<div class="home-boxes-text">
								<p><strong><a href="/ilablatamlaunch/">The launch of iLab Latin America</a></strong><br />
								With this week's launch of iLab Latin America in Buenos Aires, InSTEDD is taking a major step in expanding an approach to sustainable local capacity building. <a href="/ilablatamlaunch/">Read more&nbsp;&raquo;</a></p>

								<p><strong><a href="/2011/02/18/from-the-ted-prize-to-tedxphnom-penh/">From the TED Prize to TEDxPhnom Penh</a></strong><br />As many of you already know, InSTEDD was created as a result of Larry Brilliant's TED ... <a href="/2011/02/18/from-the-ted-prize-to-tedxphnom-penh/">Read&nbsp;more&nbsp;&raquo;</a></p>
								<p><strong><a href="/2010/08/11/make-your-sms-apps-scale/">Make your SMS apps scale</a></strong><br />
								A new version of Nuntium is out and we wanted to share some of the great new features it contains. <a href="/2010/08/11/make-your-sms-apps-scale/">Read&nbsp;more&nbsp;&raquo;</a></p>
								
								<h3><a href="http://trackernews.net/" target="_blank">TrackerNews</a></h3>
								<p style="margin-bottom: 9px;"><small style="font-size: 11px; font-style: italic;">An InSTEDD project</small></p>
								
								<?php $rss_posts = get_posts_from_rss(get_option('remote_blog_rss_url')); 
								foreach ($rss_posts as $p): ?>
									<p><strong><a href="<?php echo $p['link']; ?>" target="_blank"><?php echo $p['title']; ?></a></strong><br />
									<?php echo shortalize($p['desc']); ?> <a href="<?php echo $p['link']; ?>" target="_blank">Read&nbsp;more&nbsp;&raquo;</a></p>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="cl">&nbsp;</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>