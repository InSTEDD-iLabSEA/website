<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> presentation">
			<h1><?php wptouch_the_title(); ?></h1>
			<?php
				$publications = get_posts('post_type=publication&showposts=-1&orderby=menu_order&order=ASC'); ?>
				<div class="items">
					<?php 
					foreach ($publications as $v): ?>
						<div class="item">
							<div class="info left">
								<h3><a href="<?php echo get_permalink($v->ID); ?>"><?php echo $v->post_title; ?></a><?php if ( get_post_meta($v->ID, '_publication_subhead', TRUE) ) { echo " <div class='item-subhead'>".get_post_meta($v->ID, '_publication_subhead', TRUE)."</div>";};?></h3>
								<p class="publication-author"><?php echo get_post_meta($v->ID, '_publication_author', TRUE);?></p>
							</div>
							<div class="cl">&nbsp;</div>
						</div>	
					<?php endforeach; ?>
				</div><?php					
				if ( $videos->max_num_pages > 1 ) : ?>
					<div class="cl">&nbsp;</div> 	
					<div id="nav-below" class="pagination">
						<?php 
						if ( $paged != 1 ) {?>
							<a href="<?php echo $base_link . 'page/' . ($paged - 1);?>" class="text-link-previous">&laquo; Previous</a>
						<?php }
						for( $i=1; $i<=$videos->max_num_pages; $i++ ){?><a href="<?php echo $base_link . 'page/' . $i;?>" <?php echo ($paged==$i)? 'class="active number-link"':'class="number-link"';?>><?php echo $i;?></a>
						<?php }
						if( $paged != $videos->max_num_pages ){?>
							<a href="<?php echo $base_link . 'page/' . ($paged + 1);?>" class="text-link-next">Next &raquo;</a>
						<?php } ?>
					</div><!-- #nav-below -->
				<?php endif; 					
				wp_reset_query();?>	
		</div>
		
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("left"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("publication"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>