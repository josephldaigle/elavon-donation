<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 8:07 AM
 */

namespace EDP_Donation;

use EDP_Donation\Security\Validator;

/**
 * Elavon_Donation.
 *
 * This is the core plugin class.
 */
class Elavon_Donation
{

	/**
	 * @var Loader
	 */
	protected $loader;

	/**
	 * @var string
	 */
	protected $plugin_name;

	/**
	 * @var string
	 */
	protected $plugin_version;

	/**
	 * Elavon_Donation constructor.
	 */
	public function __construct()
	{
		// set version
		if ( ! defined( 'ELAVON_DONATION_VERSION' ) ) {
			$this->plugin_version = '1.0.0';
		}
		$this->plugin_version = ELAVON_DONATION_VERSION;

		// set name
		$this->plugin_name = 'Elavon Donation Plugin';
	}

	/**
	 * Initialize the plugin.
	 */
	public function initialize()
	{
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_shortcodes();
	}

	/**
	 * Load required dependencies for the plugin.
	 */
	private function load_dependencies()
	{
		$this->loader = new Loader();
	}

	/**
	 * Register admin hooks.
	 */
	private function define_admin_hooks()
	{
		$plugin_admin = new Admin( $this->get_plugin_name(),
			$this->get_plugin_version(),
			new Admin_View(),
			new Validator()
		);

		// enqueue scripts and styles
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// add top-level admin menu
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'register_admin_menu' );

		// register admin settings
		$this->loader->add_action(  'admin_init', $plugin_admin, 'init_admin_options' );

	}

	/**
	 * Register public hooks.
	 */
	private function define_public_hooks()
	{
		$plugin_public = new Elavon_Donation_Public( $this->get_plugin_name(), $this->get_plugin_version() );

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	/**
	 * Register shortcodes.
	 */
	private function define_shortcodes()
	{
		$shortcodes = new Shortcodes();

		// donation form shortcode
		$this->loader->add_shortcode( 'edp-donation-form', array( $shortcodes, 'donation_form_shortcode' ) );
//		$this->loader->add_shortcode( 'edp-donation-form-receipt', array( $shortcodes, 'donation_form_receipt' ) );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * Get the plugin name.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * Get the plugin version.
	 */
	public function get_plugin_version(  )
	{
		return $this->plugin_version;
	}
}