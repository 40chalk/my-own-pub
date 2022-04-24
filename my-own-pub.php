<?php
/**
 * Plugin Name:       My Own Pub
 * Description:       Plugin for independent writers
 * Requires at least: 5.8
 * Requires PHP:      8.0
 * Version:           0.1.0
 * Author:            40chalk
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-own-pub
 *
 * @package           create-block
 */

namespace MyOwnPub;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

define( 'MY_OWN_PUB_DIR', plugin_dir_path( file: __FILE__ ) );
define( 'MY_OWN_PUB_DIR_URL', plugin_dir_url( file: __FILE__ ) );
define( 'BACK_UP_DIR', WP_CONTENT_DIR . '/myop_bak/');

use function MyOwnPub\Includes\Lib\Settings\{createPostType};
use function MyOwnPub\Includes\Admin\Pages\Main\createMainAdminPage;
use function MyOwnPub\Includes\Lib\ACF\addACF;

// On plugin activation
register_activation_hook( file: __FILE__, callback: 'MyOwnPub\Includes\Lib\Activate\activateMyOwnPub' );

// Admin Pages
add_action( 'admin_menu', fn() => createMainAdminPage() );


// Post Types
add_action( 'init', fn() => createPostType( name: 'Author', public: true ));

add_action( 'init', fn() => createPostType( name: 'Contributor', public: true ));

// Blocks
function create_blocks_init(): void {
	$blocks = [
		'test-one',
	];

	foreach ( $blocks as $block ) {
		register_block_type( block_type: MY_OWN_PUB_DIR . 'includes/blocks/' . $block . '/src/' );
	}
}

add_action( 'init', 'MyOwnPub\create_blocks_init' );

addACF();

add_action( 'admin_post_createUniverse', function ()
{
	if (is_user_logged_in()) {
		global $wpdb;
		$universe['name'] = $_POST['name'];
		$wpdb->insert( table: 'wp_myop_universe', data: $universe );
	}
} );

add_action( 'admin_post_selectUniverse', function ()
{
	if (is_user_logged_in()) {
		global $wpdb;
		$tableName = $wpdb->prefix . 'myop_universe';
		$query = "SELECT * FROM $tableName";
		echo json_encode($wpdb->get_results($query));
	}
	return 'failed';
}
);

