<div <?php post_class('post') ?> >
	<?php if ( post_password_required() ) :
	?>
	<div class="postmeta">
		<?php the_content();?>
	</div>
	<?php endif;?>
	<div class="postmeta">
		<?php if (function_exists( 'dark_link_format' )) {
		?>
		<h2 class="title"><a href="<?php echo dark_link_format();?>" title="<?php printf(esc_attr__('%s', 'mt-white'), the_title_attribute('echo=0'));?>" rel="bookmark"> <?php the_title();?></a></h2><?php }?>
		<?php the_excerpt();?>
		<ul>
			<li class="alignleft">
			<a href="<?php echo get_post_format_link('link');?>" title="<?php esc_attr_e('More Links', 'mt-dark');?>"><img src="<?php echo get_template_directory_uri()?>/images/reload.png" /></a>
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