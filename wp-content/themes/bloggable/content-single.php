
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="date-style">
        <div class="month-style"><?php printf( __('%s', 'bloggable'), get_the_date('M') ); ?></div>
        <div class="day-style"><a href="<?php the_permalink() ?>" rel="bookmark"><?php printf( __('%s', 'bloggable'), get_the_date('d') ); ?></a></div>
        <div class="year-style"><?php printf( __('%s', 'bloggable'), get_the_date('Y') ); ?></div>
        <div class="arrow-style"></div>
    </div>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

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
	</header><!-- .entry-header -->

	<div class="entry-content post_content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bloggable' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'bloggable' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );


				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bloggable' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bloggable' );
				}



			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'bloggable' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
