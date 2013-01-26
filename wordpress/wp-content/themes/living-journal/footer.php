
	<footer id="colophon" role="contentinfo">
       <div class="footer-wrap">
		<div id="site-generator">
			<?php echo __('&copy; ', 'living-journal') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_home() || is_front_page() ) : ?>
            <?php _e('- Powered by ', 'living-journal'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'living-journal' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'living-journal' ); ?>"><?php _e('Wordpress' ,'living-journal'); ?></a>
			<?php _e(' and ', 'living-journal'); ?><a href="<?php echo esc_url( __( 'http://citizenjournal.net/', 'living-journal' ) ); ?>"><?php _e('Citizen Journal', 'living-journal'); ?></a>
            <?php endif; ?> 
		</div>
      </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>