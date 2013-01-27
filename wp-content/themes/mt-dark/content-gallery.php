<div class="wp-pagenavi grid_12">
	<div class="alignleft">
		<?php previous_post_link();?>
	</div>
	<div class="alignright">
		<?php next_post_link();?>
	</div>
</div>
<div class="grid_12" >
	<?php if (have_posts()) : the_post();
	?>
	<div <?php post_class() ?> >
		<?php the_title('<h1 class="title">', '</h1>');?>
		<div class="entry">
			<?php the_content(__('(more...)', 'mt-dark'));?>
		</div>
	<ul class="postmeta">
		<?php wp_link_pages(array('before' => '<li class="page-link">' . __('Pages:', 'mt-dark'), 'after' => '<br /></li>')); ?>
<?php if(function_exists('dark_posted_on')) dark_posted_on(); 

if (comments_open()) :
	echo '<li>';
	comments_popup_link(__('No comments yet', 'mt-dark'), __('1 comment', 'mt-dark'), __('% comments', 'mt-dark'), 'comments-link', __('Comments are off for this post', 'mt-dark'));
	echo '</li> ';
endif;
 dark_posted_footer()?>
	</ul>
	</div>
	<?php endif;?>
</div>
<?php comments_template('', true);?>
