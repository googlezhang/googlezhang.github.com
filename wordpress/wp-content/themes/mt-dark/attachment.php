<?php get_header();?>
<div id="wrapper" class="container_12">
	<div class=" grid_12">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		?>
		<div <?php post_class('post');?>>
			<div class="alignleft padding10">
				&larr; <?php previous_image_link(false);?>
			</div>
			<div class="alignright padding10">
				<?php next_image_link(false);?>
				&rarr;
			</div>
			<?php the_title('<h1 class="title">', '</h1>');?>
			<div class="entry">
				<?php if ( wp_attachment_is_image() ) :
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )	break; }	$k++;
if ( count( $attachments ) > 1 ) {	if ( isset( $attachments[ $k ] ) )
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );	else
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else { $next_attachment_url = wp_get_attachment_url(); }
				?>
				<p>
					<a href="<?php echo $next_attachment_url;?>" title="<?php echo esc_attr(get_the_title());?>" rel="attachment"><?php
					$attachment_size = apply_filters('', 900);
					echo wp_get_attachment_image($post -> ID, array($attachment_size, 9999));
					?></a>
				</p>
				<?php else :?>
				<a href="<?php echo wp_get_attachment_url();?>" title="<?php echo esc_attr(get_the_title());?>" rel="attachment"><?php echo basename(get_permalink());?></a>
				<?php endif;?>
				<?php
					if(!empty($post -> post_excerpt))
						the_excerpt();
				?>
				<?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'mt-dark'));?>
			</div>
		</div>
		<?php comments_template();?>
		<div id="exif">
			<?php if ( ! empty( $post->post_parent ) ) :
			?>
			<a href="<?php echo get_permalink($post -> post_parent);?>" title="<?php esc_attr(printf(__('Return to %s', ''), get_the_title($post -> post_parent)));?>" rel="gallery"> <?php 	printf(__('<span class="meta-nav">&larr;</span> %s', 'mt-dark'), get_the_title($post -> post_parent));?></a>
			<?php endif;?>

			<?php $imgmeta = wp_get_attachment_metadata($id);
	echo "<ul class=\"entry-meta \">\n";
	if(($imgmeta['image_meta']['title']) != '') { echo _e('<li>Title : ', 'mt-dark') . $imgmeta['image_meta']['title'] . "</li>\n";
	}
	printf(__('<li><span class="%1$s">Published</span> %2$s', 'mt-dark'), 'meta-prep meta-prep-entry-date', sprintf('<span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span></li>', esc_attr(get_the_time()), get_the_date()));
	if(wp_attachment_is_image()) { echo ' <li>';
		$metadata = wp_get_attachment_metadata();
		printf(__('Full size is:<br /> %s pixels', 'mt-dark'), sprintf('<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>', wp_get_attachment_url(), esc_attr(__('Link to full-size image', 'mt-dark')), $metadata['width'], $metadata['height']));
	}
			?>
			<?php edit_post_link(__('Edit', 'mt-dark'), '', '<br /></li>');?>

			<?php
			if(($imgmeta['image_meta']['caption']) != '') {echo _e('<li>Caption: ', 'mt-dark') . $imgmeta['caption'] . "</li>\n";
			}
			if(($imgmeta['image_meta']['camera']) != '') {echo _e('<li>Camera: ', 'mt-dark') . $imgmeta['image_meta']['camera'] . "</li>\n";
			}
			if(($imgmeta['image_meta']['aperture']) != '0') {echo _e('<li>Aperture: f/', 'mt-dark') . $imgmeta['image_meta']['aperture'] . "</li>\n";
			}
			if(($imgmeta['image_meta']['copyright']) != '') {echo _e('<li>Copyright: ', 'mt-dark') . $imgmeta['image_meta']['copyright'] . "</li>\n";
			}
			if(($imgmeta['image_meta']['credit']) != '') {echo _e('<li>Credit: ', 'mt-dark') . $imgmeta['image_meta']['credit'] . "</li>\n";
			}
			if(($imgmeta['image_meta']['focal_length']) != '0') {echo _e('<li>Focal Length: ', 'mt-dark') . $imgmeta['image_meta']['focal_length'] . "mm</li>\n";
			}
			if(($imgmeta['image_meta']['iso']) != '0') {echo _e('<li>ISO: ', 'mt-dark') . $imgmeta['image_meta']['iso'] . "</li>\n";
			}
			if(($imgmeta['image_meta']['shutter_speed']) != '0') {echo _e('<li>Shutter Speed: ', 'mt-dark') . number_format($imgmeta['image_meta']['shutter_speed'], 4) . " s.</li>\n";
			}
			echo "</ul>";
			?>
		</div>
		<?php endwhile;?>
	</div><!-- #content -->
	<div class="clear"></div>
</div><!-- #container -->
<?php get_footer();?>
