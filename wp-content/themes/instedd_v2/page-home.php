<?php
/*
	Template Name: Home Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div id="main">
				<?php main_home_slider(); ?>
			
				<?php box_home_slider(); ?>
			
				<div class="feed feed-blog left">
					<div class="head">
						<h2>InSTEDD Blog</h2>
						<h3>The Latest In Our Work</h3>
					</div>
					<?php query_posts('showposts=3'); ?>
					<?php if (have_posts()): ?>
						<?php while(have_posts()): ?>
							<?php
								 the_post(); 
								 global $more; 
								 $more = 0;
							?>
							<div class="item">
								<?php $thumb = get_meta('_post_blog_image'); ?>
								<?php if ($thumb): ?>
									<div class="image left">
										<img src="<?php echo ecf_get_image_url($thumb); ?>" alt="<?php the_title(); ?>" width="72" height="40" />
									</div>
								<?php endif ?>
								<div class="info right">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php the_excerpt(); ?>
								</div>
								<div class="cl">&nbsp;</div>
							</div>
						<?php endwhile; ?>
					<?php endif ?>
					<?php wp_reset_query(); ?>
				</div>
			
				<div class="feed feed-news left">
					<div class="head">
						<h2>TrackerNews</h2>
						<h3>Health, Humanitarian, Tech</h3>
					</div>
					<?php $rss_posts = get_posts_from_rss(get_option('remote_blog_rss_url')); ?>
					<?php foreach ($rss_posts as $p): ?>
						<div class="item">
							<?php if ($p['media']): ?>
								<div class="image left">
									<a href="<?php echo $p['link']; ?>" target="_blank"><img src="<?php echo $p['media']; ?>" width="64" alt="" /></a>
								</div>
							<?php endif ?>
							<div class="info right">
								<h4><a href="<?php echo $p['link']; ?>" target="_blank"><?php echo $p['title']; ?></a></h4>
								<p><?php echo shortalize($p['desc']); ?> <a href="<?php echo $p['link']; ?>" target="_blank">Read more&gt;&gt;</a></p>
							</div>
							<div class="cl">&nbsp;</div>
						</div>
					<?php endforeach; ?>
				</div>
			
				<div class="home-widgets widgets right">
					<?php dynamic_sidebar('home-sidebar'); ?>
				</div>
				<div class="cl">&nbsp;</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>