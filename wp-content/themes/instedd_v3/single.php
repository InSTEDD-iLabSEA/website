<?php get_header(); ?>
	<div id="main" class="inner">
		<?php get_sidebar('left-blog'); ?>
		<div class="content blog-content left single">
			<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="single-post">
						<h1><?php the_title(); ?></h1>
						<p class="publication-author">posted on: <?php the_time('F j, Y'); ?></p>					
						<div class="entry">
							<?php the_content(); ?>
							<?php comments_template(); ?>
						</div>
						<p><strong><a href="/news-media/blog/">View more of InSTEDD's blog posts.</a></strong></p>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar("blog-post"); ?>
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>