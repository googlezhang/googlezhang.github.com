<?php /**
 * Template Name: Full width page
 *  */
?>
<?php get_header();?>
<div id="wrapper" class="container_12">
	<?php if (have_posts()) : the_post();
	?>
	<div <?php post_class('grid_12') ?> >
		<?php the_title('<h2 class="title">', '</h2>');?>
		<div class="entry sitemap">
			<?php
			if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
				the_post_thumbnail('single_post');
			}
			?>
			<?php the_content(__('(more...)', 'mt-dark'));?>
			<div class="clear"></div>
		</div>
		<?php wp_link_pages(array('before' => '<div class="postmeta"> <div class="page-link">' . __('Pages:', 'mt-dark'), 'after' => '</div></div>'));?>
	</div>
	<?php  else:?>
	<div class="entry">
		<p>
			<?php _e('Sorry, no posts matched your criteria.', 'mt-dark');?>
		</p>
	</div>
	<?php endif;?>
	<div class="clear"></div>
</div>
<?php get_footer();?>