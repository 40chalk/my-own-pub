<?php

namespace App\Includes\Lib\Settings;

include_once MY_OWN_PUB_DIR . 'includes/lib/util.php';

use function App\Includes\Lib\Util\createSlug;

function createAdminPage( string $name, string $capability, string $icon ) {
	$slug_name   = createSlug( name: $name );
	$hook_suffix = add_menu_page(
		page_title: $name,
		menu_title: $name,
		capability: $capability,
		menu_slug:  $slug_name,
		function: function () use ( $slug_name )
		{
			adminPagePhp( slug: $slug_name );
		},
		icon_url:   $icon,
		position:   3
	);

	add_action( 'admin_print_styles-' . $hook_suffix, function () use ( $slug_name )
	{
		scriptEnqueue( slug: $slug_name );
	} );

	function scriptEnqueue( $slug ) {
		wp_enqueue_script(
			handle:    $slug . '-js',
			src:       MY_OWN_PUB_DIR_URL . 'build/' . $slug . '.js',
			deps:      [],
			ver:       1,
			in_footer: true
		);
	}
}

function adminPagePhp( $slug ) {
	include_once MY_OWN_PUB_DIR . 'includes/admin/pages/main/' . $slug . '.php';
}

function createSubMenuPage( string $name, string $capability, int $position ) {
	$slug = createSlug( name: $name );
	add_submenu_page(
		parent_slug: 'my-own-pub',
		page_title:  $name,
		menu_title:  $name,
		capability:  $capability,
		menu_slug:   createSlug( name: $name ),
		function: function () use ( $slug )
		{
			adminPagePhp( slug: $slug );
		},
		position:    $position
	);
}

function createPostType( string $name, bool $public ) {
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