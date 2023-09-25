<?php
/**
 * Plugin Name: Activity Tracker
 * Description: Real-time User Activity Tracker for WordPress.
 * Version: 1.0.0
 * Author: Oleksandr Zhyian
 * Author URI: https://zhyian.dev
 * Tested up to: 6.3.2
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

Zhyian\ActivityTracker\Bootstrap::init( __FILE__ );


