<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/1/18
 * Time: 8:55 PM
 */

namespace EDP_Donation\Security;


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
		return $input;
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

}