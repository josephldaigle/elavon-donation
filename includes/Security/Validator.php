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
	 * Sanitize the edp_api_key field from the admin screen.
	 *
	 * @param $input
	 * @return mixed
	 */
	public function edp_api_key( $input )
	{
		$current_option_value = get_option('edp_api_key');

		if ( preg_match('/\d{4,7}/', $input)) {
			return sanitize_text_field( $input );
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Key is not valid.', 'error' );
		}

		return $current_option_value;
	}

	/**
	 * Sanitize the edp_api_pass field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_pass( $input )
	{
		$current_option_value = get_option('edp_api_pass');

		if ( preg_match('/\d{4,7}/', $input)) {
			return $input;
		} else {
			add_settings_error( 'edp_messages', 'edp_message', 'API Password is not valid.', 'error' );
		}

		return $current_option_value;
	}

}