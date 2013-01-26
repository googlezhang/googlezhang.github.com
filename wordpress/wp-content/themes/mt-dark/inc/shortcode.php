<?php
if(!function_exists("mtdark_remove_p")) {
	function mtdark_remove_p($content) {
		$content = do_shortcode(shortcode_unautop($content));
		$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

function mt_warning_shortcode($atts, $content = null) {
	return '<span class="mt_warning">' . do_shortcode(mtdark_remove_p($content)) . '</span>';
}

add_shortcode('warning', 'mt_warning_shortcode');

function mt_alert_shortcode($atts, $content = null) {
	return '<span class="mt_alert">' . do_shortcode(mtdark_remove_p($content)) . '</span>';
}

add_shortcode('alert', 'mt_alert_shortcode');

function mt_down_shortcode($atts, $content = null) {
	return '<span class="mt_down">' . do_shortcode(mtdark_remove_p($content)) . '</span>';
}

add_shortcode('downloads', 'mt_down_shortcode');

function mt_info_shortcode($atts, $content = null) {
	return '<span class="mt_info">' . do_shortcode(mtdark_remove_p($content)) . '</span>';
}

add_shortcode('info', 'mt_info_shortcode');
?>