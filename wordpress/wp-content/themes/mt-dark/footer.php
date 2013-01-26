<div id="footer">
	<?php if(!is_attachment())  :
	?>
		<?php	if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' )) :
		?>	
	<div class="container_12">
		<?php	if ( is_active_sidebar( 'first-footer-widget-area' ) ) :
		?>
		<div class="grid_6">
			<ul class="widget">
				<?php dynamic_sidebar('first-footer-widget-area');?>
			</ul>
		</div>
		<?php  endif?>
		<?php	if ( is_active_sidebar( 'second-footer-widget-area' ) ) :
		?>
		<div class="grid_6">
			<ul class="widget">
				<?php dynamic_sidebar('second-footer-widget-area');?>
			</ul>
		</div>
		<?php  endif?>
	</div>
	<?php  endif?>
	<?php  endif?>
	<ul class="menubtm">
		<?php wp_register();?>
		<li>
			<?php wp_loginout();?>,
		</li>
		<li>
			<a href="<?php bloginfo('rss2_url');?>" title="<?php _e('Syndicate this site using RSS', 'mt-dark');?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>', 'mt-dark');?></a>,
		</li>
		<li>
			<a href="<?php bloginfo('comments_rss2_url');?>" title="<?php _e('The latest comments to all posts in RSS', 'mt-dark');?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>', 'mt-dark');?></a>,
		</li>
		<li>
			<a href="<?php echo esc_url(__('http://wordpress.org/', 'mt-dark'));?>" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'mt-dark');?>"><abbr rel="generator">WP</abbr></a>,
		</li>
		<li>
			<?php _e('Theme design by', 'mt-dark');?> <?php if (is_home()) {
			?><a href="<?php echo esc_url(__('http://blankcanvas.eu', 'mt-dark'));?>"> Blank Canvas </a><?php } else {?>
			Blank Canvas <?php }?>
		</li>
		<?php wp_meta();?>
	</ul>
</div>
<?php wp_footer();?>
</body>
</html>