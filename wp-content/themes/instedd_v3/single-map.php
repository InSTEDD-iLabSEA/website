<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left-projects'); ?>
				<div class="content press left publications">
					<h1><?php the_title(); ?></h1>
					<div class="item"><?php 
						the_content(); 
						echo "<p><strong>Category:</strong> " . get_the_term_list( $post->ID, 'Network Type', '', ', ', '' ) . "</p>";?>
					</div>
				</div>
				<?php get_sidebar("projects"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>