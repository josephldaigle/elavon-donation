<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 10:00 AM
 */

namespace EDP_Donation;


use EDP_Donation\Security\Validator;

/**
 * Admin.
 *
 * The admin functionality of the plugin.
 */
class Admin
{
	/**
	 * @var string
	 */
	private $plugin_name;

	/**
	 * @var string
	 */
	private $version;

	/**
	 * @var Admin_View
	 */
	private $view;

	/**
	 * @var Validator
	 */
	private $validator;

	/**
	 * Elavon_Donation_Admin constructor.
	 *
	 * @param string $plugin_name
	 * @param string $version
	 */
	public function __construct( string $plugin_name,
								string $version,
								Admin_View $view,
								Validator $validator )
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->view = $view;
		$this->validator = $validator;
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register admin settings for the plugin.
	 */
	public function init_admin_options()
	{
		// register settings section
		add_settings_section(
			'edp_settings',
			'Elavon Donation Settings',
			array( $this->view, 'section_info' ),
			'elavon-donation'
		);

		// register api key field
		add_settings_field(
			'edp_api_key',
			'Converge API Key:',
			array( $this->view, 'api_key_input_html' ),
			'elavon-donation',
			'edp_settings'
		);
		add_settings_field(
			'edp_api_pass',
			'Converge API Password:',
			array( $this->view, 'api_pass_input_html' ),
			'elavon-donation',
			'edp_settings'
		);

		// register options
		register_setting( 'edp_options', 'edp_api_key',  array($this->validator, 'edp_api_key') );
		register_setting( 'edp_options', 'edp_api_pass', array($this->validator, 'edp_api_pass') );
	}

	/**
	 * Register menu pages for the admin area.
	 */
	public function register_admin_menu()
	{
		// register admin page with WP
		add_menu_page(
			'Elavon Donation Plugin',
			'Donate',
			'manage_options',
			'elavon-donation',
			array($this->view, 'options_page_html'),
			'', //plugin_dir_url( dirname( __FILE__  )) . 'public/icon-donate.png'
			89
		);
	}

}