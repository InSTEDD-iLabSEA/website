<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content press left video single">
					<h1><?php the_title(); ?></h1>
					<div class="item">
						<?php $video_url = get_meta('_video_url', $post->ID);
							echo create_embedcode($video_url, 540, 430); ?>
						<h3 style="margin-top: 12px;">View more of <a href="/multimedia/video/">InSTEDD's videos</a>.</h3>
					</div>
				</div>
				<?php get_sidebar("video"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>