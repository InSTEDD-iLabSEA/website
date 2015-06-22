<?php
/*
	Template Name: Landing Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content ess left">
					<h2><?php the_title(); ?></h2>
					<div class="subpages-list">
						<?php $children = get_pages('sort_column=menu_order&parent=' . get_the_id() . '&child_of=' . get_the_id()); ?>
						<?php if ($children): $loopID = 0; ?>
							<?php foreach ($children as $c): $loopID++; ?>
								<div class="subpage">
									<?php 
										$thumb = get_meta('_page_thumbnail', $c->ID); 
										$descr = get_meta('_page_description', $c->ID);
									?>
									<?php if ($thumb): ?>
										<a href="<?php echo get_permalink($c->ID); ?>"><img src="<?php echo ecf_get_image_url($thumb); ?>" class="left" alt="" /></a>
									<?php endif; ?>
									<h3><a href="<?php echo get_permalink($c->ID); ?>"><?php echo apply_filters('the_title', $c->post_title); ?></a></h3>
									<?php if ($descr): ?>
										<?php echo apply_filters('the_content', $descr); ?>
									<?php endif ?>
								</div>
								<?php if ($loopID % 2 == 0): ?>
									<div class="cl">&nbsp;</div>
								<?php endif ?>
							<?php endforeach ?>
							<div class="cl">&nbsp;</div>
						<?php endif ?>
					</div>
				</div>
				<div class="cl">&nbsp;</div>
			</div>	
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>