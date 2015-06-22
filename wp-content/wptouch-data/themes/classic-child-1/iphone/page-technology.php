<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> tech">
			<h1><?php
					$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
					if ( $custom_header ) { echo $custom_header;} else { wptouch_the_title();}?></h1>
			<?php
				$excerpt = preg_replace('/(<a.+?)+(<\/a>)/i', '', get_the_excerpt() ); 
				echo '<div class="technology-description">'.$excerpt."</div>";?>					
			<?php wptouch_the_content(); ?>
		</div>
		
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("technologies-right"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>