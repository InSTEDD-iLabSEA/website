<?php
/*
	Template Name: Videos Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content video left">
					<h2><?php the_title(); ?></h2>
					<div class="playable-videos">
						<?php 
							$videos = get_posts('post_type=video&showposts=-1');
							$loopID = 0;
							foreach ($videos as $v) {
								$video_url = get_meta('_video_url', $v->ID);
								if (!$video_url) {
									continue;
								}
								$topics = get_meta('_video_topics', $v->ID);
								$loopID++;
								?>
								<div id="play-video-<?php echo $v->ID; ?>" class="head" <?php echo ($loopID > 1) ? 'style="display: none;"' : ''; ?>>
									<div class="image left">
										<?php echo create_embedcode($video_url, 327, 269); ?>
									</div>
									<div class="info right">
										<h4>Now Playing</h4>
										<h3><?php echo $v->post_title; ?></h3>
										<?php echo apply_filters('the_content', $v->post_content); ?>
										<div class="b">

											<?php if ($topics): ?>
												<p>Topics: <span><?php echo $topics; ?></span></p>
											<?php endif ?>
										</div>
									</div>
									<div class="cl">&nbsp;</div>
									<?php addthis_share_button(); ?>
								</div>
								<?php
							}
						?>
					</div>
					<div class="items">
						<h3 class="left">Recent Videos</h3>
						<a href="#" class="browse right">Browse archive &gt;&gt;</a>
						<div class="cl">&nbsp;</div>
						<?php foreach ($videos as $v): ?>
							<?php
								$video_url = get_meta('_video_url', $v->ID);
								if (!$video_url) {
									continue;
								}
							?>
							<div class="item">
								<div class="image left">
									<a href="#" class="play-video" rel="video-<?php echo $v->ID; ?>"><img src="<?php echo get_youtube_thumbnail($video_url) ?>" width="115" height="95" alt="" /></a>
								</div>
								<div class="info left">
									<h4><a href="#" class="play-video" rel="video-<?php echo $v->ID; ?>"><?php echo $v->post_title; ?></a></h4>
									<?php echo apply_filters('the_content', $v->post_content); ?>
								</div>
								<div class="cl">&nbsp;</div>
							</div>	
						<?php endforeach; ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>