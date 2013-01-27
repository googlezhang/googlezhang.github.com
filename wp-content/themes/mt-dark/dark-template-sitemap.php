<?php /**
 * Template Name: Sitemap Page 
 *  */?>
<?php get_header(); ?>
<div id="wrapper" class="container_12">
<?php the_title('<h1 class="title">', '</h1>'); ?>
<div <?php post_class('entry sitemap') ?>>
<div class="grid_4" >
<h2><?php _e('Pages','mt-dark'); ?></h2>
	<ul><?php wp_list_pages('sort_column=menu_order&depth=0&title_li='); ?></ul>

</div>   
<div class="grid_3">
<h2><?php _e('Categories','mt-dark'); ?></h2>
	<ul><?php wp_list_categories('depth=0&title_li=&show_count=1'); ?></ul>
</div>
<div class="grid_2">
<h2><?php _e('Tags','mt-dark'); ?></h2>
<?php wp_tag_cloud('smallest=10&largest=18&number=&order=desc&format=flat'); ?>
</div>
<div class="grid_2">
<h2><?php _e('Archives','mt-dark'); ?></h2>
	<ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
</div>
<div class="clear"></div>
</div>
</div> 
<?php get_footer(); ?>