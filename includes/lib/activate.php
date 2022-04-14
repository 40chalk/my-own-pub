<?php

namespace MyOwnPub\Includes\Lib\Activate;

use function MyOwnPub\Includes\Lib\DbActions\{createUniverseTable, createChaptersTable};

function activateMyOwnPub() {
	createUniverseTable();
	createChaptersTable();
}