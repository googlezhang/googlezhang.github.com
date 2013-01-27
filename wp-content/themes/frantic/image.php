<?php get_header(); ?>

			<div id="content" class="clearfix">
			
				<div id="main" class="clearfix">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
      
      					<header>
        					<h1 class="h2"><?php the_title(); ?></h1>
      					</header>
                        
                        
                        
                        <p class="meta linebrk"><?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%7$s</a>', 'bloggable' ),
									esc_attr( get_the_time() ),
									get_the_date(),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									get_the_title( $post->post_parent )
								);
							?></p>
      
      					<section class="post_content clearfix">
      						<p class="attachment text-center"><?php
	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
	 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
	 */
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
								$attachment_size = apply_filters( 'attachment_size', 848 );
								echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
								?></a>

								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption text-center">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?></p>
      						

      						<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'frantic') . '</span>', 'after' => '</div>' ) ); ?>
      					</section>
      					
      					<footer>
							<nav class="wp-prev-next">
								<ul class="clearfix">
        							<li class="prev-link"><?php previous_image_link( false, __( '&larr; Previous' , 'frantic' ) ); ?></li>
        							<li class="next-link"><?php next_image_link( false, __( 'Next &rarr;' , 'frantic' ) ); ?></li>
        						</ul>
      						</nav>
      					</footer>
    				</article>
    				
    				<?php endwhile; else: ?>
    				
    				<div class="help">
    					<p><?php _e('Sorry, no attachments matched your criteria.', 'frantic'); ?></p>
    				</div>

					<?php endif; ?>

  				</div> <!-- end #main -->
  				

  				
  			</div> <!-- end #content -->

<?php get_footer(); ?>