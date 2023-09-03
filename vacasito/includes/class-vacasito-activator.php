<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Vacasito
 * @subpackage Vacasito/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Vacasito
 * @subpackage Vacasito/includes
 * @author     Your Name <email@example.com>
 */
class Vacasito_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	 // Create a new table during plugin activation
function locations_table_setup() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'locations';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
		address varchar(255) NOT NULL,
		city varchar(255) NOT NULL,
		state varchar(255) NOT NULL,
		zip varchar(255) NOT NULL,
		country varchar(255) NOT NULL,
		google_rating decimal(2, 1) NOT NULL,
		google_reviews int NOT NULL,
		location_type varchar(255) NOT NULL,
        create_date datetime NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
	public static function activate() {
		register_activation_hook(__FILE__, 'locations_table_setup');
	}

}
