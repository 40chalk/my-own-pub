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

require_once __DIR__ . '/vendor/autoload.php';

define( 'MY_OWN_PUB_DIR', plugin_dir_path( file: __FILE__ ) );
define( 'MY_OWN_PUB_DIR_URL', plugin_dir_url( file: __FILE__ ) );

require_once MY_OWN_PUB_DIR . 'includes/lib/settings.php';
require_once MY_OWN_PUB_DIR . 'includes/lib/acf.php';

use function MyOwnPub\Includes\Lib\Settings\{createAdminPage, createSubMenuPage, createPostType};
use function MyOwnPub\Includes\Lib\ACF\addACF;

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_test_block_init() {
	$blocks = [
		'test-one',
	];

	foreach ( $blocks as $block ) {
		register_block_type( block_type: MY_OWN_PUB_DIR . 'includes/blocks/' . $block . '/src/' );
	}
}

add_action( 'init', 'create_block_test_block_init' );

add_action( 'admin_menu', function ()
{
	createAdminPage( name: 'My Own Pub', capability: 'manage_options', icon: 'dashicons-schedule' );
} );
add_action( 'admin_menu', function ()
{
	createSubMenuPage( name: 'My Own Pub', capability: 'manage_options', position: 0 );
} );

add_action( 'init', function ()
{
	createPostType( name: 'Author', public: true );
} );
add_action( 'init', function ()
{
	createPostType( name: 'Contributor', public: true );
} );

addACF();
