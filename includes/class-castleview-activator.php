<?php

/**
 * Fired during plugin activation
 *
 * @link       http://carawebs.com
 * @since      1.0.0
 *
 * @package    Castleview
 * @subpackage Castleview/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Castleview
 * @subpackage Castleview/includes
 * @author     David Egan <david@carawebs.com>
 */
class Castleview_Activator {

	/**
	 * Actions to be taken on activation
	 *
	 * Set up custom post types.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		// Initialize the class
		$custom_post_types = new Castleview\Admin\CPT();

		// Register 'project' Custom Post Type
		$custom_post_types->project_init();

		// Register a custom taxonomy for project CPTs
		$custom_post_types->project_taxonomy();

		// Register 'service' Custom Post Type
		$custom_post_types->service_init();

	}

}
