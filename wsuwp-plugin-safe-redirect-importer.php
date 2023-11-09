<?php
/**
 * Plugin Name: WSUWP Safe Redirect Importer
 * Plugin URI: https://github.com/wsuwebteam/wsuwp-plugin-safe-redirect-importer
 * Description: Allow csv import into safe redirect manager
 * Version: 1.0.1
 * Requires PHP: 7.0
 * Author: Washington State University, Danial Belile
 * Author URI: https://web.wsu.edu/
 * Text Domain: wsuwp-plugin-safe-redirect-importer
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Initiate plugin
require_once __DIR__ . '/includes/plugin.php';
