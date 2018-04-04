<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/1/18
 * Time: 12:07 AM
 */

/**
 * WP_Encrypter_Test.
 */
class WP_Encrypter_Test extends WP_UnitTestCase
{
	/**
	 * @inheritdoc
	 */
	public function setUp() {

		parent::setUp();

		require_once plugin_dir_path( dirname(__FILE__ )) . 'includes/security/encrypter.php';
		$this->sut = new Encrypter();
	}

	public function testCanEncryptAndDecryptString()
	{
		// set up fixtures
		$plain_text = 'sometext';

		// exercise SUT
		$encrypted_string = $this->sut->encrypt($plain_text);
		$decrypted_string = $this->sut->decrypt($encrypted_string);

		// make assertions
		$this->assertEquals($plain_text, $decrypted_string);
	}
}