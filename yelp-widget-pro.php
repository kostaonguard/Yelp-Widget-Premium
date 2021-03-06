<?php
/**
 * Plugin Name: Yelp Widget Premium
 * Plugin URI: http://wordimpress.com/wordpress-plugin-development/yelp-widget-pro/
 * Description: Easily display Yelp business ratings with a simple and intuitive WordPress widget.
 * Version: 2.0.0
 * Author: WordImpress
 * Author URI: http://wordimpress.com/
 * License: GPLv2
 */

if ( ! defined( 'YELP_PLUGIN_NAME' ) ) {
	define( 'YELP_PLUGIN_NAME', 'yelp-widget-pro' );
}
if ( ! defined( 'YELP_PLUGIN_NAME_PLUGIN' ) ) {
	define( 'YELP_PLUGIN_NAME_PLUGIN', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'YELP_WIDGET_PRO_PATH' ) ) {
	define( 'YELP_WIDGET_PRO_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
}
if ( ! defined( 'YELP_WIDGET_PRO_URL' ) ) {
	define( 'YELP_WIDGET_PRO_URL', plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) );
}
if ( ! defined( 'YWP_SETTINGS_URL' ) ) {
	define( 'YWP_SETTINGS_URL', admin_url( 'options-general.php?page=yelp_widget' ) );
}

/**
 * Localize the Plugin for Other Languages
 */
load_plugin_textdomain( 'ywp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


/**
 * Adds Yelp Widget Pro Options Page
 */
require_once( dirname( __FILE__ ) . '/includes/options.php' );

if ( ! class_exists( 'YWPOAuthToken', false ) ) {
	require_once( dirname( __FILE__ ) . '/lib/oauth.php' );
}

/**
 * Get the Widget and Shortcode
 */
if ( ! class_exists( 'Yelp_Widget' ) ) {
	require 'includes/widget-main.php';
	require 'includes/shortcode-main.php';

	if ( is_admin() ) {
		include YELP_WIDGET_PRO_PATH . '/includes/admin.php';
	}
}