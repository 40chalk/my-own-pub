<?php

namespace MyOwnPub\Includes\Lib\DbActions;

function queryCreateTable( $tableName, $query ): void {
	global $wpdb;
	$charset   = $wpdb->get_charset_collate();
	$tableName = $wpdb->prefix . $tableName;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( queries: "CREATE TABLE $tableName ($query) $charset;" );
}

function dbBackupToJson() {
}

function dbRestoreFromJson() {
}