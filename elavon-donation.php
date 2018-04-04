<?php
/**
 * Plugin Name:     Elavon Donation
 * Plugin URI:      https://github.com/josephldaigle/elavon-donation
 * Version:         1.0.0
 * Description:     A donation plugin for Wordpress, using the Elavon Converge payment gateway.
 * Author:          Joseph Daigle
 * Author URI:      www.joedaigle.me
 * Date: 3/30/18
 * Time: 9:31 PM
 */

// abort if this file is called directly.
if (! defined('WPINC')) {
    die;
}

/**
 * Current plugin version.
 */
define( 'ELAVON_DONATION_VERSION', '1.0.0');

require_once 'vendor/autoload.php';

register_activation_hook( __FILE__, array( '\EDP_Donation\Plugin_Activator', 'activate') );
register_deactivation_hook( __FILE__, array( '\EDP_Donation\Plugin_Deactivator', 'deactivate' ) );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
function run_elavon_donation() {
	$plugin = new \EDP_Donation\Elavon_Donation();
	$plugin->initialize();
	$plugin->run();
}
run_elavon_donation();