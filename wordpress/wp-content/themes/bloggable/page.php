<?php get_header(); ?>
<?php get_sidebar(); // sidebar 1 ?>
    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

        </div> <!-- end #main -->

        

    </div> <!-- end #content -->
        
<?php get_footer(); ?>