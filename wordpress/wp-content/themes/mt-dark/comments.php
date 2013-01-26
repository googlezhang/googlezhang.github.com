<div <?php  if ( comments_open() ) { ?> id="comments" <?php if ( has_post_format( 'gallery' )) : ?>class="prefix_1 grid_8 suffix_3" <?php endif; }?>>
	<?php if ( post_password_required() ) :
	?>
	<p class="nopassword">
		<?php _e('This post is password protected. Enter the password to view any comments.', 'mt-dark');?>
	</p>
</div><!-- #comments -->
<?php
	return ;	endif;
?>

<?php if ( have_comments() ) :
?>
<h3 id="comments-title"><?php
printf(__('%1$s Responses to %2$s', 'mt-dark'), number_format_i18n(get_comments_number()), '<em>' . get_the_title() . '</em>');
?></h3>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
<div class="wp-pagenavi">
	<?php paginate_comments_links( array('prev_text' => '&laquo; ' . __('Older Comments', 'mt-dark'), 'next_text' => __('Newer Comments', 'mt-dark')) . ' &raquo;');?>
</div><!-- .navigation -->
<?php endif;?>

<ol class="commentlist">
	<?php wp_list_comments(array('callback' => 'custom_comments'));?>
</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
<div class="wp-pagenavi">
	<?php paginate_comments_links( array('prev_text' => '&laquo; ' . __('Older Comments', 'mt-dark'), 'next_text' => __('Newer Comments', 'mt-dark')) . ' &raquo;');?>
</div><!-- .navigation -->
<?php endif;?>

<?php else : if ( ! comments_open() ) :?>
<p class="nocomments">
	<?php _e('Comments are closed.', 'mt-dark');?>
</p>
<?php endif;?>

<?php endif;?>

<?php comment_form();?>

</div><!-- #comments -->
