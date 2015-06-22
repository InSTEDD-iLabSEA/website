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
					<h1><?php the_title(); 
					$publications = get_posts('post_type=publication&showposts=-1&orderby=menu_order&order=ASC'); ?></h1>
					<div class="items">
						<?php 
						foreach ($publications as $v): ?>
							<div class="item">
								<div class="info left">
									<h3><a href="<?php echo get_permalink($v->ID); ?>"><?php echo $v->post_title; ?></a><?php if ( get_post_meta($v->ID, '_publication_subhead', TRUE) ) { echo " <span class='inline-subhead'>| ".get_post_meta($v->ID, '_publication_subhead', TRUE)."</span>";};?></h3>
									<p class="publication-author"><?php echo get_post_meta($v->ID, '_publication_author', TRUE);?></p>
								</div>
								<div class="cl">&nbsp;</div>
							</div>	
						<?php endforeach; ?>
					</div>
				</div>
				<?php get_sidebar("publication"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>