<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
	die;
}

global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}myop_universe");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}myop_chapters");