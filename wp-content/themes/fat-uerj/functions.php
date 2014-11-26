<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/

require_once('wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php');

add_theme_support('menus');

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head', 'wp_generator');

?>