<?php
/*
	Template Name: Home Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div id="main" class="home">
				<div id="home-description-container">
					<div id="home-description">
						<p style="margin-bottom: 20px;"><?php echo get_option("homepage_instedd_description");?>
					</div>
				</div>
				<?php main_home_slider(); ?>
			
				<div id="home-columns-container">
					<div id="home-column1-container" class="home-column">
	
						<h2> About iLab Southeast Asia </h2>
						<div class="home-boxes-text">
							<?php dynamic_sidebar("home-column1"); ?>
						</div>
					</div>

					<div id="home-column2-container" class="home-column">
						<h2><?php echo get_option("homepage_column2_title");?></h2>
						<div class="home-boxes-text">
							<?php dynamic_sidebar("home-column2"); ?>
						</div>			
					</div>

					<div id="home-column3-container">
						<h2><?php echo get_option("homepage_column3_title");?></h2>
						<div class="home-boxes-text">		
							<?php dynamic_sidebar("home-column3"); ?>						
						</div>
					</div>
				</div>
				<div class="cl">&nbsp;</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>