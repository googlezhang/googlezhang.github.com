<?php /**
 * Template Name: Blog Page
 *  */?>
<?php get_header(); ?>
<div id="wrapper" class="container_12">
<?php
global $more;
$more = 0;
  $args=array('paged' => (get_query_var('paged')) ? get_query_var('paged') : 1 );
  query_posts($args); ?>
<div class="grid_8">  
<?php   if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class() ?> > 
<h2 class="title">
<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'mt-dark' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="entry">
<?php if ( (function_exists( 'add_theme_support' ))  && ( has_post_thumbnail() )){
the_post_thumbnail('single_post'); } ?>
<?php the_content(__('(more...)','mt-dark')); ?>
</div>
	<ul class="postmeta">
		<?php wp_link_pages(array('before' => '<li class="page-link">' . __('Pages:', 'mt-dark'), 'after' => '<br /></li>')); ?>
<?php if(function_exists('dark_posted_on')) dark_posted_on(); 

if (comments_open()) :
	echo '<li>';
	comments_popup_link(__('No comments yet', 'mt-dark'), __('1 comment', 'mt-dark'), __('% comments', 'mt-dark'), 'comments-link', __('Comments are off for this post', 'mt-dark'));
	echo '</li> ';
endif;
 dark_posted_footer()?>
	</ul>
</div>
<?php comments_template( '', true ); ?>
<?php endwhile;  endif; ?>
<?php  if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else {  dark_pagination();  } ?>
</div> 
 
<?php get_sidebar(); ?>
</div> 
<?php get_footer(); ?>