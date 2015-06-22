<?php
/*
	Template Name: Network Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left-network'); ?>
				<div class="content video left">
					<div class="playable-videos">
						<h1><?php the_title();?></h1>
						<?php the_content(); ?>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<?php get_sidebar("network"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>