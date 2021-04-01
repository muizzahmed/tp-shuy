<?php
/**
 * Plugin Name:       TP Shuy
 * Plugin URI:        https://themesplatform.com/plugin/
 * Description:       Plugin helps to handle & make changes in shuy template
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.2
 * Author:            Themes Platform
 * Author URI:        https://themesplatform.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tp-shuy
 * Domain Path:       /tp-shuy
 */

$tp_trans_name = 'tp-shuy';

if( !function_exists( 'add_action' )){
    esc_html_e( "Use through admin panel!", $tp_trans_name);
    exit;
}

// Includes
include('includes/activate.php');
include('includes/widget.php');

// Setup
include('setup/widgets.php');
include('setup/post-types.php');
include('setup/rest-api.php');
include('setup/sidebar.php');
include('setup/home.php');


// Hooks
register_activation_hook( __FILE__, 'tp_plugin_activation' );