<?php
/*
	Template Name: Publications Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content left presentation">
					<h1><?php the_title(); ?></h1>
					<div class="playable-videos">
						<?php 
							$publications = get_posts('post_type=publication&showposts=-1&orderby=menu_order&order=ASC');
							$loopID = 0;
							foreach ($publications as $v) {
								if ( $loopID == 0 ) {?>
									<div class="publication-container">
										<h2><?php echo $v->post_title; ?></h2>
										<?php if ( get_post_meta($v->ID, '_publication_subhead', TRUE) ) {?>
											<h3 class="publication-subhead"><?php echo get_post_meta($v->ID, '_publication_subhead', TRUE);?></h3>
										<?php }?>									
										<p class="publication-author"><?php echo get_post_meta($v->ID, '_publication_author', TRUE);?> | <a href="<?php echo get_permalink($v->ID); ?>">Permalink</a></p>
										<div class="iframe-container">
											<?php $publication_embed = get_post_meta($v->ID, '_publication_embed', TRUE);?>
											<iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $publication_embed;?>" width="510" height="300" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
										</div>
										<div class="cl">&nbsp;</div>
									</div>
								<?php
								$loopID++;
								}
							}?>
							<?php addthis_share_button(); 
						?>						
					</div>
					<div class="items">
						<h2>Recent Publications</h2>
						<?php $loopID = 0;
						foreach ($publications as $v): 
							if ( $loopID > 0 ) { 
							// Skip the most recent publication, since it's featured above ?>
							<div class="item">
								<div class="info left">
									<h3><a href="<?php echo get_permalink($v->ID); ?>"><?php echo $v->post_title; ?></a><?php if ( get_post_meta($v->ID, '_publication_subhead', TRUE) ) { echo " <span class='inline-subhead'>| ".get_post_meta($v->ID, '_publication_subhead', TRUE)."</span>";};?></h3>
									<p class="publication-author"><?php echo get_post_meta($v->ID, '_publication_author', TRUE);?></p>
								</div>
								<div class="cl">&nbsp;</div>
							</div>	
						<?php }
							$loopID++;
						endforeach; ?>
					</div>
				</div>
				<?php get_sidebar("publication"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>