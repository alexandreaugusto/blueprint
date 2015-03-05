<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/

require_once('wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php');

function fat_uerj_name_scripts() {
    wp_enqueue_style('dtree', get_stylesheet_directory() . '/css/dtree.css');
    wp_enqueue_script('dtree', get_template_directory_uri() . '/js/dtree.js', array(), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'fat_uerj_name_scripts');

add_theme_support('menus');

add_filter('show_admin_bar', '__return_false');

//post-thumbnail
add_theme_support('post-thumbnails');

remove_action('wp_head', 'wp_generator');

function wpt_remove_version() {
    return '';
}

add_filter('the_generator', 'wpt_remove_version');

function custom_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function fat_uerj_widgets_init() {
	register_sidebar(array(
		'name' => 'DTreeSidebar',
		'id' => 'dtreesidebar',
		'before_widget' => '<div class="col-md-8 corpo-docente">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="text-uppercase">',
		'after_title' => '</h4>',
		));
}

add_action('widgets_init', 'fat_uerj_widgets_init');

include_once('fields.php');

?>
