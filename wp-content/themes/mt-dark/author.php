<?php get_header();?>
<div id="wrapper" class="container_12">
	<div class=" grid_8">
		<ul class="vcard" id="author">
			<?php
			if(have_posts())
				the_post();
			?>
			<li>
				<h1><?php printf(__('Author Archives: %s', 'mt-dark'), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a></span>");?></h1>
			</li>
			<?php if ( get_the_author_meta( 'description' ) ) :
			?>
			<li>
				<?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('', 80));?>
			</li>
			<li>
				<h2><?php printf(__('About %s', 'mt-dark'), get_the_author());?></h2>
			</li>
			<li>
				<div class="entry-description">
					<?php the_author_meta('description');?>
				</div>
			</li>
			<?php endif;  rewind_posts();?>
		</ul>
				<?php  while (have_posts()) : the_post();
		?>
		<?php get_template_part('loop', get_post_format());?>
		<?php endwhile; ?>
		<?php
		if(function_exists('wp_pagenavi')) { wp_pagenavi();
		} else {  dark_pagination();
		}
		?>
	</div>
	<?php get_sidebar();?>
</div>
<?php get_footer();?>

