<?php get_header(); ?>

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?>">
			<h1><?php
				$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
				if ( $custom_header ) { echo $custom_header;} else { the_title();}?>
			</h1>
			<?php wptouch_the_content(); ?>		
		</div><!-- wptouch_posts_classes() -->
	</div>

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>" style="padding-bottom: 0;">
			<?php get_sidebar('left-network'); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("network"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>