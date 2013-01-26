<?php /**
 * Template Name: Home page - sidebar
 *  */?>
<?php get_header(); ?>
<div id="wrapper" class="container_12 front">
<?php if (have_posts()) : the_post(); ?>
<div <?php post_class('grid_8 homepage') ?> > 
<div class="entry">
<?php the_title('<h2>', '</h2>'); ?>
<?php the_content(__('(more...)','mt-dark')); ?>
</div>
<?php wp_link_pages( array( 'before' => '<div class="postmeta"> <div class="page-link">' . __( 'Pages:','mt-dark' ), 'after' => '</div></div>' ) ); ?>
</div>
<?php  endif; rewind_posts(); ?> 
<div class="sidebar grid_4">
<div  id="t1">
<ul id="t1-nav">
<li ><a href="#tab1" ><?php _e('Categories','mt-dark'); ?></a></li>
<li ><a href="#tab2" ><?php _e('Archives','mt-dark');  ?></a></li>
<li ><a href="#tab3" ><?php _e('Tags','mt-dark'); ?></a></li>
</ul>
<div class="tab" id="tab1">   
 <ul>
<?php wp_list_categories('show_count=0&title_li='); ?>  
</ul> 
</div>
<div class="tab" id="tab2">   
<ul><?php wp_get_archives('type=monthly'); ?></ul>
</div>    

<div class="tab" id="tab3">   
<?php wp_tag_cloud('smallest=10&largest=24&number=28&order=desc'); ?>
</div> 
<script type="text/javascript">
 var tabber1 = new Yetii({
 id: 't1', active: 1 });
</script> 
</div>

</div>

</div> 
<div id="blogs">
<div class="blogcontainer">
<div  class="container_12 front news"> 
<h2 class="grid_12">
<?php _e('Blog','mt-dark');  ?></h2>
<?php $args_blog = array(
	'posts_per_page' => 3,
'post__not_in' => get_option( 'sticky_posts')
);
query_posts($args_blog); while (have_posts()) : the_post(); ?> 
<div class="grid_4">
<h3>
<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'mt-dark' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
</h3>
<?php the_excerpt(); ?>
</div>
<?php  endwhile;  ?> 
</div>
</div> 
</div> 
<?php get_footer(); ?>       