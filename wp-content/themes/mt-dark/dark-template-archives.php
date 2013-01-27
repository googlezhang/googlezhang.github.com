<?php /**
 * Template Name: Archives Page
 *  */?>
<?php get_header(); ?>
<div id="wrapper" class="container_12">
<?php if (have_posts()) : the_post(); ?>
<div <?php post_class('sitemap grid_12') ?> > 
<h1 class="title"><?php the_title(); ?></h1>
<div class="entry">
	<ul>
		<?php query_posts('posts_per_page=-1');  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<li><a href="<?php the_permalink() ?>"><?php the_title(); ?> - <em> <?php the_time( get_option('date_format')) ?></em></a></li>
<?php endwhile; endif; ?>	
	</ul>
</div>
</div>
<?php  else: ?>
<div class="entry"><p><?php _e('Sorry, no posts matched your criteria.','mt-dark'); ?></p></div>
<?php endif; ?>  

</div> 
<?php get_footer(); ?>
        

