<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/31/18
 * Time: 8:09 AM
 */

namespace EDP_Donation;

/**
 * Loader.
 *
 * Register all actions and filters for the plugin.
 */
class Loader
{

	/**
	 * @var array
	 */
	protected $actions;

	/**
	 * @var array
	 */
	protected $filters;

	/**
	 * @var array
	 */
	protected $shortcodes;

	/**
	 * Elavon_Donation_Loader constructor.
	 */
	public function __construct()
	{
		$this->actions = array();
		$this->filters = array();
		$this->shortcodes = array();
	}

	/**
	 * Add a new action to be registered with the plugin.
	 *
	 * @param     $hook
	 * @param     $component
	 * @param     $callback
	 * @param int $priority
	 * @param int $accepted_args
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 )
	{
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to be registered with the plugin.
	 *
	 * @param     $hook
	 * @param     $component
	 * @param     $callback
	 * @param int $priority
	 * @param int $accepted_args
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 )
	{
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new shortcode to be registered with the plugin.
	 *
	 * @param $name
	 * @param $callback
	 *
	 * @return bool|void
	 */
	public function add_shortcode( $name, $callback )
	{
		array_push( $this->shortcodes,  array( 'name' => $name, 'callback' => $callback ) );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @param $hooks
	 * @param $hook
	 * @param $component
	 * @param $callback
	 * @param $priority
	 * @param $accepted_args
	 *
	 * @return array
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args )
	{
		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);
		return $hooks;
	}

	/**
	 * Register the filters, actions, and shortcodes with WordPress.
	 */
	public function run()
	{

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->shortcodes as $shortcode ) {
			add_shortcode( $shortcode['name'], $shortcode['callback'] );
		}

	}
}