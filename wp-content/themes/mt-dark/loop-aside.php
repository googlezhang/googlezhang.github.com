<div <?php post_class() ?> >
	<div class="postmeta">
		<?php the_content(__('(more...)', 'mt-dark')); ?>
		<ul>
			<li class="alignleft">
				<a href="<?php echo get_post_format_link('aside'); ?>" title="<?php esc_attr_e('More Asides', 'mt-dark'); ?>"><img src="<?php echo get_template_directory_uri()?>/images/edit.png" /></a>
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
