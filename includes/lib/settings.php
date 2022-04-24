<?php

namespace MyOwnPub\Includes\Lib\Settings;

use function MyOwnPub\Includes\Lib\Util\createSlug;

function createPostType( string $name, bool $public ): void {
	register_post_type(
		post_type: $name . 's',
		// CPT Options
		args:      [
			           'labels'        => [
				           'name'          => __( $name . 's' ),
				           'singular_name' => __( $name ),
			           ],
			           'public'        => $public,
			           'has_archive'   => $public,
			           'rewrite'       => [ 'slug' => createSlug( name: $name ) ],
			           'show_in_rest'  => $public,
			           'show_in_menu'  => 'my-own-pub',
			           'menu_position' => 10,
		           ]
	);
}