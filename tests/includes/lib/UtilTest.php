<?php

namespace includes\lib;

use PHPUnit\Framework\TestCase;

use function MyOwnPub\Includes\Lib\Util\createSlug;

class UtilTest extends TestCase {
	public function testCreateSlug() {
		$name = 'Test Name';
		$expected = 'test-name';
		$actual = createSlug( $name);

		$this->assertSame( $expected, $actual);
	}
}