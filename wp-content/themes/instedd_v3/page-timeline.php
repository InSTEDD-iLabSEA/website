<?php
/*
	Template Name: Timeline Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content left">
					<h1><?php the_title(); ?></h1>
					<div class="item">
						<?php $all_events = get_posts('post_type=event&showposts=-1'); ?>
						<?php if ($all_events): ?>
							<?php
								$years = array();
								foreach ($all_events as $e) {
									$year = get_meta('_event_year', $e->ID);
									if (!in_array($year, $years)) {
										$years[] = $year;
									}
								}
								sort($years);
								$loopID = 0;
							?>
									
							<?php foreach ($years as $y): $loopID++;?>															
								<div class="event">
									<h2><?php echo $y; ?></h2>
											<?php $events = get_posts('post_type=event&showposts=-1&meta_key=_event_year&meta_value=' . $y); ?>
											<ul class="eventList">
												<?php foreach ($events as $e): ?>
													<li class="news">
														<?php $icon = get_meta('_event_icon', $e->ID); ?>
														<?php if ($icon): ?>
															<img align="left" width="70" height="56" class="icon" src="<?php echo ecf_get_image_url($icon); ?>" style="margin-right: 12px;" alt="" />
														<?php endif ?>
														<?php echo '<p>'.$e->post_title.'</p>'; ?>
														<div class="additional-content">
															<div class="body">
																<?php if ($icon): ?>
															<img class="icon" align="right" style="margin:10px;" src="<?php echo ecf_get_image_url($icon); ?>" alt="" />
														<?php endif ?><?php echo nl2br($e->post_content); ?></p>
															</div>
															<div class="title"><?php echo $e->post_title; ?></div>
															<div class="date"><?php echo date('F d, Y', strtotime($e->post_date)); ?></div>
														</div>
													</li>
												<?php endforeach ?>
											</ul>
										</div>
								<?php
									if ($loopID == 3) {
										$loopID = 0;
									}
								?>
							<?php endforeach ?>
											
							<div class="cl">&nbsp;</div>
						<?php endif ?>
					</div>				
				</div>
				<?php  get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>