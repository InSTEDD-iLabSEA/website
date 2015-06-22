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
				<div class="content left">
					<h1><?php the_title(); ?></h1>
					<?php 
						$images = get_post_images(get_the_id());
						if ($images): $loopID = 0;
						$Gallery = new Gallery();
						$Gallery -> slideshow($output = true, $post_id = $post->ID);?>
						<p class="publication-author"><?php the_time('F j, Y'); ?></p>
						<?php the_content(); ?>
						<h3 style="margin-top: 12px;">View more of <a href="/multimedia/photos/">InSTEDD's photo essays</a>.</h3>
					<div class="cl">&nbsp;</div>
					<?php endif; ?>
				</div>
				<?php get_sidebar(); ?>						
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>