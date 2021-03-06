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
		$field_name = 'Account number';
		$constraints = array(
				new Length(array(
					'min' => 5,
					'max' => 64,
					'minMessage' => $field_name . ' is too short.',
					'maxMessage' => $field_name . ' is too long.'
				)),
			    new NotBlank( array(
				    'message' => $field_name . ' cannot be blank.'
			    )),
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
		$field_name = 'User ID';
		$constraints = array(
			new Length(array(
				'min' => 5,
				'max' => 64,
				'minMessage' => $field_name . ' is too short.',
				'maxMessage' => $field_name . ' is too long.'
			)),
			new NotBlank(array(
				'message' => $field_name . ' cannot be blank.'
			))
		);

		return sanitize_text_field($this->validate(get_option('edp_api_user_id_prod'), $input, $constraints));
	}
	
	/**
	 * Sanitize the edp_api_pass_prod field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_pass_prod( $input )
	{
		$field_name = 'API password';
		$constraints = array(
			new Length(array(
				'min' => 5,
				'max' => 64,
				'minMessage' => $field_name . ' is too short.',
				'maxMessage' => $field_name . ' is too long.'
			)),
			new NotBlank(array(
				'message' => $field_name . ' cannot be blank.'
			))
		);

		return sanitize_text_field($this->validate(get_option('edp_api_pass_prod'), $input, $constraints));

	}


	/**
	 * Sanitize the edp_api_account_number_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_account_number_test( $input )
	{
		$field_name = 'Account number (demo)';
		$constraints = array(
			new Length(array(
				'min' => 5,
				'max' => 64,
				'minMessage' => $field_name . ' is too short.',
				'maxMessage' => $field_name . ' is too long.'
			)),
			new NotBlank(array(
				'message' => $field_name . ' cannot be blank.'
			))
		);

		return sanitize_text_field($this->validate(get_option('edp_api_account_number_test'), $input, $constraints));

	}

	
	/**
	 * Sanitize the edp_api_user_id_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_user_id_test( $input )
	{
		$field_name = 'User ID (demo)';
		$constraints = array(
			new Length(array(
				'min' => 5,
				'max' => 64,
				'minMessage' => $field_name . ' is too short.',
				'maxMessage' => $field_name . ' is too long.'
			)),
			new NotBlank(array(
				'message' => $field_name . ' cannot be blank.'
			))
		);

		return sanitize_text_field($this->validate(get_option('edp_api_user_id_test'), $input, $constraints));

	}

	/**
	 * Sanitize the edp_api_pass_test field from the admin screen.
	 *
	 * @param $input
	 * @return string
	 */
	public function edp_api_pass_test( $input )
	{
		$field_name = 'API password (demo)';
		$constraints = array(
			new Length(array(
				'min' => 5,
				'max' => 64,
				'minMessage' => $field_name . ' is too short.',
				'maxMessage' => $field_name . ' is too long.'
			)),
			new NotBlank(array(
				'message' => $field_name . ' cannot be blank.'
			))
		);

		return sanitize_text_field($this->validate(get_option('edp_api_pass_test'), $input, $constraints));
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