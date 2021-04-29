<?php

/**

 * @author Jacob The Web Dev

 * @copyright 2021

 */

if (!defined('ABSPATH')) die();



function ds_ct_enqueue_parent() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }



function ds_ct_loadjs() {

	wp_enqueue_script( 'ds-theme-script', get_stylesheet_directory_uri() . '/ds-script.js',

        array( 'jquery' )

    );

}

add_action( 'wp_enqueue_scripts', 'ds_ct_enqueue_parent' );

add_action( 'wp_enqueue_scripts', 'ds_ct_loadjs' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Website Settings',
		'menu_title'	=> 'Website Settings',
		'menu_slug' 	=> 'website-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
	
function menu_item_text( $menu ) {
     $menu = str_ireplace( 'Marketing', 'Coupons', $menu );
     $menu = str_ireplace( 'WooCommerce', 'Payments', $menu );
     return $menu;
}
add_filter('gettext', 'menu_item_text');
add_filter('ngettext', 'menu_item_text');

?>
