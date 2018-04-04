<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 11:01 PM
 */

namespace EDP_Donation\Security;
/**
 * Encrypter.
 *
 */
class Encrypter
{
	/**
	 * Encrypt a plain text string using wp_salt().
	 *
	 * @param $plain_text
	 * @return string
	 */
	public function encrypt( $plain_text ){
		$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
		$iv = openssl_random_pseudo_bytes($ivlen);
		$ciphertext_raw = openssl_encrypt($plain_text, $cipher, wp_salt(), $options=OPENSSL_RAW_DATA, $iv);
		return base64_encode( $iv . $ciphertext_raw );
	}

	/**
	 * Decrypt Text
	 * @link https://shellcreeper.com/?p=2082
	 */
	public function decrypt( $encrypted_text ){
		$c = base64_decode($encrypted_text);
		$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
		$iv = substr($c, 0, $ivlen);
		$ciphertext_raw = substr($c, $ivlen);
		return openssl_decrypt($ciphertext_raw, $cipher, wp_salt(), $options=OPENSSL_RAW_DATA, $iv);
	}
}