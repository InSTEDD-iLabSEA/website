<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content press left presentations single">
					<h1><?php the_title(); ?></h1>
					<div class="item">
						<?php $presentation_embed = get_post_meta($post->ID, '_presentation_embed', TRUE);?>
						<iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $presentation_embed;?>" width="540" height="442" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
						<h3 style="margin-top: 12px;">View more of <a href="/multimedia/presentations/">InSTEDD's presentations</a>.</h3>
					</div>
				</div>
				<?php get_sidebar("presentations"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>