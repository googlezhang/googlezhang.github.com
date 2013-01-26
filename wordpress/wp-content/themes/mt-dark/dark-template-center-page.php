<?php /**
 * Template Name: 2/3 width page
 *  */
?>
<?php get_header();?>
<div id="wrapper" class="container_12">
	<?php if (have_posts()) : the_post();
	?>
	<div <?php post_class('grid_8 prefix_2 suffix_2') ?> >
		<?php the_title('<h1 class="title">', '</h1>');?>
		<div class="entry sitemap">
			<?php
			if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
				the_post_thumbnail('single_post');
			}
			?>
			<?php the_content(__('(more...)', 'mt-dark'));?>
		</div>
		<?php wp_link_pages(array('before' => '<div class="postmeta"> <div class="page-link">' . __('Pages:', 'mt-dark'), 'after' => '</div></div>'));?>
	</div>
	<?php endif;?>
</div>
<?php get_footer();?>