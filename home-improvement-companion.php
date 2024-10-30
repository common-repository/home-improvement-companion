<?php
/**
 * Home Improvement Companion
 *
 * @package   home-improvement-companion
 * @author    Alley Themes <alleythemes.com>
 * @copyright 2023 Home Improvement Companion
 * @license   MIT
 * @link      https://alleythemes.com/
 *
 * Plugin Name:     Home Improvement Companion
 * Plugin URI:
 * Description:     Home Improvement Companion plugin  adds additional features to the Home Improvement Theme. It helps with creation of conversion oriented home page section features, custom post types (team, promotion, testimonial, and portfolio), advanced theme customization, and more features to craft standout service business websites for contractors, interior designers, and renovation specialists.
 * Version:         1.0.2
 * Requires WP:     5.6.0
 * Tested up to:    6.6.2
 * Author:          Alley Themes
 * Author URI:      https://alleythemes.com/
 * License:         GPLv3 or later
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:     home-improvement-companion
 * Domain Path:     /languages
 * Requires PHP:    7.1
 * Namespace:       HomeImprovementCompanion
 */

declare( strict_types = 1 );

/**
 * Checks if the Pro version of the Home Improvement Companion plugin is active.
 *
 * This function verifies the presence of the Pro version plugin file path within
 * the list of active plugins retrieved from WordPress options.
 *
 * @return bool True if the Pro version plugin is active, false otherwise.
 */
function home_improvement_companion_pro_checking() {
    $pro_version_plugin_path = 'home-improvement-companion-pro/home-improvement-companion-pro.php';
    $active_plugins          = get_option( 'active_plugins', array() );
    return in_array( $pro_version_plugin_path, $active_plugins, true );
}
if ( home_improvement_companion_pro_checking() ) {
    return;
}

/**
 * Define the default root file of the plugin
 *
 * @since 1.0.0
 */
if ( ! defined( 'HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE' ) ) {
    define( 'HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE', __FILE__ ); //phpcs:ignore NeutronStandard.Constants.DisallowDefine.Define
}

/**
 * Load PSR4 autoloader
 *
 * @since 1.0.0
 */
$home_improvement_companion_autoloader = require plugin_dir_path( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'vendor/autoload.php';
require plugin_dir_path( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'src/Helpers.php';
require plugin_dir_path( HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE ) . 'vendors/kirki/kirki.php';

/**
 * Setup hooks (activation, deactivation, uninstall)
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, array( 'HomeImprovementCompanion\Config\Setup', 'activation' ) );
register_deactivation_hook( __FILE__, array( 'HomeImprovementCompanion\Config\Setup', 'deactivation' ) );
register_uninstall_hook( __FILE__, array( 'HomeImprovementCompanion\Config\Setup', 'uninstall' ) );

/**
 * Bootstrap the plugin
 *
 * @since 1.0.0
 */
if ( ! class_exists( '\HomeImprovementCompanion\Bootstrap' ) ) {
    wp_die( esc_html__( 'Home Improvement Companion is unable to find the Bootstrap class.', 'home-improvement' ) );
}
add_action(
    'plugins_loaded',
    /**
     * Callback function for initializing the Home Improvement Companion Bootstrap class.
     *
     * @param object $home_improvement_companion_autoloader The autoloader object.
     */
    static function () use ( $home_improvement_companion_autoloader ) {
        /**
         * Callback function
         *
         * @see \HomeImprovementCompanion\Bootstrap
         */
        try {
            new \HomeImprovementCompanion\Bootstrap( $home_improvement_companion_autoloader );
        } catch ( Exception $e ) {
            wp_die( esc_html__( 'Home Improvement Companion is unable to run the Bootstrap class.', 'home-improvement' ) );
        }
    }
);

/**
 * Create a main function for external uses
 *
 * @return \HomeImprovementCompanion\Common\Functions
 * @since 1.0.0
 */
if ( ! function_exists( 'home_improvement_companion' ) ) {
    /**
     * Returns an instance of the Home Improvement Companion Functions class.
     *
     * @return \HomeImprovementCompanion\Common\Functions An instance of the Functions class.
     */
    function home_improvement_companion(): \HomeImprovementCompanion\Common\Functions {
        return new \HomeImprovementCompanion\Common\Functions();
    }
}
