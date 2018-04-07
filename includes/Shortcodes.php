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
	public function donation_form_shortcode( $atts )
	{
		// enqueue scripts and styles
		wp_enqueue_script( 'jquery-card-js', plugin_dir_url( dirname(__FILE__ ) ) . 'public/js/jquery.card.js', array( 'jquery' ) );
		wp_enqueue_script( 'edp-credit-card-js', plugin_dir_url( dirname(__FILE__ ) ) . 'public/js/edp-credit-card.js', array( 'jquery-card-js' ) );
		wp_enqueue_style( 'edp_card_js_style', plugin_dir_url( dirname(__FILE__ ) ) . 'public/css/edp-card-js-style.css' );

		ob_start();
		include_once( plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/payment-form.php' );
		$html = ob_get_clean();

		return $html;
	}

	/**
	 * Generate the html for the donation form.
	 */
	public function register_receipt_form()
	{
		return;
	}
}