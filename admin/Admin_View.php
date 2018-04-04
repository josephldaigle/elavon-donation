<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 10:44 AM
 */

namespace EDP_Donation;


/**
 * Admin_View.
 *
 * Contains functions for generating admin pages in WordPress.
 */
class Admin_View
{
	/**
	 * Load the html for the admin page.
	 */
	public function options_page_html()
	{
		include_once( plugin_dir_path( __FILE__ ) . 'partials/admin-options.php' );
	}

	/**
	 * Print the Section text for the admin page
	 */
	public function section_info()
	{
		print 'Configure the plugin:';
	}

	/**
	 * Display the html for the api_key field on the admin screen.
	 */
	public function api_key_input_html()
	{
		printf(
			'<input type="text" id="edp_api_key" name="edp_api_key" value="%s" placeholder="84ce3bh432" pattern="[0-9]{1,8}" title="Must be a valid Converge API Key format." required />',
			esc_attr( ( $val = get_option('edp_api_key') ) ? $val : '' )
		);
	}

	/**
	 * Display the html for the api_key field on the admin screen.
	 */
	public function api_pass_input_html()
	{
		printf(
			'<input type="text" id="edp_api_pass" name="edp_api_pass" value="%s" placeholder="U1j$UQkYGzPyk*0y" pattern="[0-9]{1,8}" title="Must be a valid Converge API password format." required />',
			esc_attr( ( $val = get_option('edp_api_pass') ) ? $val : '' )
		);
	}

}