
</div><!-- #page -->

<footer id="colophon" role="contentinfo">
    <div id="site-generator">
        <?php echo __('&copy; ', 'bloggable') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
		<?php if ( is_home() || is_front_page() ) : ?>
        <?php _e('- Powered by ', 'bloggable'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bloggable' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'bloggable' ); ?>"><?php _e('Wordpress' ,'bloggable'); ?></a>
        <?php _e(' and ', 'bloggable'); ?><a href="<?php echo esc_url( __( 'http://wpthemes.co.nz/', 'bloggable' ) ); ?>"><?php _e('WPThemes.co.nz', 'bloggable'); ?></a>
        <?php endif; ?> 
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>