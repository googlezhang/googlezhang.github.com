<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="sidebar" class="widget-area col300" role="complementary">
        	<div id="search-main">
        	<?php get_search_form(); ?>
            </div>
            
            <div class="widget-area">
			  <?php do_action( 'before_sidebar' ); ?>
			  <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h2 class="widget-title"><?php _e( 'Archives', 'bloggable' ); ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h2 class="widget-title"><?php _e( 'Meta', 'bloggable' ); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			  <?php endif; // end sidebar widget area ?>
            </div>
		</div><!-- #secondary .widget-area -->
