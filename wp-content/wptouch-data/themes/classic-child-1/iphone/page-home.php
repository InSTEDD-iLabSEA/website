<?php
/*
	Template Name: Home Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div id="home-description" class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
				<div class="<?php wptouch_content_classes(); ?>"><?php echo get_option("homepage_instedd_description");?>				</div>
			</div><!-- wptouch_posts_classes() -->


			<div id="main" class="home">

				<?php /*?><div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
					<div class="<?php wptouch_content_classes(); ?>"><?php main_home_slider(); ?></div>
				</div><?php */?><!-- wptouch_posts_classes() -->
			
				<div id="home-columns-container">
					<div id="home-column1-container" class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
						<h2><?php echo get_option("homepage_column1_title");?></h2>
						<div class="home-boxes-text">
							<?php dynamic_sidebar("home-column1"); ?>
						</div>
					</div>
					<div id="home-column2-container" class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
						<h2><?php echo get_option("homepage_column2_title");?></h2>
						<div class="home-boxes-text">
							<?php dynamic_sidebar("home-column2"); ?>
						</div>			
					</div>
					<div id="home-column3-container" class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
						<h2><?php echo get_option("homepage_column3_title");?></h2>
						<div class="home-boxes-text">		
							<?php dynamic_sidebar("home-column3"); ?>						
							<h3><a href="http://trackernews.net/" target="_blank">TrackerNews</a></h3>
							<p style="margin-bottom: 9px; margin-top: 0;"><small style="font-size: 11px; font-style: italic;">An InSTEDD project</small></p>
							
							<?php $rss_posts = get_posts_from_rss(get_option('remote_blog_rss_url')); 
							foreach ($rss_posts as $p): ?>
								<p><strong><a href="<?php echo $p['link']; ?>" target="_blank"><?php echo $p['title']; ?></a></strong><br />
								<?php echo shortalize($p['desc']); ?> <a href="<?php echo $p['link']; ?>" target="_blank">Read&nbsp;more&nbsp;&raquo;</a></p>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="cl">&nbsp;</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>