<?php

namespace MyOwnPub\Includes\Lib\DbActions;

function createUniverseTable() {
	global $wpdb;
	$charset = $wpdb->get_charset_collate();
	$tableName = $wpdb->prefix . "myop_universe";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	dbDelta("CREATE TABLE $tableName (
      id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      name varchar(60) NOT NULL DEFAULT '',
      options longtext NOT NULL DEFAULT '',
      works longtext NOT NULL DEFAULT '',
      PRIMARY KEY  (id)
    ) $charset;");
}

function createChaptersTable() {
	global $wpdb;
	$charset = $wpdb->get_charset_collate();
	$tableName = $wpdb->prefix . "myop_chapters";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	dbDelta("CREATE TABLE $tableName (
      id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      name varchar(60) NOT NULL DEFAULT '',
      options longtext NOT NULL DEFAULT '',
      text longtext NOT NULL DEFAULT '',
      PRIMARY KEY  (id)
    ) $charset;");
}