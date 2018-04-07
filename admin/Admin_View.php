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
		print '<h4>Demo Credentials</h4><small>Used in demo mode.</small>';
	}

	/**
	 * Display the html for the api_mode field on the admin screen.
	 */
	public function edp_api_mode_input_html()
	{
		printf( '<input type="checkbox" id="edp_api_mode" class="form-control" name="edp_api_mode" %s data-toggle="toggle"
			    	data-onstyle="success" data-offstyle="primary" data-on="Live" data-off="Demo" data-size="small" data-style="quick" />',
			( $val = get_option('edp_api_mode') ) ? 'checked' : ''
		);
	}

	/**
	 * Display the html for the api_account_number_prod field on the admin screen.
	 */
	public function edp_api_account_number_prod_html()
	{
		$this->open_input();

		printf( '<input type="text" id="edp_api_account_number_prod" class="form-control" name="edp_api_account_number_prod" value="%s" required />',
			esc_attr( ( $val = get_option('edp_api_account_number_prod') ) ? $val : '' )
		);

		$this->close_input();

	}

	/**
	 * Display the html for the api_key field on the admin screen.
	 */
	public function edp_api_user_id_prod_html()
	{
		$this->open_input();

		printf( '<input type="text" id="edp_api_user_id_prod" class="form-control" name="edp_api_user_id_prod" value="%s" required />',
			esc_attr( ( $val = get_option('edp_api_user_id_prod') ) ? $val : '' )
		);

		$this->close_input();
	}

	/**
	 * Display the html for the api_key field on the admin screen.
	 */
	public function edp_api_pass_prod_html()
	{
		$this->open_input();

		printf( '<input type="password" class="form-control" id="edp_api_pass_prod" name="edp_api_pass_prod" value="%s" required data-toggle="password" data-placement="after" data-eye-class="fa" data-eye-open-class="fas fa-eye" data-eye-close-class="fas fa-eye-slash" >',
			esc_attr( ( $val = get_option('edp_api_pass_prod') ) ? $val : '' )
		);

		$this->close_input();

	}

	public function edp_api_account_number_test_html(  )
	{
		$this->open_input();

		printf( '<input type="text" id="edp_api_account_number_test" class="form-control"  name="edp_api_account_number_test" value="%s" required />',
			esc_attr( ( $val = get_option('edp_api_account_number_test') ) ? $val : '' )
		);

		$this->close_input();

	}

	public function edp_api_user_id_test_html(  )
	{
		$this->open_input();

		printf( '<input type="text" id="edp_api_user_id_test" class="form-control" name="edp_api_user_id_test" value="webpage" required />
			<small id="edp_api_user_id_test_help" class="form-text text-muted">You shouldn\'t need to change this value.</small>',
			esc_attr( ( $val = get_option('edp_api_user_id_test') ) ? $val : '' )
		);

		$this->close_input();

	}

	public function edp_api_pass_test_html(  )
	{
		$this->open_input();

		printf( '<input type="password" id="edp_api_pass_test" class="form-control" name="edp_api_pass_test" value="%s" required data-toggle="password" data-placement="after" data-eye-class="fa" data-eye-open-class="fas fa-eye" data-eye-close-class="fas fa-eye-slash"/>',
			esc_attr( ( $val = get_option('edp_api_pass_test') ) ? $val : '' )
		);

		$this->close_input();

	}

	private function open_input()
	{
//		print('<div class="row"><div class="form-group col-xs-10 col-sm-6 col-md-4">');
	}

	private function close_input()
	{
		print('</div></div>');
	}
}