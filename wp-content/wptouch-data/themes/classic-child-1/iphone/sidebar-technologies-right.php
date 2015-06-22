<div class="sidebar-r">
	<ul>
		<li class="widget icon">
			<div class="sidebar-technology-icon">
				<?php 
				$technology_startusing_signin = get_meta('_technology_startusing_signin');
				echo '<a href="'.$technology_startusing_signin.'" target="_blank">'.get_the_post_thumbnail($page->ID, 'full').'</a>';
				//echo '<p><a href="'.$technology_startusing_signin.'" target="_blank">'.get_the_title().'</a></p>';?>
			</div>
		</li>
		<?php dynamic_sidebar(PAGE_WIDGETS_SIDEBAR); ?>
    </ul>
</div>