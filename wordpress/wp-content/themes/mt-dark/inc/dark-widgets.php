<?php
/***********FLICKR**********/
     class dark_flick_widget extends WP_Widget {
     function dark_flick_widget() {
     $widget_ops = array( 'description' => 'Flickr gallery' );
     $this->WP_Widget('', 'Flickr', $widget_ops);
     $this->flick_numbers = array(
            "3" => "3",
            "5" => "5",
            "6" => "6",
            "9" => "9",
            "10" => "10"
        );
     }
      
     function widget($args, $instance) {
     extract($args, EXTR_SKIP);
      
     $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
     $idflickr = empty($instance['idflickr']) ? ' ' : apply_filters('widget_entry_title', $instance['idflickr']);
     $numberflickr = $instance['numberflickr'];

     echo $before_widget;
     if ( $title ) echo $before_title . $title . $after_title; 
       
     echo '<div id="flickr"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$numberflickr.'&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user='.$idflickr.'"></script></div>';
     echo $after_widget;
     }
      
     function update($new_instance, $old_instance) {
     $instance = $old_instance;
     $instance['title'] = strip_tags($new_instance['title']);
     $instance['idflickr'] = strip_tags($new_instance['idflickr']);
     $instance['numberflickr'] =$new_instance['numberflickr'];
      
     return $instance;
     }
      
     function form($instance) {
     $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'idflickr' => '', 'numberflickr' => '' ) );
     $title = strip_tags($instance['title']);
     $idflickr = strip_tags($instance['idflickr']);
     $numberflickr = $instance['numberflickr'];

?>
<p>
	<label for="<?php echo $this -> get_field_id('title');?>"> <?php _e('Title:', 'mt-dark');?><input class="widefat" id="<?php echo $this -> get_field_id('title');?>" name="<?php echo $this -> get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" /></label>
</p>
<p>
	<label for="<?php echo $this -> get_field_id('idflickr');?>"> 
		<?php	printf(__('"Flickr"- ID. <a href="%s" target="_blank">idgettr.com</a>', 'mt-dark'), sprintf(esc_url(__('http://idgettr.com/', 'mt-dark'))));?>

		<input class="widefat" id="<?php echo $this -> get_field_id('idflickr');?>" name="<?php echo $this -> get_field_name('idflickr');?>" type="text" value="<?php echo esc_attr($idflickr);?>" />
	</label>
</p>
<p>
	<label for="<?php echo $this -> get_field_id('numberflickr');?>"><?php _e('Number of photo to display:', 'mt-dark');?></label>
	<select name="<?php echo $this -> get_field_name('numberflickr');?>" id="<?php echo $this -> get_field_id('numberflickr');?>" class="widefat">
		<?php foreach ($this->flick_numbers as $key => $nmb) {
		?>
		<option value="<?php echo $key;?>" <?php
		if($instance['numberflickr'] == $key) { echo " selected ";
		}
		?>><?php echo $nmb;?></option>
		<?php }?>
	</select>
</p>
<?php
}
}
register_widget('dark_flick_widget');
/***********SOCIAL**********/
class dark_social_widget extends WP_Widget {
function dark_social_widget() {
$widget_ops = array( 'description' => 'User profiles' );
$this->WP_Widget('', 'Profiles', $widget_ops);
}

function widget($args, $instance) {
extract($args, EXTR_SKIP);

$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
$facebook = empty($instance['facebook']) ? '' : apply_filters('widget_entry_title', $instance['facebook']);
$tube = empty($instance['tube']) ? '' : apply_filters('widget_entry_title', $instance['tube']);
$lastfm = empty($instance['lastfm']) ? '' : apply_filters('widget_entry_title', $instance['lastfm']);

echo $before_widget;
if (!empty($title)) {echo $before_title . $title . $after_title;}

echo '<ul class="social">';
echo '<li><a href="'.get_bloginfo('rss2_url').'"></a></li>';
if (!empty($facebook)) {  echo '<li class="fb"><a href="http://www.facebook.com/'.$facebook.'"></a></li>'; }
if (!empty($tube)) {  echo '<li class="tb"><a href="http://www.youtube.com/user/'.$tube.'"></a></li>';  }
if (!empty($lastfm)) {  echo '<li class="fm"><a href="http://www.lastfm.pl/user/'.$lastfm.'" ></a></li>';  }
echo '</ul>';

echo $after_widget;
}

function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['facebook'] = strip_tags($new_instance['facebook']);
$instance['tube'] = strip_tags($new_instance['tube']);
$instance['lastfm'] = strip_tags($new_instance['lastfm']);

return $instance;
}

function form($instance) {
$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'facebook' => '', 'tube' => '', 'lastfm' => '' ) );
$title = strip_tags($instance['title']);
$facebook = strip_tags($instance['facebook']);
$tube = strip_tags($instance['tube']);
$lastfm = strip_tags($instance['lastfm']);
?>
<p>
	<label for="<?php echo $this -> get_field_id('title');?>"> <?php _e('Title:', 'mt-dark');?><input class="widefat" id="<?php echo $this -> get_field_id('title');?>" name="<?php echo $this -> get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" /></label>
</p>
<p>
	<label for="<?php echo $this -> get_field_id('facebook');?>"> <?php _e('Enter <strong>Facebook</strong>  account name, for example(http://www.facebook.com/?ref=logo#!/<strong>mazurtomek</strong>)', 'mt-dark');?><input class="widefat" id="<?php echo $this -> get_field_id('facebook');?>" name="<?php echo $this -> get_field_name('facebook');?>" type="text" value="<?php echo esc_attr($facebook);?>" /></label>
</p>
<p>
	<label for="<?php echo $this -> get_field_id('tube');?>"><?php _e('Enter <strong>YouTube</strong>  account name, for example(youtube.com/user/<strong>tommek1977</strong>)', 'mt-dark');?>
		<input class="widefat" id="<?php echo $this -> get_field_id('tube');?>" name="<?php echo $this -> get_field_name('tube');?>" type="text" value="<?php echo esc_attr($tube);?>" />
	</label>
</p>
<p>
	<label for="<?php echo $this -> get_field_id('lastfm');?>"><?php _e('Enter <strong>LastFM</strong>  account name, for example(http://www.lastfm.pl/user/<strong>tommek</strong>)', 'mt-dark');?>
		<input class="widefat" id="<?php echo $this -> get_field_id('lastfm');?>" name="<?php echo $this -> get_field_name('lastfm');?>" type="text" value="<?php echo esc_attr($lastfm);?>" />
	</label>
</p>
<?php
}
}
register_widget('dark_social_widget');
?>
