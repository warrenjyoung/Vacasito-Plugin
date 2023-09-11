<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Vacasito
 * @subpackage Vacasito/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vacasito
 * @subpackage Vacasito/admin
 * @author     Your Name <email@example.com>
 */
class Vacasito_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $vacasito    The ID of this plugin.
	 */
	private $vacasito;

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
	 * @param      string    $vacasito       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $vacasito, $version ) {

		$this->vacasito = $vacasito;
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
		 * defined in Vacasito_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vacasito_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->vacasito, plugin_dir_url( __FILE__ ) . 'css/vacasito-admin.css', array(), $this->version, 'all' );

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
		 * defined in Vacasito_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vacasito_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->vacasito, plugin_dir_url( __FILE__ ) . 'js/vacasito-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function create_table() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'vacasito_data';
		$charset_collate = $wpdb->get_charset_collate();
	
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			name varchar(255) DEFAULT '' NOT NULL,
			address varchar(255) DEFAULT '' NOT NULL,
			city varchar(100) DEFAULT '' NOT NULL,
			state varchar(100) DEFAULT '' NOT NULL,
			zip varchar(10) DEFAULT '' NOT NULL,
			country varchar(100) DEFAULT '' NOT NULL,
			google_star_rating float DEFAULT 0 NOT NULL,
			google_review_count int DEFAULT 0 NOT NULL,
			location_type varchar(100) DEFAULT '' NOT NULL,
			review text DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";
	
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}

	public function add_admin_menu() {
		add_menu_page('Vacasito Data', 'Vacasito Data', 'manage_options', 'vacasito-data', array($this, 'display_admin_page'));
	}
	
	public function display_admin_page() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'vacasito_data';
		$results = $wpdb->get_results("SELECT * FROM $table_name");
	
		// Display the data in a table format here
	}	

}
