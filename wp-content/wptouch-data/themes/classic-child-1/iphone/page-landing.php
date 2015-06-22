<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> presentation">
			<h1><?php wptouch_the_title(); ?></h1>
			<?php wptouch_the_content(); ?>

			<div class="subpages-list" style="border-top: 1px solid #ECECEC; margin-top: 18px; padding-top: 12px;">
				<?php $children = get_pages('sort_column=menu_order&parent=' . get_the_id() . '&child_of=' . get_the_id()); ?>
					<?php foreach ($children as $c): $loopID++; ?>
						<div class="subpage">
							<div class="icon-technology">
								<a href="<?php echo get_permalink($c->ID); ?>"><?php
								if ( class_exists('MultiPostThumbnails')) {
									MultiPostThumbnails::the_post_thumbnail('page', 'technology-thumbnail',$c->ID);
								}?></a>
							</div><div class="clear"></div>
							<div class="text-technology">
								<p><?php echo $c->post_excerpt;?></p>
							</div>
						</div>
					<?php endforeach ?>
					<div class="cl">&nbsp;</div>
			</div>
		</div>
		
	</div><!-- wptouch_posts_classes() -->

<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>