<?php get_header();?>
<div id="wrapper" class="container_12">
	<div class="grid_8" >
		<?php if (have_posts()) : the_post();
		?>
		<div <?php post_class() ?> >
			<?php the_title('<h1>', '</h1>'); ?>
			<div class="entry">
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
		<?php  endif;?>
		<?php comments_template('', true);?>
	</div>
	<?php get_sidebar();?>
</div>
<?php get_footer();?>

