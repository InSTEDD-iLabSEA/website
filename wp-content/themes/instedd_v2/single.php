<?php get_header(); ?>
	<div id="main" class="inner">
		<div class="content blog-content left">
			<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="single-post">
						<h2><?php the_title(); ?></h2>
						<div class="entry">
							<?php the_content(); ?>
							<?php comments_template(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>