<?php
/**
* Plugin name: Muc luc
* Plugin URL: https://www.caodem.com
* Description: Create a content table of contents for articles
* Domain Path: /languages
* Version: 1.1.1
* Author: ihoan caodem.com
* Author URL: https://www.caodem.com
* License: GPLv2 or later
/**
* Create content table for articles, designed by ihoan from caodem.com. The plugin is completely free, with the desire to serve the Wordpress writing community.
*/
// add hook js css muc luc
function Mucluc_tocbot_addjscss_head() {
wp_enqueue_script( 'mucluc-tocbot-js', plugins_url( 'menutoc/mucluc-tocbot.min.js', __FILE__ ), array(), '1.0.0');
wp_enqueue_style( 'mucluc-tocbot-css', plugins_url( 'menutoc/mucluc-tocbot.css', __FILE__ ), array(), '1.1.0');
wp_enqueue_script( 'mucluc-footertocbot-js', plugins_url( 'menutoc/mucluc-tocbot.js', __FILE__ ), array(), '1.1.0' , true);
}
add_action( 'wp_enqueue_scripts', 'Mucluc_tocbot_addjscss_head' );
// them id cho the h1 h2 h3 h4
function Mucluc_tocbot_addhtag_id( $content ) {
	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $mucluc_matches ) {
		if ( ! stripos( $mucluc_matches[0], 'id=' ) ) :
			$mucluc_matches[0] = $mucluc_matches[1] . $mucluc_matches[2] . ' id="' . sanitize_title( $mucluc_matches[3] ) . '">' . $mucluc_matches[3] . $mucluc_matches[4];
		endif;
		return $mucluc_matches[0];
	}, $content );
    return $content;
}
add_filter( 'the_content', 'Mucluc_tocbot_addhtag_id' );
// dua muc luc vao content
include( plugin_dir_path( __FILE__ ) . 'inc/mucluc-content.php');
// khoi tao bang cai dat
// retrieve our plugin settings from the options table
$mucluc_options = get_option('mucluc_settings');
// trinh quan ly admin
include( plugin_dir_path( __FILE__ ) . 'inc/mucluc-admin-page.php');
// the ngon ngu
function muc_luc_load_textdomain() {
  load_plugin_textdomain( 'muc-luc', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'muc_luc_load_textdomain' );
