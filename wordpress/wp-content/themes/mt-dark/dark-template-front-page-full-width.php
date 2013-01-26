<?php /**
 * Template Name: Home page - full width
 *  */
?>
<?php get_header(); ?>
<div id="wrapper" class="container_12 front">
<?php if (have_posts()) : the_post(); ?>
<div <?php post_class('grid_12 homepage') ?> > 
<div class="entry">
<?php the_title('<h2>', '</h2>'); ?>
<?php the_content(__('(more...)', 'mt-dark')); ?>
</div>
</div>
<?php  endif; rewind_posts(); ?> 
</div> 
<div id="blogs">
<div class="blogcontainer">
<div  class="container_12 front news"> 
<h2 class="grid_12"><?php _e('Blog', 'mt-dark'); ?></h2>
<?php $args_blog = array(
'posts_per_page' => 3,
'post__not_in' => get_option( 'sticky_posts')
);
query_posts($args_blog); 
while (have_posts()) : the_post(); ?> 
<div class="grid_4">
<h3>
<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permanent Link to %s', 'mt-dark'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a>
</h3>
<?php the_excerpt(); ?>
</div>
<?php  endwhile; ?> 
</div>
</div> 
</div> 
<?php get_footer(); ?>       