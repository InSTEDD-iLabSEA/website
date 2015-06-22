				</div><!-- #content -->
					
				<?php do_action( 'wptouch_body_bottom' ); ?>
				<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
					<div class="<?php wptouch_content_classes(); ?>" style="padding-bottom: 0;">						
						<div id="secondary-menu">
							<?php dynamic_sidebar('secondary-menu'); ?>
						</div>
						<div class="clear"></div>
						<div id="tertiary-menu">
							<?php dynamic_sidebar('tertiary-menu'); ?>
						</div>
					</div>
				</div><!-- wptouch_posts_classes() -->

				<div class="copyright">
					<p class="copyright">&copy; 2006-<? print date("Y");?> InSTEDD<br /><a href="/privacy-policy/">Privacy Policy</a> | <a href="/terms-of-service/">Terms of Service</a></p>
				</div>
												
				<?php if ( wptouch_show_switch_link() ) { ?>
					<div id="switch" class="rounded-corners-8px">
						<span class="switch-text">
							<?php _e( "Mobile Theme", "wptouch-pro" ); ?>
						</span>
						<a href="<?php wptouch_the_mobile_switch_link(); ?>"><input type="checkbox" checked="checked" /></a>
					</div>
				<?php } ?>
						
				<div class="<?php wptouch_footer_classes(); ?>">
					<?php wptouch_footer(); ?>
				</div>
	
				<?php do_action( 'wptouch_advertising_bottom' ); ?>
			</div> <!-- #inner-ajax -->
		</div> <!-- #outer-ajax -->
		<?php // include_once('web-app-bubble.php'); ?>
		<!-- <?php echo 'WPtouch Pro v.' . WPTOUCH_VERSION; ?> -->
	</body>
</html>