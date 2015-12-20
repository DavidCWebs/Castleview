<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://carawebs.com
 * @since             1.0.0
 * @package           Castleview
 *
 * @wordpress-plugin
 * Plugin Name:       Carawebs Castleview
 * Plugin URI:        http://carawebs.com
 * Description:       Custom functionaility for the Castleview website
 * Version:           1.0.0
 * Author:            David Egan
 * Author URI:        http://carawebs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       castleview
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Autoload all the NEW classes
 */
require_once 'autoloader.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-castleview-activator.php
 */
function activate_castleview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-castleview-activator.php';
	Castleview_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-castleview-deactivator.php
 */
function deactivate_castleview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-castleview-deactivator.php';
	Castleview_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_castleview' );
register_deactivation_hook( __FILE__, 'deactivate_castleview' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-castleview.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_castleview() {

	$plugin = new Castleview();
	$plugin->run();

}
run_castleview();

if ( !function_exists( 'caradump' ) ) {

	/**
	 * Better debugging - auto add <pre> tags
	 *
	 * @param  [type] $var   [description]
	 * @param  [type] $title [description]
	 * @return [type]        [description]
	 */
	function caradump( $var, $title = null ) {

		echo "<pre>";
		echo "<h3>Dump $title</h3>";
		var_dump( $var );
		echo "</pre>";

	}

}
