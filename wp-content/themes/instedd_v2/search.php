<?php get_header(); ?>

	<div id="main" class="inner">
		<?php get_sidebar('left'); ?>
		<div class="content press left">
			<h2 class="pagetitle">Search Results</h2>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="item">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
		<div class="cl">&nbsp;</div>
	</div>

<?php get_footer(); ?>