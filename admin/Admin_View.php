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

	public function mode_section_info()
	{
		print '<small>Easily test your site using Elavon\'s demo API.</small>';
	}

	/**
	 * Print the Section text for the admin page
	 */
	public function prod_section_info()
	{
		print '<h4>Live Credentials</h4>
			<small>Used in live mode. We encrypt these before </small>';
	}

	public function test_section_info()
	{
		print '<h4>Test Credentials</h4><small>Used in demo mode.</small>';
	}

	/**
	 * Display the html for the api_mode field on the admin screen.
	 */
	public function edp_api_mode_input_html()
	{
		printf(
			'<div class="form-group">
			    <input type="checkbox" id="edp_api_mode" class="form-control" name="edp_api_mode" %s data-toggle="toggle"
			    	data-onstyle="success" data-offstyle="primary" data-on="Live" data-off="Demo" data-size="small" data-style="quick" />
		  	</div>',
			( $val = get_option('edp_api_mode') ) ? 'checked' : ''
		);
	}

	/**
	 * Display the html for the api_account_number_prod field on the admin screen.
	 */
	public function edp_api_account_number_prod_html()
	{
		printf(
	'<div class="form-group">
				<input type="text" id="edp_api_account_number_prod" class="form-control" name="edp_api_account_number_prod" value="%s" required />
			</div>',
			esc_attr( ( $val = get_option('edp_api_account_number_prod') ) ? $val : '' )
		);
	}

	/**
	 * Display the html for the api_key field on the admin screen.
	 */
	public function edp_api_user_id_prod_html()
	{
		printf(
	'<div class="form-group">
				<input type="text" id="edp_api_user_id_prod" class="form-control" name="edp_api_user_id_prod" value="%s" required />
			</div>',
			esc_attr( ( $val = get_option('edp_api_user_id_prod') ) ? $val : '' )
		);
	}

	/**
	 * Display the html for the api_key field on the admin screen.
	 */
	public function edp_api_pass_prod_html()
	{
		printf(
			'<div class="form-group row">
				<input type="text" id="edp_api_pass_prod" class="form-control" name="edp_api_pass_prod" value="%s" required />
			</div>',
			esc_attr( ( $val = get_option('edp_api_pass_prod') ) ? $val : '' )
		);
	}


	public function edp_api_account_number_test_html(  ) {
		printf(
			'<div class="form-group row">
				<input type="text" id="edp_api_account_number_test" class="form-control" name="edp_api_account_number_test" value="%s" required />
			</div>',
			esc_attr( ( $val = get_option('edp_api_account_number_test') ) ? $val : '' )
		);
	}

	public function edp_api_user_id_test_html(  ) {
		printf(
			'<div class="form-group row">
				<input type="text" id="edp_api_user_id_test" class="form-control" name="edp_api_user_id_test" value="webpage" required />
			</div>
			<small id="edp_api_user_id_test_help" class="form-text text-muted">You shouldn\'t need to change this value.</small>',
			esc_attr( ( $val = get_option('edp_api_user_id_test') ) ? $val : '' )
		);
	}

	public function edp_api_pass_test_html(  ) {
		printf(
			'<div class="form-group row">
				<input type="text" id="edp_api_pass_test" class="form-control" name="edp_api_pass_test" value="%s" required />
			</div>',
			esc_attr( ( $val = get_option('edp_api_pass_test') ) ? $val : '' )
		);
	}
}