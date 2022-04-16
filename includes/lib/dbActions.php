<?php

namespace MyOwnPub\Includes\Lib\DbActions;

function queryCreateTable( $tableName, $query ): void {
	global $wpdb;
	$charset   = $wpdb->get_charset_collate();
	$tableName = $wpdb->prefix . $tableName;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( queries: "CREATE TABLE $tableName ($query) $charset;" );
}

$universeTableQuery = "
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	name varchar(60) NOT NULL DEFAULT '',
	options longtext NOT NULL DEFAULT '',
	works longtext NOT NULL DEFAULT '',
	PRIMARY KEY  (id)
";
queryCreateTable( tableName: 'myop_universe', query: $universeTableQuery );


$chaptersTableQuery = "
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(60) NOT NULL DEFAULT '',
    options longtext NOT NULL DEFAULT '',
    text longtext NOT NULL DEFAULT '',
    PRIMARY KEY  (id)
";
queryCreateTable( tableName: 'myop_chapters', query: $chaptersTableQuery );


function dbBackupToJson() {
}

function dbRestoreFromJson() {
}