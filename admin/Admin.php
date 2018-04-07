<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 10:00 AM
 */

namespace EDP_Donation;


use EDP_Donation\Security\Sanitizer;

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
	 * @var Sanitizer
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
								Sanitizer $validator )
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->view = $view;
		$this->validator = $validator;
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles( $hook ) {
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
		// enqueue styles for plugin config page
		if($hook == 'toplevel_page_elavon-donation') {
			wp_enqueue_style( 'bootstrap_css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
			wp_enqueue_style( 'bootstrap_toggle_css', '//gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css' );
			wp_enqueue_style( 'admin_page_css', plugins_url('css/admin-style.css', __FILE__) );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts( $hook ) {
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

		if( $hook == 'toplevel_page_elavon-donation' ) {
			wp_enqueue_script( 'popper_js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'));
			wp_enqueue_script( 'bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'));
			wp_enqueue_script( 'bootstrap_toggle_js', '//gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js', array('jquery', 'bootstrap_js'));
			wp_enqueue_script( 'bootstrap_show_password_js', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.1.2/bootstrap-show-password.min.js', array('jquery', 'bootstrap_js'), false, true);
			wp_enqueue_script( 'font_awesome', '//use.fontawesome.com/c5971878d4.js');
		}
	}

	/**
	 * Register admin settings for the plugin.
	 */
	public function init_admin_options()
	{
		// register live account options
		register_setting( 'edp_options', 'edp_api_mode'/*, array($this->validator, 'edp_api_mode')*/ );
		register_setting( 'edp_options', 'edp_api_account_number_prod',  array($this->validator, 'edp_api_account_number_prod') );
		register_setting( 'edp_options', 'edp_api_user_id_prod', array($this->validator, 'edp_api_user_id_prod') );
		register_setting( 'edp_options', 'edp_api_pass_prod', array($this->validator, 'edp_api_pass_prod') );

		// register test account options
		register_setting( 'edp_options', 'edp_api_account_number_test', array($this->validator, 'edp_api_account_number_test') );
		register_setting( 'edp_options', 'edp_api_user_id_test', array($this->validator, 'edp_api_user_id_test') );
		register_setting( 'edp_options', 'edp_api_pass_test', array($this->validator, 'edp_api_pass_test') );

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

	// only runs if the option is changes
	public function update_option( $option_name, $old_value, $new_value )
	{

	}

}