<?php
/*
	Template Name: Photos Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content photo left">
					<h1><?php the_title(); ?></h1>
					<div class="playable-videos"><?php 
						$photos = get_posts('post_type=page&showposts=-1&post_parent=91');
						$photos = array_reverse( $photos );
						$loopID = 0;
						foreach ($photos as $v) {
							if ( $loopID == 0 ) {?>
								<div class="photo-container">
									<div style="float: left; width: 435px;"><h2><?php echo $v->post_title; ?></h2><?php
										$post_date = date( 'F d, Y', strtotime( $v->post_date ) );?>
										<p class="photos-date"><?php echo $post_date; ?></p>
									</div>
									<div style="float: right;"><a style="color: #51832e;" href="<?php echo get_permalink($v->ID); ?>">Permalink</a></div>		
									<div class="cl">&nbsp;</div><?php 
									$images = get_post_images($v->ID);
									if ($images): $loopID = 0;
										$Gallery = new Gallery();
										$Gallery -> slideshow($output = true, $post_id = $v->ID);
										echo $v->post_content; ?>
										<div class="cl">&nbsp;</div><?php 
									endif; ?>
								</div><?php
								$loopID++;
							}
						}
						addthis_share_button();?>
					</div>
					<div class="items">
						<h2>Recent Photo Essays</h2>
						<?php $loopID = 0;
						foreach ($photos as $v): 
							if ( $loopID > 0 ) { 
							// Skip the most recent photo essay, since it's featured above ?>
							<div class="item">
								<?php if ( get_the_post_thumbnail($v->ID) ): ?>
									<div class="image left">
										<a href="<?php echo get_permalink($v->ID); ?>"><?php echo get_the_post_thumbnail( $v->ID, 'thumbnail', array( 'class' => 'alignleft' ) );?></a>
									</div>
								<?php endif; ?>
								<div class="info left">
									<h3><a href="<?php echo get_permalink($v->ID); ?>"><?php echo $v->post_title; ?></a></h3><?php
									$post_date = date( 'F d, Y', strtotime( $v->post_date ) );?>
									<p class="photos-date"><?php echo $post_date; ?></p>
								</div>
								<div class="cl">&nbsp;</div>
							</div><?php
						}
						$loopID++;
						endforeach; ?>
					</div>
				</div>
				<?php // get_sidebar(); ?>			
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>