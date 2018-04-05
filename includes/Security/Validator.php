<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/1/18
 * Time: 8:55 PM
 */

namespace EDP_Donation\Security;

/**
 * Validator.
 *
 * Provides user input validation functions.
 */
class Validator
{
	/**
	 * Sanitize the edp_api_account_number_prod field from the admin screen.
	 *
	 * @param $input
	 * @return mixed
	 */
	public function edp_api_account_number_prod( $input )
	{
		$current_option_value = get_option('edp_api_account_number_prod');

		if ( preg_match('/\d{4,7}/', $input)) {
			return sanitize_text_field( $input );
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Key is not valid.', 'error' );
		}

		return $current_option_value;
	}

	/**
	 * Sanitize the edp_api_user_id_prod field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_user_id_prod( $input )
	{
		$current_option_value = get_option('edp_api_user_id_prod');

		if ( preg_match('/\d{4,7}/', $input)) {
			return $input;
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Password is not valid.', 'error' );
		}

		return $current_option_value;
	}
	
	/**
	 * Sanitize the edp_api_pass_prod field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_pass_prod( $input )
	{
		$current_option_value = get_option('edp_api_pass_prod');

		if ( preg_match('/\d{4,7}/', $input)) {
			return $input;
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Password is not valid.', 'error' );
		}

		return $current_option_value;
	}


	/**
	 * Sanitize the edp_api_account_number_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_account_number_test( $input )
	{
		$current_option_value = get_option('edp_api_account_number_test');

		if ( preg_match('/\d{4,7}/', $input)) {
			return $input;
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Password is not valid.', 'error' );
		}

		return $current_option_value;
	}

	
	/**
	 * Sanitize the edp_api_user_id_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_user_id_test( $input )
	{
		$current_option_value = get_option('edp_api_user_id_test');

		if ( preg_match('/\d{4,7}/', $input)) {
			return $input;
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Password is not valid.', 'error' );
		}

		return $current_option_value;
	}

	

	/**
	 * Sanitize the edp_api_pass_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_pass_test( $input )
	{
		$current_option_value = get_option('edp_api_pass_test');

		if ( preg_match('/\d{4,7}/', $input)) {
			return $input;
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Password is not valid.', 'error' );
		}

		return $current_option_value;
	}

}