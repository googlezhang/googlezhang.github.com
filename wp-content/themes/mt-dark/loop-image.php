<div <?php post_class();?>>
	<div class="postmeta">
		<?php if ( post_password_required() ) :
		?>
		<?php the_content();?>
		<?php else :?>
		<?php    $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
if ( $images ) {
$total_images = count( $images );
$image = array_shift( $images );
$image_img_tag = wp_get_attachment_image( $image->ID, 'large' );
		?>
		<a class="wp-post-image" href="<?php the_permalink();?>"><?php echo $image_img_tag;?></a>
		<?php } else {?>
		<a href="<?php echo the_permalink();?>" title="<?php printf(esc_attr__('Permalink to %s', 'mt-dark'), the_title_attribute('echo=0'));?>" rel="bookmark"> <?php
			if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
				the_post_thumbnail('large');
			}
		?></a>
		<?php }?>
		<?php endif;?>
		<ul>
			<li  class="alignleft">
				<a href="<?php echo get_post_format_link('image');?>" title="<?php esc_attr_e('View Images', 'mt-dark');?>"><img src="<?php echo get_template_directory_uri()?>/images/kpaint.png" /></a>
			</li>
			<?php
				if (function_exists('dark_posted_on'))
					dark_posted_on();
				if (comments_open()) :
					echo '<li>';
					comments_popup_link(__('No comments yet', 'mt-dark'), __('1 comment', 'mt-dark'), __('% comments', 'mt-dark'), 'comments-link', __('Comments are off for this post', 'mt-dark'));
					echo '</li> ';
				endif;
				dark_posted_footer();
			?>
		</ul>
	</div>
</div>
