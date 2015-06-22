<?php get_header(); ?>

	<div id="main" class="inner">
		<div class="content full-column left">
			<h1>Search Results</h1>
			<?php if (have_posts()) : ?>
				<p class="search-result-header">Your search for <strong><?php echo get_search_query();?></strong> found:</p>
			
				<?php while (have_posts()) : the_post(); ?>			
					<p id="post-<?php the_ID(); ?>" class="search-result"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><br/><small><?php the_time('F jS, Y') ?></small></p>
					<div class="search_excerpt"><? the_excerpt(); ?></div>
				<?php endwhile; ?>
			<?php else : ?>
				<p class="search-result-header">No results found for <strong><?php echo get_search_query();?></strong>.</p>
				<?php if ( function_exists('spell_suggest') ) { spell_suggest(); } ?>
				<?php //include (TEMPLATEPATH . '/searchform.php'); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
		<div class="cl">&nbsp;</div>
	</div>

<?php get_footer(); ?>