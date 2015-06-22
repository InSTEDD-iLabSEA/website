<?php get_header(); ?>
	<div id="main" class="inner">
		<?php get_sidebar('left'); ?>
		<div class="content press left">
			<h1>Page Not Found</h1>
			<div class="item">
				<p>Please check the URL for proper spelling and capitalization. If you're having trouble locating a destination, try visiting the <a href="<?php echo get_option('home') ?>">home page</a></p>
			</div>
		</div>
		<?php get_sidebar(); ?>
		<div class="cl">&nbsp;</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>