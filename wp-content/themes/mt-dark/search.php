<?php get_header();?>
<div id="wrapper" class="container_12">
	<div class="grid_8" >
		<h1><?php printf(__('Search Results for: <span>%s</span>', 'mt-dark'), '<span>' . get_search_query() . '</span>');?></h1>
		<?php if ( ! have_posts() ) :
		?>
		<div class="title">
			<h1><?php _e('Sorry, no posts matched your criteria.', 'mt-dark');?></h1>
		</div>
		<?php endif;?>

		<?php if (have_posts()) : while (have_posts()) : the_post();
		?>
		<div <?php post_class() ?> >
			<h2 class="title"><a href="<?php the_permalink();?>" title="<?php echo esc_attr(sprintf(__('Permanent Link to %s', 'mt-dark'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php the_title();?></a></h2>
			<div class="entry">
				<?php
				if((function_exists('add_theme_support')) && ( has_post_thumbnail())) {
					the_post_thumbnail('single_post');
				}
				?>
				<?php the_excerpt();?>
			</div>
			<div class="postmeta">
				<ul>
						<?php if (function_exists('dark_posted_on'))
					dark_posted_on();?>
				</ul>
			</div>
		</div>
		<?php endwhile; endif;?>
		<?php comments_template('', true);?>
		<?php
			if(function_exists('wp_pagenavi')) { wp_pagenavi();
			} else {  dark_pagination();
			}
		?>
	</div>
	<?php get_sidebar();?>
</div>
<?php get_footer();?>

