<?php
/*
	Template Name: Photo Essay Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content ess left">
					<h2>Photo Essays</h2>
					<?php $images = get_post_images(get_the_id()); ?>
					<?php if ($images): $loopID = 0; ?>
						<div class="holder">
							<div class="images left">
							<?php
							    $Gallery = new Gallery();
							    $Gallery -> slideshow($output = true, $post_id = $post->ID);
							?>
							</div>
							<div class="descr right">
								<h3><?php the_title(); ?></h3>
								<h4><?php the_time('F d, Y'); ?></h4>
								<?php the_content(); ?>
							</div>
							<div class="cl">&nbsp;</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>