<?php
/*********************/
require_once ( get_template_directory() . '/inc/dark-theme-options.php' );
require_once ( get_template_directory() . '/inc/dark-widgets.php' );
require_once ( get_template_directory() . '/inc/shortcode.php' );
/*********************/	
/******dark_setup*******/
/*********************/
add_action( 'after_setup_theme', 'dark_setup' );

if ( ! function_exists( 'dark_setup' ) ):
	function dark_setup() {
/*********************/		
	if ( ! isset( $content_width ) )
	$content_width = 580;
/*********************/
load_theme_textdomain( 'mt-dark', get_template_directory() . '/languages' );
/*********************/	
add_editor_style();
/*********************/	
function dark_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'mt-dark' ),
        'id' => 'sidebar380px',
        'description' => __( 'The primary widget area', 'mt-dark' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Sidebar top', 'mt-dark' ),
        'id' => 'sidebar-top',
        'description' => __( 'The secondary widget area', 'mt-dark' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'mt-dark' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The secondary footer widget area', 'mt-dark' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'mt-dark' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'mt-dark' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'dark_widgets_init' );		
/*********************/	
function dark_excerpt_length($length) {
	return 60;
}
add_filter('excerpt_length', 'dark_excerpt_length');
/*********************/	
function dark_script() {
	    wp_register_script('yetii', get_template_directory_uri() .'/js/yetii-min.js');
	    wp_enqueue_script('yetii');
if ( is_page_template('dark-template-front-page-slideshow.php') ) {
	    wp_register_script('dark-slide', get_template_directory_uri() .'/js/slides.min.jquery.js', array('jquery'));
	    wp_enqueue_script('dark-slide');
}
	
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) 
		wp_enqueue_script( 'comment-reply' );

		wp_enqueue_script('jquery');
		
		wp_register_script('fancybox', get_template_directory_uri() .'/js/jquery.fancybox-1.3.4.pack.js', array('jquery'));
		wp_enqueue_script('fancybox');
 
}
add_action('wp_enqueue_scripts', 'dark_script');
/*********************/	
		function dark_fancybox() {
		$id= get_the_ID();
		echo '<script type="text/javascript">
		jQuery(document).ready(function($){
		$(".post a[href$=\'.jpg\'], .post a[href$=\'.jpeg\'], .post a[href$=\'.gif\'], .post a[href$=\'.png\']").attr("rel", \'gallery_'. esc_attr($id) .'\').fancybox({\'transitionIn\' : \'none\',
		\'transitionOut\' : \'none\', \'titlePosition\' 	: \'over\', \'titleFormat\'		: function(title, currentArray, currentIndex, currentOpts) {
		return \'<span id="fancybox-title-over">'.__('Image','mt-dark').' \' + (currentIndex + 1) + \' / \' + currentArray.length + (title.length ? \' &nbsp; \' + title : \'\') + \'</span>\';
		}});
	
		});</script>';
		}
		add_action( 'wp_head', 'dark_fancybox');
/*********************/	
function dark_css() {
	if (!is_admin()) {
		wp_enqueue_style( 'dark-style', get_stylesheet_uri() );
	}
}
add_action('wp_print_styles', 'dark_css');
/*********************/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true );
set_post_thumbnail_size( 580, 200, true );
set_post_thumbnail_size( 580, 320, true );
add_image_size( 'edit-screen-thumbnail', 100, 100, true );
add_image_size('single_post', 580, 200, true);
add_image_size('slide', 580, 320, true);
add_theme_support( 'post-formats', array( 'aside', 'gallery','image','link' ) );
add_theme_support( 'automatic-feed-links' );
/*********************/	
if (function_exists('wp_nav_menu')) {
register_nav_menus(array('primary' => 'Primary Navigation'));
}
/*********************/
if ( ! function_exists('dark_link_format') ) {
function dark_link_format() {
    if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;
	return esc_url_raw( $matches[1] );
         
}
}
/*********************/
function dark_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title =  $title.' | '.$site_name ;
    if ( is_front_page() ) {
        $site_description = get_bloginfo( 'description' );
        $filtered_title .= ' | '.$site_description;
    }
    return $filtered_title;
}
add_filter( 'wp_title', 'dark_filter_wp_title' );
/*********************/	
function dark_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'dark_recent_comments_style' );
/*********************/	
function dark_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'dark_menu_args' );
/*********************/	
add_filter('use_default_gallery_style', '__return_false');
/*********************/	
add_theme_support( 'custom-background', array('default-color' => '150A04') );
/*********************/
	register_default_headers( array(
		'header' => array(
			'url' => '%s/images/headers/header.jpg',
			'thumbnail_url' => '%s/images/headers/header-thumbnail.jpg',
			'description' => __( 'Head', 'mt-dark' )
		),
		'head' => array(
			'url' => '%s/images/headers/head.jpg',
			'thumbnail_url' => '%s/images/headers/head-thumbnail.jpg',
			'description' => __( 'Head 2', 'mt-dark' )
		),
		'rock' => array(
			'url' => '%s/images/headers/rock.jpg',
			'thumbnail_url' => '%s/images/headers/rock-thumbnail.jpg',
			'description' => __( 'Rock', 'mt-dark' )
		)
	) );
/*********************/ 	 
	$custom_header_support = array(
	    'default-image' => '%s/images/headers/header.jpg',
		//'header-text' => '#8F0000',
		'default-text-color' => 'E0A46F',
		'width' => apply_filters( 'rembrandt_header_image_width', 960 ),
		'height' => apply_filters( 'rembrandt_header_image_height', 176 ),
		'flex-height' => true,
		'flex-width' => true,
		'random-default' => true,
		'wp-head-callback' => 'rembrandt_header_style',
		'admin-head-callback' => 'rembrandt_admin_header_style',
		'admin-preview-callback' => 'rembrandt_header_img',
	);
add_theme_support( 'custom-header', $custom_header_support );
/*********************/	
if ( ! function_exists( 'rembrandt_header_style' ) ) :
function rembrandt_header_style() { ?>
<style type="text/css">
<?php if (get_header_image()){
	if ( function_exists( 'get_custom_header' ) ) {
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height;
} 
 ?>
#header {	
	background: url(<?php header_image();?>) no-repeat top center;
    height: <?php echo $header_image_height; ?>px;
	}
		#header .menu{
		position: absolute;
		bottom: 5px;
	}
<?php } ?>	
	<?php  $text_color = get_header_textcolor();  ?>
		<?php
		if ( 'blank' == $text_color ) :
	?>
		#header h1, #header h2{
			display: none;
		}
	<?php else : ?>
#header h1 a, #header h2 a {
	color: #<?php echo $text_color; ?> !important;
}
	<?php endif; ?>
</style>
<?php
}
endif;
/*********************/	
if ( ! function_exists( 'rembrandt_admin_header_style' ) ) :
function rembrandt_admin_header_style() {	
?>
<style type="text/css">
<?php if (get_header_image()) : 
	if ( function_exists( 'get_custom_header' ) ) {
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height;
}
	?>	
	#header {	
	background: url(<?php header_image();?>) no-repeat 0 0;
	width: <?php echo $header_image_width; ?>px;
    height: <?php echo $header_image_height; ?>px; 
	}	
<?php endif; ?>	
<?php	$text_color = get_header_textcolor(); ?>
		<?php
		if ( 'blank' == $text_color ) :
	?>
		#header h1, #header h2{
			display: none;
		}
	<?php else :
	?>
#header h2 {
    font-size: 24px!important;
    margin-top: 10px!important;
    text-align: center!important;
	margin-top: 5px!important;    
}

#header h2 a {
    -webkit-border-radius: 5px!important;
    -moz-border-radius: 5px!important;
    -khtml-border-radius: 5px!important;
    border-radius: 5px!important;
    -moz-box-shadow: 0 0 5px #501F0E!important;
    -webkit-box-shadow: 0 0 5px #501F0E!important;
    box-shadow: 0 0 5px #501F0E!important;
    background: #0C0401!important;
    display: inline!important;
	color: #<?php echo $text_color; ?> !important;
	text-decoration: none;
	text-shadow: none;
	padding: 10px;
}
<?php endif; ?>
</style>
<?php
}

endif;
/*********************/	
if ( ! function_exists( 'rembrandt_header_img' ) ) :
function rembrandt_header_img() {
?>
		<div id="header">
			<div class="container_12 nav">
			<h2 class="grid_12"><a href="<?php echo home_url();?>"><?php bloginfo('name');?></a></h2>
		</div>
		</div>
<?php
}
endif;	
/*********************/

/*********************/	
		if ( ! function_exists( 'dark_footer_classes' ) ) :
		function dark_footer_classes( $existing_classes ) {
		if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ))
		$classes[] = 'footer-widget';
		else
		$classes[] = 'footer-no-widget';
		return array_merge( $existing_classes, $classes );
		}
		add_filter( 'body_class', 'dark_footer_classes' );
		endif;
/*********************/
function dark_auto_excerpt_more( $more ) {
return '&hellip; <a href="'. get_permalink() . '">' . __('(more...)', 'mt-dark') . '</a>';
}
add_filter( 'excerpt_more', 'dark_auto_excerpt_more' );
/*********************/
function dark_posted_on() {
if (is_single()) {
$format_text = __('<li>%4$s, Author: <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span> %8$s</li>', 'mt-dark');
} else {
$format_text = __('<li><a href="%1$s" title="%2$s" rel="bookmark"> <span datetime="%3$s" pubdate> %4$s, </span></a> Author: <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span> %8$s</li>', 'mt-dark');
}
printf($format_text, esc_url(get_permalink()), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), sprintf(esc_attr__('View all posts by %s', 'rembrandt'), get_the_author()), esc_html(get_the_author()), edit_post_link(__('Edit This', 'mt-dark')));
}
/*********************/
if (!function_exists('dark_posted_footer')) :
function dark_posted_footer() {
$tag = get_the_tag_list('', __(', ', 'mt-dark'));
$categories = get_the_category_list(__(', ', 'mt-dark'));
if ('' != $tag) {
$utility_text = __('<li>Categories: %1$s Tags: %2$s </li>', 'mt-dark');
} elseif('' != $categories) {
$utility_text = __('<li>Categories: %1$s </li>', 'mt-dark');
} else {
$utility_text = __('<li>Author: %3$s</li>', 'mt-dark');
}
printf($utility_text, $categories, $tag, get_the_author());
}
endif;
/*********************/
}
endif;// end dark_setup
/*********************/
if ( ! function_exists('dark_pagination') ) {
function dark_pagination() {
global $wp_query, $wp_rewrite;
$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

$pagination = array(
'base' => @add_query_arg('paged','%#%'),
'format' => '',
'total' => $wp_query->max_num_pages,
'current' => $current,
'show_all' => false,
'mid_size' => 4,
'end_size'     => 2,
'type' => 'plain'
);

if( $wp_rewrite->using_permalinks() )
$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

if( !empty($wp_query->query_vars['s']) )
$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

echo '<div class="wp-pagenavi">' .paginate_links($pagination).'</div>' ;
}
}
/*********************/
if ( ! function_exists( 'custom_comments' ) ) :
function custom_comments( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
switch ( $comment->comment_type ) :
case '' :
	?>
	<li <?php comment_class();?> id="li-comment-<?php comment_ID();?>">
		<div id="comment-<?php comment_ID();?>">
		<div class="comment-author vcard">
			<?php echo get_avatar($comment, 40);?>
			<?php printf(__('%s <span class="says">says:</span>', 'mt-dark'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e('Your comment is awaiting moderation.', 'mt-dark');?></em>
			<br />
		<?php endif;?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url(get_comment_link($comment -> comment_ID));?>">
			<?php
			/* translators: 1: date, 2: time */
			printf(__('%1$s at %2$s', 'mt-dark'), get_comment_date(), get_comment_time());
 ?></a><?php edit_comment_link(__('(Edit)', 'mt-dark'), ' ');?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text();?></div>

		<div class="reply">
			<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
	break;
	case 'pingback'  :
	case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e('Pingback:', 'mt-dark');?> <?php comment_author_link();?><?php edit_comment_link(__('(Edit)', ''), 'mt-dark');?></p>
	<?php
	break;
	endswitch;
	}
	endif;
/*********************/		
add_filter( 'manage_edit-post_columns', 'dark_columns_filter', 10, 1 );
function dark_columns_filter( $columns ) {
    $column_thumbnail = array( 'thumbnail' => __( 'Featured image', 'mt-dark' ) );
    $columns = array_slice( $columns, 0, 1, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
    return $columns;
}
/*********************/
add_action( 'manage_posts_custom_column', 'dark_column_action', 10, 1 );
function dark_column_action( $column ) {
	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, 'edit-screen-thumbnail' );
			break;
	}
}
/*********************/	
if ( ! function_exists('dark_change_mce_buttons') ) {
function dark_change_mce_buttons($initArray) {
	$initArray['theme_advanced_buttons3'] = 'sub,sup';
	$initArray['theme_advanced_buttons3_add_before'] = 'styleselect';
	$initArray['theme_advanced_styles'] = 'Float Left=alignleft,Float Right=alignright,List style: Tick=s_tick,List style: Arrow=s_arrow,Frame: Alert=s_alert,Frame: Warning=s_warning,Frame: Info=s_info,Frame: Border=s_border,Frame: Border dotted=s_border_dotted,Frame: Border top/bottom=s_border_top_bottom,Buttons=s_button,Buttons: alignleft=s_button_left,Buttons: alignright=s_button_right,Buttons: Full width=s_button_full,Width 1/3=s_width_1_3,Width 1/2=s_width_1_2,Width 2/3=s_width_2_3,Background color: Black=s_b_black,Background color: Grey=s_b_grey';
	return $initArray;
}
}
add_filter('tiny_mce_before_init', 'dark_change_mce_buttons');
/*********************/	
if ( ! function_exists('dark_tdav_css') ) {
	function dark_tdav_css($wp) {
		$wp .= ',' . get_stylesheet_directory_uri() . '/inc/css/tinymce.css';
		return $wp;
	}
}
add_filter( 'mce_css', 'dark_tdav_css' );
/*********************/
?>
