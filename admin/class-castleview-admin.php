<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://carawebs.com
 * @since      1.0.0
 *
 * @package    Castleview
 * @subpackage Castleview/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Castleview
 * @subpackage Castleview/admin
 * @author     David Egan <david@carawebs.com>
 */
class Castleview_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $castleview    The ID of this plugin.
	 */
	private $castleview;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $castleview       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $castleview, $version ) {

		$this->castleview = $castleview;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Castleview_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Castleview_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->castleview, plugin_dir_url( __FILE__ ) . 'css/castleview-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Castleview_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Castleview_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->castleview, plugin_dir_url( __FILE__ ) . 'js/castleview-admin.js', array( 'jquery' ), $this->version, false );

	}

}
