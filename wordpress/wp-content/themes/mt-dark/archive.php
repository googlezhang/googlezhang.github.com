<?php	get_header();?>
<div id="wrapper" class="container_12">
	<div class="grid_8" >
		<h1><?php
		if(is_day()) :
			printf(__('Daily Archives: <span>%s</span>', 'mt-dark'), get_the_date());
		elseif(is_month()) :
			printf(__('Monthly Archives: <span>%s</span>', 'mt-dark'), get_the_date('F Y'));
		elseif(is_year()) :
			printf(__('Yearly Archives: <span>%s</span>', 'mt-dark'), get_the_date('Y'));
		elseif(is_category()) :
			printf(__('Category Archives: <span>%s</span>', 'mt-dark'), single_cat_title('', false));
		elseif(is_tag()) :
			printf(__('Tag Archives: <span>%s</span>', 'mt-dark'), single_tag_title('', false));
		elseif(has_post_format('gallery')) :
			_e('Gallery', 'mt-dark');
		elseif(has_post_format('image')) :
			_e('Image', 'mt-dark');
		elseif(has_post_format('link')) :
			_e('Link', 'mt-dark');
		elseif(has_post_format('aside')) :
			_e('Aside', 'mt-dark');
		else :
			_e('Blog Archives', 'mt-dark');
		endif;
		?></h1>
				<?php  while (have_posts()) : the_post();
		?>
		<?php	get_template_part('loop', get_post_format());?>
		<?php endwhile; ?>
		<?php
			if(function_exists('wp_pagenavi')) { wp_pagenavi();
			} else {  dark_pagination();
			}
		?>
	</div>
	<?php	get_sidebar();?>
</div>
<?php get_footer();?>

