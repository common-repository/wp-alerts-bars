<?php
/**
 * Plugin Name:       WP Alerts Bars
 * Plugin URI:        http://shuvo.work/wp-stemap
 * Description:       Alert Notice Bars allows you to create beautiful custom alerts that appear on pages or posts of your choice. use this shortcode [wab_bars type="primary"] This is a primary alert—check it out! [/wab_bars]
 * Version:           1.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shuvo Islam
 * Author URI:        http://shuvo.work/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-alert-bar
 * Domain Path:       /languages
 */

// SECURITY : Exit if accessed directly
if ( !defined('ABSPATH') ) {
	exit;
}

// alert shortcode

function wab_shortcode($atts, $content = null){

	extract(shortcode_atts(
		array(
			'type' => 'primary'
		),
		$atts
	));

	return '<div class="alert alert-'.esc_attr($type).'" role="alert">'.esc_html($content).'</div>';
}
add_shortcode('wab_bars', 'wab_shortcode');





// Registering Wp Alert Bar files

function wab_bars_files(){
	wp_enqueue_style('bootstrap-css', plugin_dir_url( __FILE__ ) .'assets/css/bootstrap.min.css', array(), '4.0.0');
}
add_action('wp_enqueue_scripts', 'wab_bars_files');