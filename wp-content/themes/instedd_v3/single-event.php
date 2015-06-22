<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content press left publications single">
					<h1><?php the_title(); ?></h1>
					<div class="item">
						<?php $icon = get_meta('_event_icon', $post->ID);
							if ($icon) {?>
								<img align="left" width="70" height="56" class="icon" src="<?php echo ecf_get_image_url($icon); ?>" style="margin-right: 12px;" alt="" />
							<?php }?>
							<?php the_content();?>
						<h3 style="margin-top: 12px;">View more events in <a href="/about-us/history/">InSTEDD's history</a>.</h3>
					</div>
				</div>
				<?php get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>