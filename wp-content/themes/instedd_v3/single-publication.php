<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content press left publications single">
					<h1><?php the_title(); ?></h1>
					<?php if ( get_post_meta($post->ID, '_publication_subhead', TRUE) ) {?>
						<h2 class="publication-subhead"><?php echo get_post_meta($post->ID, '_publication_subhead', TRUE);?></h2>
					<?php }?>
					<p class="publication-author"><?php echo get_post_meta($post->ID, '_publication_author', TRUE);?></p>
					<div class="item">
						<?php $publication_embed = get_post_meta($post->ID, '_publication_embed', TRUE);?>
						<iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $publication_embed;?>" width="540" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
						<h3 style="margin-top: 12px;">View more of <a href="/multimedia/publications/">InSTEDD's publications</a>.</h3>
					</div>
				</div>
				<?php get_sidebar("publication"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>