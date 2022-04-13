<?php

namespace MyOwnPub\Includes\Lib\Util;

function createSlug(string $name) {
	return strtolower( string: str_replace( search: ' ', replace: '-', subject: $name ) );
}