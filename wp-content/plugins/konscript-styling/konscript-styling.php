<?php
/*
Plugin Name: Konscript Styling
Plugin URI: http://konscript.com
Description: Restyle the login page and admin area
Version: 1.0
Author: Konscript
Author URI: http://konscript.com
*/

function add_admin_style() {
	$this_file = dirname(__FILE__);
	$admin_cssfile = "style-admin.css";
	if(is_file("$this_file/$admin_cssfile")) {
		$file = trailingslashit(get_option('siteurl')) . trailingslashit(substr($this_file, strpos($this_file, 'wp-content'))) . $admin_cssfile;
		echo '<link rel="stylesheet" href="'.$file.'" type="text/css" media="screen" />'."\n";
	}
}

function add_login_style() {
	$this_file = dirname(__FILE__);
	$login_cssfile = "style-login.css";
	if(is_file("$this_file/$login_cssfile")) {
		$file = trailingslashit(get_option('siteurl')) . trailingslashit(substr($this_file, strpos($this_file, 'wp-content'))) . $login_cssfile;
		echo '<link rel="stylesheet" href="'.$file.'" type="text/css" media="screen" />'."\n";
	}
}

function change_admin_footer () {
	echo "Juiced by <a href='http://konscript.com' target='_blank'>Konscript</a>";
} 

add_action('admin_head', 'add_admin_style');
add_action('login_head', 'add_login_style');

add_filter('admin_footer_text', 'change_admin_footer');

?>
