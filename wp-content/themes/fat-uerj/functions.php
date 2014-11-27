<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/

require_once('wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php');

add_theme_support('menus');

add_filter('show_admin_bar', '__return_false');

//post-thumbnail
add_theme_support('post-thumbnails');

remove_action('wp_head', 'wp_generator');

function wpt_remove_version() {
    return '';
}

add_filter('the_generator', 'wpt_remove_version');

function changePostDegree($terms) {
    echo count($terms);
    print_r($terms);
}

include_once('fields.php');

?>
