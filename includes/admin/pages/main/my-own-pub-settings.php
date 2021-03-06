<?php

namespace  MyOwnPub\Includes\Admin\Pages\Main;

use function MyOwnPub\Includes\Lib\Util\createSlug;

function createMainAdminPage(): void {
	$name = 'My Own Pub';
	$capability = 'manage_options';
	$slug_name   = createSlug( name: $name );
	$hook_suffix = add_menu_page(
		page_title: $name,
		menu_title: $name,
		capability: $capability,
		menu_slug:  $slug_name,
		function: function () use ( $slug_name )
		{
			include_once MY_OWN_PUB_DIR . 'includes/admin/pages/main/' . $slug_name . '.php';
		},
		icon_url:   'dashicons-schedule',
		position:   3
	);

	add_submenu_page(
		parent_slug: 'my-own-pub',
		page_title:  $name,
		menu_title:  'My Works',
		capability:  $capability,
		menu_slug:   createSlug( name: $name ),
		position:    0
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