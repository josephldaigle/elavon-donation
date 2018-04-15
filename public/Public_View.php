<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/2/18
 * Time: 6:50 PM
 */

namespace EDP_Donation;


/**
 * Public_View.
 *
 * @package EDP_Donation
 */
class Public_View
{
	/**
	 * @var Shortcodes
	 */
	private $shortcodes;

	/**
	 * Public_View constructor.
	 *
	 * @param Shortcodes $shortcodes
	 */
	public function  __construct(Shortcodes $shortcodes)
	{
		$this->shortcodes = $shortcodes;
	}

}