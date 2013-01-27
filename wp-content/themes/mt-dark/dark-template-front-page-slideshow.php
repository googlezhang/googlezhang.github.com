<?php	/**
	 * Template Name: Home page - slideshow
	 *  */
	?>
<?php	get_header();?>
<div id="wrapper" class="container_12">
	<div <?php post_class('grid_12 homepage slideshome') ?> >
	
		<script type="text/javascript">
jQuery(document).ready(function($){
// Set starting slide to 1
var startSlide = 1;
// Get slide number if it exists
if (window.location.hash) {
startSlide = window.location.hash.replace('#','');
}
// Initialize Slides
$('#slides').slides({
preload: true,
preloadImage: '<?php	echo get_template_directory_uri();?>/images/loading.gif',
	generatePagination: false,
	play: 5000,
	pause: 2500,
	hoverPause: true,
	// Get the starting slide
	start: startSlide,
	animationComplete: function(current) {
		// Set the slide number as a hash
		window.location.hash = '#' + current;
	}
	});
	});</script>
		<div id="container">
			<div id="example">
				<div  id="slides">
					<div class="slides_container">
						<?php		$sticky = get_option('sticky_posts');
								$args = array(
								//'posts_per_page' => 2,
								'post__in' => $sticky, 'ignore_sticky_posts' => 0);
								$args_not = array('posts_per_page' => 4, );
								if($sticky) :
									query_posts($args);
								else :
									query_posts($args_not);
								endif;?>
						<?php   if (have_posts()) : while (have_posts()) : the_post();
						?>
						<div class="slide">
							<?php if ( (function_exists( 'add_theme_support' ))  && ( has_post_thumbnail() )):
the_post_thumbnail('slide');
							?>
							<div class="captionslide">
								<h2><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'mt-dark'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h2>
								<?php	the_excerpt();?>
							</div>
							<?php	else :?>
							<div class="slide-no-image">
								<h2><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'mt-dark'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h2>
								<?php	the_excerpt();?>
							</div>
							<?php	endif;?>
						</div>
						<?php	endwhile; endif; wp_reset_query();?>
					</div>
					<a href="#" class="prev"><img src="<?php	echo get_template_directory_uri();?>/images/arrow-prev.png"  alt="Arrow Prev"></a>
					<a href="#" class="next"><img src="<?php	echo get_template_directory_uri();?>/images/arrow-next.png"  alt="Arrow Next"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="blogs">
	<div class="blogcontainer">
		<div  class="container_12 front news">
			<h2 class="grid_12"><?php	_e('Blog', 'mt-dark');?></h2>
			<?php
$args_blog = array(
'posts_per_page' => 3,
'post__not_in' => get_option( 'sticky_posts')
);
query_posts($args_blog);
while (have_posts()) : the_post();
			?>
			<div class="grid_4">
				<h3><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'mt-dark'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h3>
				<?php	the_excerpt();?>
			</div>
			<?php endwhile;?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php get_footer();?>       