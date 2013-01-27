
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="date-style">
        <div class="month-style"><?php printf( __('%s', 'bloggable'), get_the_date('M') ); ?></div>
        <div class="day-style"><a href="<?php the_permalink() ?>" rel="bookmark"><?php printf( __('%s', 'bloggable'), get_the_date('d') ); ?></a></div>
        <div class="year-style"><?php printf( __('%s', 'bloggable'), get_the_date('Y') ); ?></div>
        <div class="arrow-style"></div>
    </div>
	<?php if ( is_search() ) : ?>
    	<?php if ( has_post_format( 'gallery' ) ) : ?>
			<?php $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
            if ( $images ) :
                $image = array_shift( $images );
                $image_img_tag = wp_get_attachment_image( $image->ID, array(150, 125) );
        ?>
            <div class="imgthumb">
            <a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
            </div><!-- .gallery-thumb -->
            <?php endif; ?>

            <?php elseif ( has_post_thumbnail()) : ?>
            
            <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(150, 125) ); ?></a></div>
            
            <?php else : ?>
            
            <?php $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
            if ( !empty($postimgs) ) :
                $firstimg = array_shift( $postimgs );
                $my_image = wp_get_attachment_image( $firstimg->ID, array(150, 125) );
            ?>
            
            <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $my_image; ?></a></div>
        
            <?php endif; ?>
         <?php endif; ?>
    <?php endif; ?>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bloggable' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'bloggable' ) );
				
				if ( $categories_list && bloggable_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Filed under %1$s by <span class="author vcard"><a class="url fn n" href="%2$s" title="%3$s" rel="author">%4$s</a></span>', 'bloggable' ), 
					$categories_list,
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'bloggable' ), get_the_author() ) ),
					esc_html( get_the_author() ) ); ?>
			</span>
			
			<?php endif; // End if categories ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content post_content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bloggable' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bloggable' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'bloggable' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'bloggable' ), $tags_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'bloggable' ), __( '1 Comment', 'bloggable' ), __( '% Comments', 'bloggable' ) ); ?></span>
		<span class="sep"> | </span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'bloggable' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
