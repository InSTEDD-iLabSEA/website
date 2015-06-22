<?php get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php include( 'blog-loop.php' ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?> publications single">
				<h1><?php wptouch_the_title(); ?></h1>
				<?php if ( get_post_meta($post->ID, '_publication_subhead', TRUE) ) {?>
					<h2 class="publication-subhead"><?php echo get_post_meta($post->ID, '_publication_subhead', TRUE);?></h2>
				<?php }?>
				<p class="publication-author"><?php echo get_post_meta($post->ID, '_publication_author', TRUE);?></p>
				<div class="item">
					<?php $publication_embed = get_post_meta($post->ID, '_publication_embed', TRUE);?>
					<?php $publication_id = get_post_meta($post->ID, '_publication_id', TRUE);?>
					<iframe style="border:none;width:280px;height:233px;" src="/slideshare/embed.php?url=http://www.slideshare.net/InSTEDD/<?php echo $publication_id;?>&width=256¤t=1"></iframe>					
					<p>Can't see publication? View at <a href="http://www.slideshare.net/InSTEDD/<?php echo $publication_id;?>">slideshare.net</a></p>
										
<?php /*?>					<iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $publication_embed;?>" width="540" height="300" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
<?php */?>					<h3 style="margin-top: 12px;">View more of <a href="/multimedia/publications/">InSTEDD's publications</a>.</h3>
				</div>
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
<?php } ?>

<?php get_footer(); ?>