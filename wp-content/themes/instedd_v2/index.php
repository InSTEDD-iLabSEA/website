<?php get_header(); ?>
	<div id="main" class="inner">
		<div class="content blog-content left">
		 <?php  ?>
				<?php  the_featured_blog_posts(); ?>
				<?php query_posts('cat=-10');  if (have_posts()) : $loopID = 0; while (have_posts()) : the_post(); $loopID++; ?>
					<div class="not-singular-post <?php echo ($loopID % 3 == 0) ? 'tertiary' : ''; ?>">
						<div class="post-image">
							<?php $image = get_meta('_post_blog_image'); ?>
							<?php if ($image): ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo ecf_get_image_url($image); ?>" alt=""  /></a>
							<?php endif ?>
							<div class="postmeta">
								<p><?php the_time('F d, Y'); ?></p>
								<?php comments_popup_link('0', '1', '%'); ?>
							</div>
						</div>
						<div class="post-details">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>