<?php /**
 * Template Name: Contact form (plugin Contact Form 7)
 *  */
?>
<?php get_header(); ?>
<div id="wrapper" class="container_12">
	<?php if (have_posts()) : the_post();
	?>
	<div <?php post_class('grid_7') ?> >
		<?php the_title('<h1 class="title">', '</h1>'); ?>
		<div class="entry sitemap">
			<?php
			if ((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
				the_post_thumbnail('single_post');
			}
			?>
			<?php the_content(__('(more...)', 'mt-dark')); ?>
		</div>
	</div>
	<div class="grid_5 contact">
	<?php //echo do_shortcode('[contact-form 1 "Contact form 1"]'); ?>
	<?php
		if (get_post_meta($post -> ID, 'contact', true)) {
			echo do_shortcode('' . get_post_meta($post -> ID, 'contact', true) . '');
		}
	?>
	</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>

