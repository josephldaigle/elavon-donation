<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/1/18
 * Time: 8:55 PM
 */

namespace EDP_Donation\Security;


use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Sanitizer.
 *
 * Provides user input validation functions.
 */
class Sanitizer
{
	/**
	 * @var ValidatorInterface
	 */
	private $validator;

	/**
	 * Sanitizer constructor.
	 *
	 * @param ValidatorInterface $validator
	 */
	public function __construct( ValidatorInterface $validator ) {
		$this->validator = $validator;
	}

	/**
	 * Sanitize the edp_api_account_number_prod field from the admin screen.
	 *
	 * @param $input
	 * @return mixed
	 */
	public function edp_api_account_number_prod( $input )
	{
		$constraints = array(
				new Length(array(
					'min' => 3,
					'max' => 64,
					'minMessage' => 'Account number field is too short.'
				)),
			    new NotBlank()
			);

		return sanitize_text_field($this->validate(get_option('edp_api_account_number_prod'), $input, $constraints));
	}

	/**
	 * Sanitize the edp_api_user_id_prod field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_user_id_prod( $input )
	{
		return $input;
	}
	
	/**
	 * Sanitize the edp_api_pass_prod field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_pass_prod( $input )
	{
		return $input;

	}


	/**
	 * Sanitize the edp_api_account_number_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_account_number_test( $input )
	{
		return $input;

	}

	
	/**
	 * Sanitize the edp_api_user_id_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_user_id_test( $input )
	{
		return $input;

	}

	/**
	 * Sanitize the edp_api_pass_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_pass_test( $input )
	{
		return $input;
	}

	/**
	 * Validates an input field and applies the configured validation error messages to the WP Admin screen.
	 *
	 * @param $saved_option mixed   the existing option's stored value
	 * @param $new_value mixed      the user-provided option value
	 * @param $constraints mixed    an array of validation rules to apply
	 *
	 * @return mixed the existing value if validation fails, else the new value
	 */
	private function validate( $saved_option, $new_value, $constraints )
	{
		// validate new setting
		$violations = $this->validator->validate($new_value, $constraints);

		// handle validation errors
		if (0 !== count($violations)) {
			// errors, exist
			foreach ($violations as $violation) {
				add_settings_error( 'edp_messages', 'edp_message', $violation->getMessage(), 'error');
			}

			return $saved_option;
		}

		return $new_value;
	}

}