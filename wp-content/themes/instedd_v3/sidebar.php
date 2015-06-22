<div class="sidebar-r right">
	<ul>
		<?php
		global $post;
		$ancestors = get_post_ancestors( $post->ID );
		if ( ( $post->ID == 91 ) OR ( in_array( 91, $ancestors ) ) ) {
			// Photos section
			dynamic_sidebar("Sidebar: Photos"); 
		} elseif ( ( $post->ID == 913 ) OR ( in_array( 913, $ancestors ) ) )  {
			// Team sidebar
			dynamic_sidebar("Sidebar: Team"); 
		} elseif ( $post->ID == 911 )  {
			// About Us > Guiding Principles sidebar
			dynamic_sidebar("Sidebar: About Us | Guiding"); 
		} elseif ( ( $post->ID == 910 ) OR ( in_array( 910, $ancestors ) ) OR get_post_type() == "event")  {
			// About Us sidebar
			dynamic_sidebar("Sidebar: About Us"); 
		} elseif ( ( $post->ID == 921 ) )  {
			// iLab Main Page sidebar
			dynamic_sidebar("Sidebar: iLabs"); 
		} elseif ( ( $post->ID == 2643 ) )  {
			// iLab SE sidebar
			dynamic_sidebar("Sidebar: iLabs | SE Asia"); 
		} elseif ( ( $post->ID == 2645 ) )  {
			// iLab Latin Am sidebar
			dynamic_sidebar("Sidebar: iLabs | Latin Am"); 
		} elseif ( ( $post->ID == 2632 ) )  {
			// Approach sidebar
			dynamic_sidebar("Sidebar: Our Work | Approach"); 
		} elseif ( ( $post->ID == 2779 ) )  {
			// Consulting sidebar
			dynamic_sidebar("Sidebar: Our Work | Consulting"); 
		} elseif ( ( $post->ID == 575 ) )  {
			// Donate sidebar
			dynamic_sidebar("Sidebar: Donate"); 			
		} elseif ( ( $post->ID == 578 ) )  {
			// Contact Us sidebar
			dynamic_sidebar("Sidebar: Contact Us"); 			
		} elseif ( ( $post->ID == 93 ) )  {
			// Images sidebar
			dynamic_sidebar("Sidebar: Images"); 			
		} else {
			// Default sidebar
			dynamic_sidebar("General Sidebar"); 
		}
	?>
    </ul>
</div>