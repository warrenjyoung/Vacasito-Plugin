<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://vacasito.com/
 * @since             1.0.0
 * @package           Vacasito
 *
 * @wordpress-plugin
 * Plugin Name:       Vacasito Plugin
 * Plugin URI:        https://vacasito.com/
 * Description:       This plugin allows vacasito to manage content.
 * Version:           1.0.0
 * Author:            Vacasito
 * Author URI:        https://vacasito.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vacasito
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VACASITO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vacasito-activator.php
 */
function activate_vacasito() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vacasito-activator.php';
	Vacasito_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vacasito-deactivator.php
 */
function deactivate_vacasito() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vacasito-deactivator.php';
	Vacasito_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vacasito' );
register_deactivation_hook( __FILE__, 'deactivate_vacasito' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vacasito.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vacasito() {

	$plugin = new Vacasito();
	$plugin->run();

}
run_vacasito();
