<?php get_header(); ?>
<div  class="container_12">
<div class="grid_12" >
<div <?php post_class() ?>>
<h2 class="title"><?php _e('Error 404 - Not Found','mt-dark'); ?></h2>
<div class="entry error404">
<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'mt-dark' ); ?></p>
<?php get_search_form(); ?>
</div>
</div>
</div>   
</div> 
<?php get_footer(); ?>
        

