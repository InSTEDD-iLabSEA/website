<?php get_header(); ?>

<div id="main" class="inner">
	<?php get_sidebar('left-blog'); ?>
	<div class="content left blog-content archive">
		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<h1 class="pagetitle">
				<?php if (is_category()) { ?>
					Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category
				<?php } elseif( is_tag() ) { ?>
					Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
				<?php } elseif (is_day()) { ?>
					Archive for <?php the_time('F jS, Y'); ?>
				<?php } elseif (is_month()) { ?>
					Archive for <?php the_time('F, Y'); ?>
				<?php } elseif (is_year()) { ?>
					Archive for <?php the_time('Y'); ?>
				<?php } elseif (is_author()) { ?>
					Author Archive
				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					Blog Archives
				<?php } ?>
			</h1>
			
			<?php while (have_posts()) : the_post(); ?>

				<div class="item">
					<?php $image = get_meta('_post_blog_image'); ?>
					<?php if ($image): ?>
						<div class="image">
							<a href="<?php the_permalink(); ?>"><img src="<?php echo ecf_get_image_url($image); ?>" alt="" class="alignleft" /></a>
						</div>
					<?php endif ?>
					<div class="excerpt">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="publication-author"><?php the_time('F j, Y'); ?></p>
						<?php the_excerpt(); ?>
					</div>
				</div>
				<div class="cl">&nbsp;</div>
				
			<?php endwhile; ?>
	
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			</div>
			
		<?php else :
			if ( is_category() ) { // If this is a category archive
				printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
			} else if ( is_date() ) { // If this is a date archive
				echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
			} else if ( is_author() ) { // If this is a category archive
				$userdata = get_userdatabylogin(get_query_var('author_name'));
				printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
			} else {
				echo("<h2 class='center'>No posts found.</h2>");
			}
			//get_search_form();
			endif;
		?>
	</div>
	<?php get_sidebar("blog"); ?>
	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>