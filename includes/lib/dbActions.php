<?php

namespace MyOwnPub\Includes\Lib\DbActions;

function queryCreateTable( $tableName, $query ): void {
	global $wpdb;
	$charset   = $wpdb->get_charset_collate();
	$tableName = $wpdb->prefix . 'myop_' . $tableName;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( queries: "CREATE TABLE $tableName ($query) $charset;" );
}

function dbBackupToJson( $tableName, $time ): void {
	global $wpdb;
	$tableName = $wpdb->prefix . 'myop_' . $tableName;
	$query     = "SELECT * FROM $tableName";
	$results   = $wpdb->get_results( query: $query );
	$filename  = BACK_UP_DIR . $time . $tableName . '.json';
	if (!is_dir( filename: BACK_UP_DIR)) {
		mkdir( directory: BACK_UP_DIR);
	}
	file_put_contents( filename: $filename, data: json_encode( value: $results) );
}

function dbRestoreFromJson() {
}