<?php get_header(); ?>
<div id="wrapper" class="container_12">
	<div class="grid_8" >
		<?php  while (have_posts()) : the_post();
		?>
		<?php get_template_part('loop', get_post_format()); ?>
		<?php endwhile; ?>

		<?php
		if (function_exists('wp_pagenavi')) { wp_pagenavi();
		} else {  dark_pagination();
		}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>