<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> presentation">
			<h1><?php wptouch_the_title(); ?></h1>
				<p class="publication-author"><?php the_time('F j, Y'); ?></p>
				<?php the_content(); ?>
				<?php echo do_shortcode('[gallery columns="1" order="DESC" link="file" size="medium"]'); ?>
				<h3 style="margin-top: 12px;">View more of <a href="/news-media/photo-essays/">InSTEDD's photo essays</a>.</h3>
			<div class="cl">&nbsp;</div>
			<?php //endif; ?>

		</div>
	</div><!-- wptouch_posts_classes() -->
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("left"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->

<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>