<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 9:47 AM
 */

namespace EDP_Donation;

/**
 * Public.
 *
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 */
class Elavon_Donation_Public
{
	/**
	 * The ID of this plugin.
	 *
	 * @var string
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Elavon_Donation_Public constructor.
	 *
	 * @param string $plugin_name
	 * @param string $version
	 */
	public function __construct( string $plugin_name, string $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'bootstrap_css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
		wp_enqueue_style( 'edp_style', plugins_url('css/edp-style.css', __FILE__) );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'jquery_slim', '//code.jquery.com/jquery-3.2.1.slim.min.js');
		wp_enqueue_script( 'popper_js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
		wp_enqueue_script( 'bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
		wp_enqueue_script( 'jquery_mask', '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js', array('jquery') );
		wp_enqueue_script( 'fittext_js', '//cdnjs.cloudflare.com/ajax/libs/FitText.js/1.2.0/jquery.fittext.min.js');

	}

}