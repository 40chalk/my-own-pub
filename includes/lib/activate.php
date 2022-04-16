<?php

namespace MyOwnPub\Includes\Lib\Activate;

use function MyOwnPub\Includes\Lib\DbActions\{queryCreateTable};

function activateMyOwnPub() {
	$universeTableQuery = "
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		name varchar(60) NOT NULL DEFAULT '',
		options longtext NOT NULL DEFAULT '',
		works longtext NOT NULL DEFAULT '',
		PRIMARY KEY  (id)
		";
	queryCreateTable( tableName: 'universe', query: $universeTableQuery );

	$chaptersTableQuery = "
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	    name varchar(60) NOT NULL DEFAULT '',
	    options longtext NOT NULL DEFAULT '',
	    text longtext NOT NULL DEFAULT '',
	    PRIMARY KEY  (id)
		";
	queryCreateTable( tableName: 'chapters', query: $chaptersTableQuery );
}