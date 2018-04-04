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