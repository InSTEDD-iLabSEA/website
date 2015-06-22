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
					<h1><?php the_title(); ?></h1>
					<div class="playable-videos">
						<?php 
							$videos = get_posts('post_type=video&showposts=-1');
							$loopID = 0;
							foreach ($videos as $v) {
								if ( $loopID == 0 ) {?>
									<div class="video-container">
										<div style="float: left; width: 460px;"><h2><?php echo $v->post_title; ?></h2></div>
										<div style="float: right;"><a style="color: #51832e;" href="<?php echo get_permalink($v->ID); ?>">Permalink</a></div>
										<?php $video_url = get_meta('_video_url', $v->ID);
										echo create_embedcode($video_url, 535, 426); ?>
										<div class="cl">&nbsp;</div>
										<div class="info">
											<?php echo apply_filters('the_content', $v->post_content); ?>
										</div>
									</div>
								<?php
									$loopID++;	
								}
							}
							addthis_share_button();
						?>
					</div>
					<div class="items">
						<h2>Recent Videos</h2>
						<?php $loopID = 0;
						foreach ($videos as $v):
							if ( $loopID > 0 ) { 
								// Skip the most recent video, since it's featured above		
								$video_url = get_meta('_video_url', $v->ID);?>
							<div class="item">
								<div class="image left">
									<a href="<?php echo get_permalink($v->ID); ?>"><img src="<?php echo get_youtube_thumbnail($video_url) ?>" width="100" height="83" alt="" /></a>
								</div>
								<div class="info left">
									<h3><a href="<?php echo get_permalink($v->ID); ?>"><?php echo $v->post_title; ?></a></h3>
									<?php echo apply_filters('the_content', $v->post_content); ?>
								</div>
								<div class="cl">&nbsp;</div>
							</div>	
						<?php }
							$loopID++;
						endforeach; ?>
					</div>
				</div>
				<?php get_sidebar("video"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>