<?php

namespace App\Includes\Lib\Util;

function createSlug(string $name) {
	return strtolower( string: str_replace( search: ' ', replace: '-', subject: $name ) );
}