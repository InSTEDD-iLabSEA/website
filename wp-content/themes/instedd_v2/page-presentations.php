<?php
/*
	Template Name: Presentations Page
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
							$presentations = get_posts('post_type=presentation&showposts=-1');
							$loopID = 0;
							foreach ($presentations as $v) {
								$presentation_embed = get_meta('_presentation_embed', $v->ID);
								if (!$presentation_embed) {
									continue;
								}
								$topics = get_meta('_presentation_topics', $v->ID);
								$loopID++;
								?>
								<div id="play-video-<?php echo $v->ID; ?>" class="presentation-container " <?php echo ($loopID > 1) ? 'style="display: none;"' : ''; ?>>
									<div class="image left">
										<?php echo $presentation_embed; ?>
									</div>
								
									<div class="cl">&nbsp;</div>
									<h3><?php echo $v->post_title; ?></h3>
										<?php echo apply_filters('the_content', $v->post_content); ?>
								</div>
								<?php
							}
							addthis_share_button(); 
						?>						
					</div>
					<div class="items">
						<h3 class="left">Recent Presentations</h3>
						<a href="#" class="browse right">Browse archive &gt;&gt;</a>
						<div class="cl">&nbsp;</div>
						<?php foreach ($presentations as $v): ?>
							<?php
								$presentation_embed = get_meta('_presentation_embed', $v->ID);
								if (!$presentation_embed) {
									continue;
								}
								$thumb = get_meta('_presentation_thumb', $v->ID);
							?>
							<div class="item">
								<?php if ($thumb): ?>
									<div class="image left">
										<a href="#" class="play-video" rel="video-<?php echo $v->ID; ?>"><img src="<?php echo ecf_get_image_url($thumb); ?>" width="115" height="95" alt="" /></a>
									</div>
								<?php endif; ?>
								<div class="info left">
									<h4><a href="#" class="play-video" rel="video-<?php echo $v->ID; ?>"><?php echo $v->post_title; ?></a></h4>
									<h5><?php echo date('j F Y', strtotime($v->post_date)); ?></h5>
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