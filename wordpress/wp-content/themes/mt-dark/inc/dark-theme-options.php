<?php

add_action( 'admin_init', 'dark_theme_options_init' );
add_action( 'admin_menu', 'dark_theme_options_add_page' );

/**
 * Init theme options to white list our options
 */
function dark_theme_options_init(){
	register_setting( 
	'dark_options', 
	'dark_theme_options', 
	'dark_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function dark_theme_options_add_page() {
	add_theme_page( 
	__( 'Theme Options', 'mt-dark' ), 
	__( 'Theme Options', 'mt-dark' ), 
	'edit_theme_options', 
	'dark_theme_options', 
	'dark_theme_options_do_page' );
}

/**
 * Create the options page
 */
function dark_theme_options_do_page() {

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php	screen_icon();?>
		<h2><?php	printf(__('%s Theme Options', 'mt-dark'), wp_get_theme());?></h2>
		<?php	settings_errors();?>

		<form method="post" action="options.php">
			<?php	settings_fields('dark_options');?>
			<?php	$options = get_option('dark_theme_options');?>

			<table class="form-table">
                 <tr valign="top"><th scope="row"><h2><?php	_e('About me', 'mt-dark');?></h2></th>
								
				 <tr valign="top"><th scope="row"><?php	_e('Name', 'mt-dark');?></th>
					<td>
						<input id="dark_theme_options[name]" class="regular-text" type="text" name="dark_theme_options[name]" value="<?php $options['name'];?>" />
					</td>
				</tr>
				
				 <tr valign="top"><th scope="row"><?php	_e('Photo', 'mt-dark');?></th>
					<td>
						<input id="dark_theme_options[photo]" class="regular-text" type="text" name="dark_theme_options[photo]" value="<?php $options['photo'];?>" />
						<label class="description" for="dark_theme_options[photo]"><?php _e('Link to your image(80x80px)', 'mt-dark');?></label>
					</td>
				</tr>
				
				 <tr valign="top"><th scope="row"><?php	_e('Description', 'mt-dark');?></th>
					<td>
						<textarea rows="12" cols="39" id="dark_theme_options[description]" class="regular-text" type="text" name="dark_theme_options[description]" value="<?php	$options['description'];?>" ><?php $options['description'];?></textarea>
					</td>
				</tr>
			
			<tr valign="top"><th scope="row"><h2><?php	_e('Layout', 'mt-dark');?></h2></th>
				<tr valign="top"><th scope="row"><?php	_e('Default Layout ', 'mt-dark');?></th>
					<td class="sidebar-content">
						<input id="dark_theme_options[sidebar-content]" name="dark_theme_options[sidebar-content]" type="checkbox" value="1" <?php	checked('1', $options['sidebar-content']);?> />
						<label class="description" for="dark_theme_options[sidebar-content]"><?php	_e('Sidebar on the left side', 'mt-dark');?></label>
					</td>
				</tr>																
							
			</table>

<?php	submit_button();?>
		</form>
	</div>
	<?php }

		/**
		* Sanitize and validate input. Accepts an array, return a sanitized array.
		*/
		function dark_theme_options_validate( $input ) {
		// Say our text option must be safe text with no HTML tags
		$input['name'] = wp_filter_nohtml_kses( $input['name'] );

		$input['photo'] = wp_filter_nohtml_kses( esc_url($input['photo']) );

		$input['description'] = wp_filter_nohtml_kses( $input['description'] );

		if ( ! isset( $input['sidebar-content'] ) )
		$input['sidebar-content'] = null;
		$input['sidebar-content'] = ( $input['sidebar-content'] == 1 ? 1 : 0 );

		return $input;
		}

		function dark_pages_classes( $existing_classes ) {
		$options = get_option( 'dark_theme_options' );

		if ( $options['sidebar-content'] <> '1' )
		$classes[] = 'dark_right-sidebar';
		else
		$classes[] = 'dark_left-sidebar';

		return array_merge( $existing_classes, $classes );
		}
		add_filter( 'body_class', 'dark_pages_classes');

		/*********************/


		// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
	?>