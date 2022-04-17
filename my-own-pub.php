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

if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/vendor/autoload.php';

define( 'MY_OWN_PUB_DIR', plugin_dir_path( file: __FILE__ ) );
define( 'MY_OWN_PUB_DIR_URL', plugin_dir_url( file: __FILE__ ) );

use function MyOwnPub\Includes\Lib\Settings\{createAdminPage, createSubMenuPage, createPostType};
use function MyOwnPub\Includes\Lib\ACF\addACF;
use function MyOwnPub\Includes\Lib\DbActions\dbBackupToJson;

// On plugin activation
register_activation_hook( file: __FILE__, callback: 'MyOwnPub\Includes\Lib\Activate\activateMyOwnPub');

// Admin Pages
add_action( 'admin_menu', function ()
{
	createAdminPage( name: 'My Own Pub', capability: 'manage_options', icon: 'dashicons-schedule' );
} );

add_action( 'admin_menu', function ()
{
	createSubMenuPage( name: 'My Own Pub', capability: 'manage_options', position: 0 );
} );

// Post Types
add_action( 'init', function ()
{
	createPostType( name: 'Author', public: true );
} );

add_action( 'init', function ()
{
	createPostType( name: 'Contributor', public: true );
} );

// Blocks
function create_blocks_init() {
	$blocks = [
		'test-one',
	];

	foreach ( $blocks as $block ) {
		register_block_type( block_type: MY_OWN_PUB_DIR . 'includes/blocks/' . $block . '/src/' );
	}
}

add_action( 'init', 'MyOwnPub\create_blocks_init' );

addACF();