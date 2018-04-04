<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/2/18
 * Time: 8:20 PM
 */

namespace EDP_Donation;
/**
 * Shortcodes.
 *
 * Registers shortcodes for the plugin.
 */
class Shortcodes
{
	/**
	 * Generate the html for the donation form.
	 */
	public function donation_form_shortcode()
	{
		wp_enqueue_script( 'jquery-card-js', plugin_dir_url( dirname(__FILE__ ) ) . 'public/js/jquery.card.js', array( 'jquery' ) );
		wp_enqueue_script( 'edp-credit-card-js', plugin_dir_url( dirname(__FILE__ ) ) . 'public/js/edp-credit-card.js', array( 'jquery-card-js' ) );

		include_once( plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/payment-form.php' );
	}

	/**
	 * Generate the html for the donation form.
	 */
	public function register_receipt_form()
	{
		return;
	}
}