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
					<h1><?php
					$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
					if ( $custom_header ) { echo $custom_header;} else { the_title();}?>
					</h1>
					<?php the_content(); ?>
					<div class="subpages-list" style="border-top: 1px solid #ECECEC; margin-top: 18px; padding-top: 12px;">
						<?php $children = get_pages('sort_column=menu_order&parent=' . get_the_id() . '&child_of=' . get_the_id()); ?>
						<?php if ($children): $loopID = 0; ?>
							<?php foreach ($children as $c): $loopID++; ?>
								<div class="subpage">
									<div class="icon-technology">
										<a href="<?php echo get_permalink($c->ID); ?>"><?php
										if ( class_exists('MultiPostThumbnails')) {
											MultiPostThumbnails::the_post_thumbnail('page', 'technology-thumbnail',$c->ID);
										}?></a>
									</div><br class="clear" />
									<div class="text-technology">
										<?php echo $c->post_excerpt;?>
									</div>
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