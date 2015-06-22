	<?php
/*
	Template Name: Timeline Page
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/timeline-css.css" type="text/css" media="all" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/timeline.js" type="text/javascript"></script>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
							<?php get_sidebar('left'); ?>

				<h2><?php the_title(); ?></h2>
				<div class="item limitscroll">
					<?php $all_events = get_posts('post_type=event&showposts=-1'); ?>
					<?php if ($all_events): ?>
					    <div id="timelineLimiter"> <!-- Hides the overflowing timelineScroll div -->
					  <div id="slider-timeline"> <!-- The slider-timeline container -->
					        	<div id="bar"> <!-- The bar that can be dragged -->
					            <div id="barLeft"></div>
					            	Drag to Scroll  <!-- Left arrow of the bar -->
					                <div id="barRight"></div>  <!-- Right arrow, both are styled with CSS -->
					
					          </div>
					        </div>
						    <div id="timelineScroll"> <!-- Contains the timeline and expands to fit -->
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
						                <div class="eventHeading eventHeading-<?php echo $loopID; ?>"><?php echo $y; ?></div>
						                <?php $events = get_posts('post_type=event&showposts=-1&meta_key=_event_year&meta_value=' . $y); ?>
						                <ul class="eventList">
						                	<?php foreach ($events as $e): ?>
								                <li class="news">
													<?php $icon = get_meta('_event_icon', $e->ID); ?>
													<?php if ($icon): ?>
														<img align="left" width="50" height="40" class="icon" src="<?php echo ecf_get_image_url($icon); ?>" alt="" />
													<?php endif ?>
								                	<?php echo $e->post_title; ?>
													<div class="additional-content">
														<div class="body">
															<?php if ($icon): ?>
														<img class="icon" align="right" style="margin:10px;" src="<?php echo ecf_get_image_url($icon); ?>" alt="" />
													<?php endif ?><?php echo nl2br($e->post_content); ?>										
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
					
					        </div>
					        
					       
					        
					    </div> 
					<?php endif ?>

				</div>
								<?php  //get_sidebar(); ?>
	
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>