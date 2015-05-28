<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/

require_once('wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php');

function fat_uerj_name_scripts() {
    wp_enqueue_style('jstree-css', get_template_directory_uri() . '/css/jstree-default.min.css');
    wp_enqueue_script('jstree', get_template_directory_uri() . '/js/jstree.min.js', array('jquery'), '1.0.0', false);
    wp_enqueue_script('download-js', get_template_directory_uri() . '/js/download.js', array(), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'fat_uerj_name_scripts');

add_theme_support('menus');

add_filter('show_admin_bar', '__return_false');

//post-thumbnail
add_theme_support('post-thumbnails');

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets' ) );

remove_action('wp_head', 'wp_generator');

remove_filter('the_excerpt', 'wpautop');

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

include_once('fields.php');



/*
 * Modify TinyMCE editor to remove H1.
 */
function tiny_mce_remove_unused_formats($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading Green=h4;Address=address;Pre=pre';
	return $init;
}
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );

add_filter('request', 'fat_uerj_request');
function fat_uerj_request($query_string )
{
    if( isset( $query_string['page'] ) ) {
        if( ''!=$query_string['page'] ) {
            if( isset( $query_string['name'] ) ) {
                unset( $query_string['name'] );
            }
        }
    }
    return $query_string;
 }
 
add_action('pre_get_posts','fat_uerj_pre_get_posts');
function fat_uerj_pre_get_posts( $query ) { 
    if( $query->is_main_query() && !$query->is_feed() && !is_admin() ) { 
        $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) ); 
    } 
}

?>
