<div <?php post_class();?>>
	<div class="postmeta">
		<?php if ( post_password_required() ) :
		?>
		<h2><a href="<?php the_permalink();?>" title="<?php echo esc_attr(sprintf(__('Permanent Link to %s', 'mt-dark'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php the_title();?></a></h2>
		<?php the_content();?>
		<?php else :?>
		<?php $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
if ( $images ) :
$total_images = count( $images );
$image = array_shift( $images );
$image_img_tag = wp_get_attachment_image( $image->ID, 'medium' );
		?>
		<?php endif;?>
		<h2><a href="<?php the_permalink();?>" title="<?php echo esc_attr(sprintf(__('Permanent Link to %s', 'mt-dark'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php the_title();?></a></h2>
		<?php if ($image_img_tag) :
		?><a class="alignleft"  style="margin-right:10px" href="<?php the_permalink();?>"><?php echo $image_img_tag;?></a><?php endif;?>
		<?php printf(__('<p>This gallery contains <a %1$s>%2$s photo</a>.</p>', 'mt-dark'), 'href="' . get_permalink() . '" title="' . sprintf(esc_attr__('Permalink to %s', 'mt-dark'), the_title_attribute('echo=0')) . '" rel="bookmark"', number_format_i18n($total_images));?>
		<?php the_excerpt();?>
		<?php endif;?>
		<div class="clear"></div>
		<ul >
<li class="alignleft">
			<a href="<?php echo get_post_format_link('gallery');?>" title="<?php esc_attr_e('More Galleries', 'mt-dark');?>"><img src="<?php echo get_template_directory_uri()?>/images/image2.png" /></a>
			</li>
			<?php
				if (function_exists('dark_posted_on'))
					dark_posted_on();
				if (comments_open()) :
					echo '<li class="clear">';
					comments_popup_link(__('No comments yet', 'mt-dark'), __('1 comment', 'mt-dark'), __('% comments', 'mt-dark'), 'comments-link', __('Comments are off for this post', 'mt-dark'));
					echo '</li> ';
				endif;
				dark_posted_footer();
			?>
		</ul>
	</div>
</div>
